<?php
include "../.env/conexao.php";
include "../controllers/add_carrinho.php";

$subtotal = 0;
$total = 0;
$taxaEntrega = 5.00;
$qtd = 0;

if (count($_SESSION['itens']) == 0) {
    echo "Carrinho vazio :) <br/><a href='index.php'>Continuar comprando</a>";
} else {
    foreach ($_SESSION['itens'] as $idproduto => $quantidade) {
        $select = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
        $select->bindParam(1, $idproduto);
        $select->execute();
        $produtos = $select->fetchAll();
        $totalItens =  $quantidade * $produtos[0]['preco'];
        $subtotal += ($quantidade * $totalItens) / $quantidade;
        $total = $subtotal + $taxaEntrega;
        $taxaEntrega = 5.00;

        echo "nome: " . $produtos[0]['nome'] . "<br/>";
        echo $produtos[0]['desc'] . "<br/>";
        echo "quantidade: " . $quantidade . "<br/>";
        echo "R$ " . number_format($produtos[0]['preco'], 2, ",", ".") . "<br/>";
        echo "valor dos itens:"  . number_format($totalItens, 2, ",", ".");
        echo " <hr/>";
    }
    echo "Taxa de entrega:"  . number_format($taxaEntrega, 2, ",", ".") . "</br>";
    echo "Subtotal:"  . number_format($subtotal, 2, ",", ".") . "</br>";
    echo "Total:"  . number_format($total, 2, ",", ".") . "</br>";
    echo "<a href='../controllers/limpar_card.php'>Limpar carrinho</a><br/>";
    echo "<a href='index.php'>Adicionar mais itens</a>";
}
