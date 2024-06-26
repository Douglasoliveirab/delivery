<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../controllers/add_carrinho.php";
include "cabecalho.php";

if (isset($_SESSION['frete'])) {
    include 'check_taxa_entrega.php';
    $taxaEntrega = $_SESSION['frete'];
    $metodoEntrega = $_SESSION['tipo_entrega'];
} else {
    $taxaEntrega = 5.00;
    $_SESSION['tipo_entrega'] = 'entrega';
    $metodoEntrega = $_SESSION['tipo_entrega'];
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    $qtd = 0;

    if (count($_SESSION['carrinho']) == 0) {
        echo "<div class='container'>
                    <p>Carrinho vazio :(</p>
                    <a href='index.php' class='button-cart'>Continuar comprando</a>
              </div>";
    } else {
        // Verificar se o usuário está logado e possui um ID de cliente
        if (isset($_SESSION['id_cliente'])) {
            $id_cliente = $_SESSION['id_cliente'];

            // Consultar o endereço do cliente na tabela clientes
            $stmt = $conexao->prepare("SELECT endereco FROM clientes WHERE id_cliente = :id_cliente");
            $stmt->bindParam(':id_cliente', $id_cliente);
            $stmt->execute();

            // Verificar se a consulta retornou algum resultado
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['endereco'] = $row['endereco'];
                $endereco = $_SESSION['endereco'];

                // Usar o valor do endereço como desejar
                echo '<div class="localizacao">
        <i class="bi bi-geo-alt">Endereço de entrega</i><br>
        <span class="endereco">' . $endereco . '</span>
        <i class="bi bi-pencil editar" style="color:red" id="btn-editar">editar</i>
    </div>';
            }
        }


        echo "<div class='container'>
        <div style='display: flex; gap: 10px;'> 
          <form method='post'>
            <div class='botao'>
              <input type='submit' id='botao1' name='tipo_entrega' value='entrega'>
              <label for='botao1'>Entrega</label>
            </div>
          </form>  
          <form method='post'>
            <div class='botao'>
              <input type='submit' id='botao2' name='tipo_entrega' value='retirada'>
              <label for='botao2'>Retirada</label>
            </div>
          </form>
        </div>
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
            $numero_pedido  = $_SESSION['id_cliente'] . "_" . date('YmdHis');
            $status_pedido = 'pendente';
            $status_pagamento = 'pendente';



            echo "<tr>
            <td>
                " . $produtos[0]['nome_produto'] . "
                <a href='../controllers/remover.php?remover=carrinho&id=" . $idProduto . "' class='remover'><i class='bi bi-trash'></i></a>
                <br>
                " . $produtos[0]['descricao'] . "
            </td>
            <td>
                <div class='quantidade'>
                    <a href='../controllers/atualizar_quantidade.php?acao=menos&id=" . $idProduto . "'><i class='bi bi-dash' style='color: black;border:1px solid gray;border:radius:2px;font-weight: bold;'></i></a>
                    <span>" . $quantidade . "</span>
                    <a href='../controllers/atualizar_quantidade.php?acao=mais&id=" . $idProduto . "'><i class='bi bi-plus' style='color: black;border:1px solid gray;border:radius:2px;font-weight: bold;'></i></a>
                </div>
            </td>
            <td>
                R$ " . number_format($produtos[0]['preco'], 2, ",", ".") . "
            </td>
        </tr>";



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
                'tipo_entrega' => $metodoEntrega,
                'valor_total' => $total,
                'status_pedido' => $status_pedido,
                'status_pagamento' => $status_pagamento,


            )
        );

        echo " <p>Método de entrega: " . $metodoEntrega . "</p>";
        if (isset($taxaEntrega) && $taxaEntrega != 0) {
            echo "<p>Subtotal: R$ " . number_format($subtotal, 2, ",", ".") . "</p>";
            echo " <p>Taxa de entrega: R$ " . number_format($taxaEntrega, 2, ",", ".") . "</p>";
        }
        echo "     <p>Total: R$ " . number_format($total, 2, ",", ".") . "</p>
                <div class='container-btn'>
                    
                    
                    <a href='index.php' class='button-cart'>Adicionar mais itens</a>
                </div>
                </table>
                <a href='../controllers/limpar_carrinho.php' class='button-limpar'>Limpar carrinho</a>
                
                </div>
                <div class='container'>
        <div class='modal'>
            <div class='modal-content'>
                <div class='payment-options'>
                    <div class='payment-option'>
                        <input type='radio' name='pagamento' value='entrega' id='pagamento-entrega' class='option-input radio'>
                        <label for='pagamento-entrega' class='option-label'>Pagar na Entrega</label>
                    </div>
                    <div class='payment-option'>
                        <input type='radio' name='pagamento' value='online' id='pagamento-online' class='option-input radio'>
                        <label for='pagamento-online' class='option-label'>Pagamento Online</label>
                    </div>
                </div>
                <div class='pagamento-entrega' style='display:none;'>
                    <label for='select-pagamento-online'>Escolha um método:</label>
                    <select id='select-pagamento-online'>
                        <option value='cartao-credito'> Cartão de Crédito </option>
                        <option value='cartao-debito'> Cartão de Débito </option>
                        <option value='dinheiro'> dinheiro </option>
                        <option value='pix'> Pix </option>
                    </select>
                </div>
                <button type='submit' id='confirmar-btn' class='btn-payment'>Comfirmar pedido</button>
            </div>
        </div>
    </div>
    </form>

                ";
    }
    ?>
    <!-- Modal HTML -->
    <form method="post" action="atualiza_endereco.php">
        <div class="custom-modal">
            <div class="custom-modal-content">
                <span class="modal-close-mob">&times;</span>
                <h3 class="custom-modal-title">Editar Endereço</h3>
                <input type="hidden" name="id_cliente" value="<?= $id_cliente ?>" />
                <input type="text" class="custom-modal-input" id="novo_endereco" name="novo_endereco" placeholder="Digite o novo endereço" value="<?= $endereco ?>">
                <button type="submit" class="custom-modal-btn"> Atualizar </button>
            </div>
        </div>
    </form>
    <script src="./assets/js/carrinho.js"></script>
    <script>
        $(document).ready(function() {

            $("#botao1").click(function() {

                var $tipo_entrega = 'entrega';
                $.ajax({
                    type: "POST",
                    url: 'check_taxa_entrega.php',
                    success: function(data) {
                        console.log(data);
                    }
                });

            });
            $("#botao2").click(function() {
                var $tipo_entrega = 'retirada';
                $.ajax({
                    type: "POST",
                    url: 'check_taxa_entrega.php',
                    success: function(data) {
                        console.log(data);
                    }
                });

            });

        });
    </script>
</body>

</html>