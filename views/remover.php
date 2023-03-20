<?php

session_start();
if(isset($_GET['remover']) && $_GET['remover'] =='carrinho')
{
    $idproduto = $_GET['id'];
    unset($_SESSION['carrinho'][$idproduto]);
    echo 'echo "<script>javascript:history.go(-1)</script>"';
}

?>