<?php

$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$senha = md5($_POST['senha']);

$conexao = new PDO ('mysql:host=localhost;dbname=id18614539_appdiv',"id18614539_root","uF~8%QrmR%J>}2f2");

$insert = $conexao->prepare("INSERT INTO usuario() VALUES(NULL,?,?,?,?)");

    $insert->bindparam(1,$usuario);
    $insert->bindparam(2,$nome);
    $insert->bindparam(3,$telefone);
	$insert->bindparam(4,$senha);

$insert->execute();

header("location: ../login_cliente.html");

?>