<?php
session_start();
include "../.env/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o formulário foi enviado com sucesso

    // Verifique se todos os campos necessários estão presentes
    if (isset($_POST['id_categoria']) && isset($_POST['nome_categoria'])) {
        $id_categoria = $_POST['id_categoria'];
        $nome_categoria = $_POST['nome_categoria'];

        // Verifique se foi enviado um novo arquivo de imagem
        if (!empty($_FILES['img_categoria']['name'])) {
            // Verifique se é uma imagem válida
            $tipo = $_FILES['img_categoria']['type'];
            if ($tipo == 'image/jpeg' || $tipo == 'image/png') {
                // Verifique se a pasta "categorias" existe, se não existir, crie a pasta
                if (!file_exists("categorias")) {
                    mkdir("categorias");
                }

                // Mova o novo arquivo para o diretório de uploads
                $imgCategoria = $_FILES['img_categoria']['name'];
                $img_categoria = 'categorias/' .  $imgCategoria;
                move_uploaded_file($_FILES['img_categoria']['tmp_name'], $img_categoria);

                // Atualize os campos img_categoria e nome_categoria no banco de dados
                $query = $conexao->prepare("UPDATE categoria SET img_categoria = ?, nome_categoria = ? WHERE id_categoria = ?");
                $query->bindParam(1, $img_categoria, PDO::PARAM_STR);
                $query->bindParam(2, $nome_categoria, PDO::PARAM_STR);
                $query->bindParam(3, $id_categoria, PDO::PARAM_INT);
                $query->execute();
            } else {
                echo "Tipo de arquivo inválido. Apenas imagens JPEG e PNG são permitidas.";
            }
        } else {
            // Atualize apenas o campo nome_categoria no banco de dados
            $query = $conexao->prepare("UPDATE categoria SET nome_categoria = ? WHERE id_categoria = ?");
            $query->bindParam(1, $nome_categoria, PDO::PARAM_STR);
            $query->bindParam(2, $id_categoria, PDO::PARAM_INT);
            $query->execute();
        }

        // Redirecione para a página de categorias após a atualização
        header("Location: all_categorias.php");
        exit();
    } else {
        echo "Todos os campos devem ser preenchidos.";
    }
}
?>
