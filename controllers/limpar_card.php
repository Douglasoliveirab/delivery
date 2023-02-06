<?php
session_start();

unset($_SESSION['itens']);
header('location:../carrinho.php');
