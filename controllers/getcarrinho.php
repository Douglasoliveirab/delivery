<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function countItens()
{
    $qtd = 0;
    foreach ($_SESSION['carrinho'] as $idProduto => $quantidade) 
    {
        $qtd += $quantidade;
    }

    return $qtd;
}
?>