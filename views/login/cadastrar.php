<?php

$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$senha = md5($_POST['senha']);



$insert = $conexao->prepare("INSERT INTO cliente() VALUES(NULL,?,?,?,?)");

    $insert->bindparam(1,$usuario);
    $insert->bindparam(2,$nome);
    $insert->bindparam(3,$telefone);
	$insert->bindparam(4,$senha);

$insert->execute();

header("location: ../login_cliente.html");

?>