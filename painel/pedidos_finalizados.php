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
  WHERE pedidos.status_pedido = 'Finalizado'
  GROUP BY pedidos.id_pedido, clientes.nome, clientes.sobrenome, clientes.email, clientes.telefone, clientes.endereco;");
  $stmt->execute();
  $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Ordena os pedidos por ID em ordem decrescente
  usort($pedidos, function($a, $b) {
    return $b['id_pedido'] - $a['id_pedido'];
  });
  echo  '<div class="pedidos-container">';
  foreach ($pedidos as  $pedido) {
    # code...
    // Imprime os dados do pedido e do cliente
    // Imprime os dados do pedido e do cliente
echo '<div class="pedido-wrapper">
<div class="pedido-card">
  <div class="pedido-info">
    <div class="pedido-numero">Pedido #' . $pedido['numero_pedido'] . '</div>
    <div class="pedido-datahora">Horario: ' . $pedido['datahora_pedido'] . '</div>
    <div class="pedido-pagamento">Pagamento:  ' . $pedido['status_pagamento'] . '</div>
    <div class="pedido-status">' . $pedido['status_pedido'] . '</div>
  </div>
  <div class="pedido-detalhes">
    <div class="pedido-produtos">';
      $produtos = explode(', ', $pedido['produtos_e_quantidades']);
      foreach ($produtos as $produto) {
        echo $produto . '<br>';
      }
    echo '</div>
    <div class="pedido-valor">Valor Total: R$ ' . $pedido['valor_total'] . '</div>
   
    <div class="dados-cliente">
    Dados do Cliente:<br>
    <div>Nome: ' . $pedido['nome'] . ' ' . $pedido['sobrenome'] . '</div>
    <div>E-mail: ' . $pedido['email'] . '</div>
    <div>Telefone: ' . $pedido['telefone'] . '</div>
    <div>Endereço: ' . $pedido['endereco'] . '</div>
    </div>
    </div>';
  
    echo "<form method='POST' action='atualiza_status.php' style='display: flex;'>";
    echo "<input type='hidden' name='id_pedido' value='" . $pedido['id_pedido'] . "'>";
    if ($pedido['status_pedido'] === "Finalizado") {
      echo "<button type='submit' name='alterar_status'class='btn btn-em-preparacao' style='width:100%' value='em_preparacao'>Retomar Pedido</button>";
    }
    echo "</form>";
  echo '</div>
</div>';

  }

 
  ?>
  </div>
</body>

</html>