<?php
session_start();
include "../.env/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o formulário foi enviado com sucesso

    // Verifique se todos os campos necessários estão presentes
    if (!empty($_FILES['img_banner']['name']) && isset($_POST['id_banner'])) {
        $id_banner = $_POST['id_banner'];
        
        // Verifique se é uma imagem válida
        $tipo = $_FILES['img_banner']['type'];
        if ($tipo == 'image/jpeg' || $tipo == 'image/png') {
            // Verifique se a pasta "banners" existe, se não existir, crie a pasta
            if (!file_exists("banners")) {
                mkdir("banners");
            }

            // Mova o arquivo para o diretório de uploads
            $img_banner  = $_FILES['img_banner']['name'];
            $caminho_banner = 'banners/' . $img_banner;
            move_uploaded_file($_FILES['img_banner']['tmp_name'], $caminho_banner);

            // Atualize os campos img_banner e caminho_banner no banco de dados
            $query = $conexao->prepare("UPDATE banner SET img_banner = ?, caminho_banner = ? WHERE id_banner = ?");
            $query->bindParam(1, $img_banner, PDO::PARAM_STR);
            $query->bindParam(2, $caminho_banner, PDO::PARAM_STR);
            $query->bindParam(3, $id_banner, PDO::PARAM_INT);
            $query->execute();

            // Redirecione para a página de banners após a atualização
            header("Location: all_banners.php");
            exit();
        } else {
            echo "Tipo de arquivo inválido. Apenas imagens JPEG e PNG são permitidas.";
        }
    } else {
        echo "Todos os campos devem ser preenchidos.";
    }
}
?>
