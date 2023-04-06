<?php
session_start();
require_once('../../.env/conexao.php');
 
if (empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: ../painel/');
	exit();
}
 
$email = $_POST['email'];
$senha = $_POST['senha'];
 
$sql = "SELECT * FROM administrador WHERE email = ?";
$stmt = $conexao->prepare($sql); 
$stmt->execute([$email]); 
$user = $stmt->fetch();
 
if ($user && password_verify($senha, $user['senha'])) {
	$_SESSION['adm'] = $user['nome_usuario'];
	$_SESSION['id_adm'] = $user['id_adm'];
	$_SESSION['previlegios'] = $user['previlegios'];

	 header('Location: ../../painel/usuarios.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../painel/');
	
	exit();
}
?>
