<?php
session_start();
include "../controllers/add_carrinho.php";
include "cabecalho.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/carrinho.css">
    <title>Document</title>
</head>

<body>

    <?php

    
   
    date_default_timezone_set('America/Sao_Paulo');
    $date = new DateTime();
    $date_time = $date->format('Y-m-d H:i:s');

    // Exibir a data e hora de Brasília
    $subtotal = 0;
    $total = 0;
    $taxaEntrega = 5.00;
    $qtd = 0;

    if (count($_SESSION['carrinho']) == 0) {
        echo "<div class='container'>
                    <p>Carrinho vazio :(</p>
                    <a href='index.php' class='button-cart'>Continuar comprando</a>
              </div>";
    } else {

        echo "<div class='container'>
        <form method='post' action='finalizar_pedido.php'>
                <table>
                 <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitario</th>
                 </tr>";
        $_SESSION['dados'] = array();
        $_SESSION['itens'] = array();
        foreach ($_SESSION['carrinho'] as $idProduto => $quantidade) {
            $select = $conexao->prepare("SELECT * FROM produtos WHERE id_produto = ?");
            $select->bindParam(1, $idProduto, PDO::PARAM_INT);
            $select->execute();
            $produtos = $select->fetchAll();

            $totalItens = $quantidade * $produtos[0]['preco'];
            $subtotal += $totalItens;
            $total = $subtotal + $taxaEntrega;
            $qtd += $quantidade;
            $id_cliente = $_SESSION['id_cliente'];
            $numero_pedido  = $_SESSION['id_cliente'] ."_".date('YmdHis');
            $status_pedido = 'pendente';
            $status_pagamento = 'pendente';


            echo "<tr>
                    <td>" . $produtos[0]['nome_produto'] . "  <a href='../controllers/remover.php?remover=carrinho&id=" . $idProduto . "' class='remover'><i class='bi bi-trash'></i></a></br>
                    " . $produtos[0]['descricao'] . "</td>
                    <td>" . $quantidade . "</td>
                    <td>R$ " . number_format($produtos[0]['preco'], 2, ",", ".") . "</td>
                    </tr>
                    ";

            array_push(
                $_SESSION['itens'],
                array(
                    'quantidade' => $quantidade,
                    'id_produto' => $idProduto
                )
            );
        }
        array_push(
            $_SESSION['dados'],
            array(
                'id_cliente' => $id_cliente,
                'datahora_pedido' => $date_time,
                'numero_pedido' => $numero_pedido,
                'subtotal' => $subtotal,
                'frete' => $taxaEntrega,
                'valor_total' => $total,
                'status_pedido' => $status_pedido,
                'status_pagamento' => $status_pagamento

            )
        );

      

        echo "<p>Subtotal: R$ " . number_format($subtotal, 2, ",", ".") . "</p>
                    <p>Taxa de entrega: R$ " . number_format($taxaEntrega, 2, ",", ".") . "</p>
                    <p>Total: R$ " . number_format($total, 2, ",", ".") . "</p>
                <div class='container-btn'>
                    
                    <button type='submit' class='button-continuar'>Finalizar Pedido</button>
                    <a href='index.php' class='button-cart'>Continuar comprando</a>
                </div>
                </table>
                <a href='../controllers/limpar_carrinho.php' class='button-limpar'>Limpar carrinho</a>
                </div>
                </form>";
    }
    ?>

</body>

</html>