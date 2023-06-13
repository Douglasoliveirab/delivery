<?php
session_start();
include "../.env/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProduto = $_POST['id_produto'];
    $nomeProduto = $_POST['nome_produto'];
    $descricao = $_POST['descricao'];
    $custoProduto = $_POST['custo_produto'];
    $preco = $_POST['preco'];
    $statusProduto = $_POST['status_produto'];

    // Verifica se um novo arquivo de imagem foi enviado
    if (!empty($_FILES['img_produto']['name'])) {
        // Verifica se é uma imagem válida
        $tipo = $_FILES['img_produto']['type'];
        if ($tipo == 'image/jpeg' || $tipo == 'image/png') {
            // Verifica se a pasta "produtos" existe, se não existir, cria a pasta
            if (!file_exists("produtos")) {
                mkdir("produtos");
            }

            // Move o arquivo para o diretório de uploads
            $nome_img_produto = $_FILES['img_produto']['name'];
            $caminho_img_produto = 'produtos/' . $nome_img_produto;
            $img_produto = $caminho_img_produto;
            move_uploaded_file($_FILES['img_produto']['tmp_name'], $caminho_img_produto);
        } else {
            // Lógica para lidar com um arquivo de imagem inválido (opcional)
        }
    } else {
        // Nenhum novo arquivo de imagem foi enviado, mantenha o valor atual do campo img_produto
        $query = $conexao->prepare("SELECT img_produto FROM produtos WHERE id_produto = ?");
        $query->bindParam(1, $idProduto, PDO::PARAM_INT);
        $query->execute();
        $produto = $query->fetch(PDO::FETCH_ASSOC);
        $img_produto = $produto['img_produto'];
    }

    // Atualize os dados do produto no banco de dados usando o ID, incluindo a imagem
    $query = $conexao->prepare("UPDATE produtos SET img_produto = ?, nome_produto = ?, descricao = ?, custo_produto = ?, preco = ?, status_produto = ? WHERE id_produto = ?");
    $query->bindParam(1, $img_produto, PDO::PARAM_STR);
    $query->bindParam(2, $nomeProduto, PDO::PARAM_STR);
    $query->bindParam(3, $descricao, PDO::PARAM_STR);
    $query->bindParam(4, $custoProduto, PDO::PARAM_STR);
    $query->bindParam(5, $preco, PDO::PARAM_STR);
    $query->bindParam(6, $statusProduto, PDO::PARAM_STR);
    $query->bindParam(7, $idProduto, PDO::PARAM_INT);
    $query->execute();

    // Você pode adicionar lógica adicional aqui, como verificar se a atualização foi bem-sucedida
    // e retornar uma resposta apropriada ao cliente
    header('location:all_produtos.php');
}
?>
