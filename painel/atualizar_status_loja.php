<?php
// atualizar_status.php
session_start();
include "../.env/conexao.php";
// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_loja = $_POST['id_loja'];
    $novo_status = $_POST['novo_status'];

   
    
    // Prepara a consulta SQL para atualizar o status_loja
    $atualizar = $conexao->prepare("UPDATE loja SET status_loja = :novo_status WHERE id_loja = :id_loja");
    $atualizar->bindParam(':novo_status', $novo_status);
    $atualizar->bindParam(':id_loja', $id_loja);
    
    // Executa a atualização
    $atualizar->execute();

    // Redireciona de volta para a página atual
    header("Location: loja.php");
    exit();
}
?>