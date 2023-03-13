<?php
session_start();
if (!isset($_SESSION['itens'])) {
    $_SESSION['itens'] = array();
}
if (isset($_GET['id_produto']) && $_GET['add'] == "carrinho") {
    $idproduto = $_GET['id_produto'];
    if (!isset($_SESSION['itens'][$idproduto])) {
        $_SESSION['itens'][$idproduto] = 1;
    } else {
        $_SESSION['itens'][$idproduto] += 1;
    }
    //volta
    echo "<script>javascript:history.go(-1)</script>";
}
?>
    
