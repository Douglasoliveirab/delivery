<?php

function countItens()
{
    $qtd = 0;

    include "../.env/conexao.php";
    foreach ($_SESSION['carrinho'] as $idProduto => $quantidade) {
        $select = $conexao->prepare("SELECT * FROM produtos WHERE id_produto = ?");
        $select->bindParam(1, $idProduto, PDO::PARAM_INT);
        $select->execute();
        $produtos = $select->fetchAll();
        $qtd += $quantidade;
    }
    return $qtd;
}
?>