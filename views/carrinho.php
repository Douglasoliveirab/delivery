<?php

include "../controllers/add_carrinho.php";
include "../model/getcarrinho.php";

if (count($_SESSION['itens']) == 0) {
    echo "Carrinho vazio :) <br/><a href='../index.php'>Continuar comprando</a>";
} else {

    $getCarrinho = getCart($total,$subtotal,$taxaEntrega);
    echo $getCarrinho;
}
