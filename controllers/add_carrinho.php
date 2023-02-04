<?php
session_start();
if (!isset($_SESSION['itens'])) {
    $_SESSION['itens'] = array();
}
if (isset($_GET['id']) && $_GET['add'] == "carrinho") {
    $idproduto = $_GET['id'];
    if (!isset($_SESSION['itens'][$idproduto])) {
        $_SESSION['itens'][$idproduto] = 1;
    } else {
        $_SESSION['itens'][$idproduto] += 1;
    }
    header('location:../index.php');
}
    
