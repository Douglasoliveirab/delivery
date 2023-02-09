<?php

function countItens()
{
    $qtd = 0;

    include "../.env/conexao.php";
    foreach ($_SESSION['itens'] as $idproduto => $quantidade) {
        $select = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
        $select->bindParam(1, $idproduto);
        $select->execute();
        $produtos = $select->fetchAll();
        $qtd += $quantidade;
    }
    return $qtd;
}
