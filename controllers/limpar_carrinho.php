<?php
session_start();

unset($_SESSION['carrinho']);
header('location: ../views/carrinho.php');
?>
