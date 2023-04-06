<?php
session_start();
include "verifica_adm.php";
include "../.env/conexao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="pianelcss/pedidos.css">
  <title>Pedidos</title>

</head>

<body>
  <?php

 include "master.php";

  // Busca o pedido todos os pedidos
  $stmt = $conexao->prepare("SELECT pedidos.*, clientes.nome, clientes.sobrenome, clientes.email, clientes.telefone,clientes.endereco,
  GROUP_CONCAT(CONCAT(produtos.nome_produto, ' QTD: ', itens_pedido.quantidade) SEPARATOR ', ') 
  AS produtos_e_quantidades, SUM(itens_pedido.quantidade) 
  AS total_quantidade, SUM(produtos.preco * itens_pedido.quantidade) 
  AS total_valor FROM pedidos 
  JOIN clientes ON pedidos.id_cliente = clientes.id_cliente 
  JOIN itens_pedido ON pedidos.id_pedido = itens_pedido.id_pedido
  JOIN produtos ON itens_pedido.id_produto = produtos.id_produto 
  WHERE pedidos.status_pedido = 'A caminho'
  GROUP BY pedidos.id_pedido, clientes.nome, clientes.sobrenome, clientes.email, clientes.telefone, clientes.endereco;");
  $stmt->execute();
  $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Ordena os pedidos por ID em ordem decrescente
  usort($pedidos, function($a, $b) {
    return $b['id_pedido'] - $a['id_pedido'];
  });
  
  foreach ($pedidos as  $pedido) {
    # code...
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
    Nome: " . $pedido['nome'] . " " . $pedido['sobrenome'] . "<br>
    E-mail: " . $pedido['email'] . "<br>
    Telefone: " . $pedido['telefone'] . "<br>
    Endereço: " . $pedido['endereco'] . "<br>";

    // Cria um botão para alterar o status do pedido para "Em preparação"
    echo "<br>";
    echo "<form method='POST' action='atualiza_status.php'>";
    echo "<input type='hidden' name='id_pedido' value='" . $pedido['id_pedido'] . "'>";
    if ($pedido['status_pedido'] === "A caminho") {
        echo "<button type='submit' name='alterar_status'class='btn btn-recusado' value='recusado'>Recusar Pedido</button>";
        echo "<button type='submit' name='alterar_status' class='btn btn-finalizado' value='finalizado'>Finalizado</button>";
      }

    echo "</form>";
  }

 
  ?>
</body>

</html>