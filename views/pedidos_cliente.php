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
    <link rel="stylesheet" href="assets/css/pedidos.css">
    <title>Meus Pedidos</title>
</head>
<body>
    <?php include "cabecalho.php"; ?>
    <main>
        <div class="pedidos-container">
            <?php
                // Consulta ao banco de dados para buscar os pedidos do cliente
                $select = $conexao->prepare("SELECT pedidos.*, clientes.nome, clientes.sobrenome, clientes.email, clientes.telefone, clientes.endereco,
                GROUP_CONCAT(CONCAT(produtos.nome_produto, ' QTD: ', itens_pedido.quantidade) SEPARATOR ', ') AS produtos_e_quantidades, 
                SUM(itens_pedido.quantidade) AS total_quantidade, SUM(produtos.preco * itens_pedido.quantidade) AS total_valor 
                FROM pedidos 
                JOIN clientes ON pedidos.id_cliente = clientes.id_cliente 
                JOIN itens_pedido ON pedidos.id_pedido = itens_pedido.id_pedido
                JOIN produtos ON itens_pedido.id_produto = produtos.id_produto 
                WHERE pedidos.id_cliente = :idCliente
                GROUP BY pedidos.id_pedido, clientes.nome, clientes.sobrenome, clientes.email, clientes.telefone, clientes.endereco;" );
                $select->bindValue(':idCliente', $_SESSION['id_cliente'], PDO::PARAM_INT);
                $select->execute();
                $pedidos = $select->fetchAll(PDO::FETCH_ASSOC);
                
              //ordean da ordem decrescente pelo id
                usort($pedidos, function($a, $b) {
                  return $b['id_pedido'] - $a['id_pedido'];
                });

                // Loop para imprimir os dados de cada pedido
               echo  '<div class="pedidos-container">';
  
    foreach ($pedidos as $pedido) {
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
                </div>
              </div>
            </div>';
    }
  ?>
</div>

    </main>
</body>
</html>
