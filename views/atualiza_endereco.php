<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include "../.env/conexao.php";

// Verificar se o endereço foi enviado via POST
if(isset($_POST['novo_endereco'])){
    $novo_endereco = $_POST['novo_endereco'];
    $id_cliente = $_POST['id_cliente'];
        //atualizza o campo enderço na tabela clientes
        $stmt = $conexao->prepare("UPDATE clientes SET endereco = :novo_endereco WHERE id_cliente = :id_cliente");
        $stmt->bindParam(':novo_endereco', $novo_endereco);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();

         // Adiciona o redirecionamento para a página anterior
         echo "<script>javascript:history.go(-1)</script>";
        exit();
      }
?>

