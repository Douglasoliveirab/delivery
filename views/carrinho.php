<?php
include "../.env/conexao.php";
include "add_carrinho.php";

session_start();

$subtotal = 0;
$total = 0;
$taxaEntrega = 5.00;
$qtd = 0;

if (count($_SESSION['carrinho']) == 0) {
    echo "Carrinho vazio :) <br/><a href='index.php'>Continuar comprando</a>";
} else {
    foreach ($_SESSION['carrinho'] as $idProduto => $quantidade) {
        $select = $conexao->prepare("SELECT * FROM produtos WHERE id_produto = ?");
        $select->bindParam(1, $idProduto, PDO::PARAM_INT);
        $select->execute();
        $produtos = $select->fetchAll();

        $totalItens = $quantidade * $produtos[0]['valor'];
        $subtotal += $totalItens;
        $qtd += $quantidade;

        echo "<p>Produto: " . $produtos[0]['nome_produto'] . "<br/>";
        echo "Quantidade: " . $quantidade . "<br/>";
        echo "Preço: R$ " . number_format($produtos[0]['valor'], 2, ",", ".") . "</p>";
    }

    $total = $subtotal + $taxaEntrega;

    echo "<p>Subtotal: R$ " . number_format($subtotal, 2, ",", ".") . "</p>";
    echo "<p>Taxa de entrega: R$ " . number_format($taxaEntrega, 2, ",", ".") . "</p>";
    echo "<p>Total: R$ " . number_format($total, 2, ",", ".") . "</p>";
    echo "<p><a href='../controllers/limpar_carrinho.php'>Limpar carrinho</a></p>";
        echo "<a href='index.php'>Adicionar mais itens</a>";
}
?>
