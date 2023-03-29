<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

if (isset($_GET['add']) && $_GET['add'] == 'carrinho') {
    $idProduto = $_GET['id'];

    if (isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto]++;
    } else {
        $_SESSION['carrinho'][$idProduto] = 1;
    }
  
    echo "<script>javascript:history.go(-1)</script>";
}
?>
    
