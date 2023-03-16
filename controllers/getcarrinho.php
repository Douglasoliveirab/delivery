<?php

function countItens()
{
    $qtd = 0;

    
    foreach ($_SESSION['carrinho'] as $idProduto => $quantidade) {
        
        $qtd += $quantidade;
    }
    return $qtd;
}
?>