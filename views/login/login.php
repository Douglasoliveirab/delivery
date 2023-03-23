<?php
session_start();
require_once('../../.env/conexao.php');
 
if (empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
 
$email = $_POST['email'];
$senha = $_POST['senha'];
 
$sql = "SELECT * FROM clientes WHERE email = ?";
$stmt = $conexao->prepare($sql); 
$stmt->execute([$email]); 
$user = $stmt->fetch();
 
if ($user && password_verify($senha, $user['senha'])) {
	$_SESSION['usuario'] = $user['nome'];
	$_SESSION['id_cliente'] = $user['id_cliente'];
	$_SESSION['endereco'] = $user['endereco'];

	 header('Location: ../index.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../login_cliente.html');
	
	exit();
}
?>
