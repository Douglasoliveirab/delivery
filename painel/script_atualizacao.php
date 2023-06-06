<?php
session_start();
include "../.env/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProduto = $_POST['id_produto'];
    $imgProduto = $_POST['img_produto'];
    $nomeProduto = $_POST['nome_produto'];
    $descricao = $_POST['descricao'];
    $custoProduto = $_POST['custo_produto'];
    $preco = $_POST['preco'];
    $statusProduto = $_POST['status_produto'];

    // Atualize os dados do produto no banco de dados usando o ID
    $query = $conexao->prepare("UPDATE produtos SET img_produto = ?, nome_produto = ?, descricao = ?, custo_produto = ?, preco = ?, status_produto = ? WHERE id_produto = ?");
    $query->bindParam(1, $imgProduto, PDO::PARAM_STR);
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
