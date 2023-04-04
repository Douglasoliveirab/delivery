<?php
session_start();
include "login/verifica_login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/itens.css">
    <title>produtos</title>
</head>
<body>
<?php

include "cabecalho.php";
if (isset($_GET['id_cliente']) && is_numeric($_GET['id_cliente'])) {
    
    $idCliente = $_GET['id_cliente'];
    
    // Aqui você pode executar sua consulta SQL para buscar os dados da categoria
} 
$select = $conexao->prepare("SELECT pedidos.*, clientes.nome, clientes.sobrenome, clientes.email, clientes.telefone,clientes.endereco,
GROUP_CONCAT(CONCAT(produtos.nome_produto, ' QTD: ', itens_pedido.quantidade) SEPARATOR ', ') 
AS produtos_e_quantidades, SUM(itens_pedido.quantidade) 
AS total_quantidade, SUM(produtos.preco * itens_pedido.quantidade) 
AS total_valor FROM pedidos 
JOIN clientes ON pedidos.id_cliente = clientes.id_cliente 
JOIN itens_pedido ON pedidos.id_pedido = itens_pedido.id_pedido
JOIN produtos ON itens_pedido.id_produto = produtos.id_produto 
WHERE pedidos.id_cliente = :idCliente
GROUP BY pedidos.id_pedido, clientes.nome, clientes.sobrenome, clientes.email, clientes.telefone, clientes.endereco;" );
$select->bindValue(':idCliente', $idCliente, PDO::PARAM_INT);
$select->execute();
$query = $select->fetchAll();


if (isset($_SESSION['endereco']) && $_SESSION['endereco'] != "") {
    echo ' <div class="localizacao">
                     <i class="bi bi-geo-alt" id="btn-busca"></i>' . $endereco . '
                  </div>';
}

foreach ($query as $pedido) {
    // Imprime os dados do pedido e do cliente
    echo "ID do Pedido: " . $pedido['id_pedido'] . "<br>
    Data/Hora do Pedido: " . $pedido['datahora_pedido'] . "<br>
    Número do Pedido: " . $pedido['numero_pedido'] . "<br>
    itens do pedido " . $pedido['produtos_e_quantidades'] . "<br>
     Subtotal: R$ " . $pedido['subtotal'] . "<br>
    Frete: R$ " . $pedido['frete'] . "<br>
    Valor Total: R$ " . $pedido['valor_total'] . "<br>
    Status Pedido: " . $pedido['status_pedido'] . "<br>
    Status Pagamento: " . $pedido['status_pagamento'] . "<br>
    <br>
    Dados do Cliente:<br>
    Nome: " . $pedido['nome'] . " " . $pedido['sobrenome'] . "<br>";
}

?>
</body>
</html>
