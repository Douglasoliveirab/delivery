<?php
session_start();

unset($_SESSION['itens']);
header('location: ../views/carrinho.php');
