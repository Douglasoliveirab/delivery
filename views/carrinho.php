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
 
    include "../controllers/add_carrinho.php";
    include "cabecalho.php";

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
        
                <table>
                 <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                 </tr>";

        foreach ($_SESSION['carrinho'] as $idProduto => $quantidade) {
            $select = $conexao->prepare("SELECT * FROM produtos WHERE id_produto = ?");
            $select->bindParam(1, $idProduto, PDO::PARAM_INT);
            $select->execute();
            $produtos = $select->fetchAll();

            $totalItens = $quantidade * $produtos[0]['preco'];
            $subtotal += $totalItens;
            $total = $subtotal + $taxaEntrega;
            $qtd += $quantidade;

            echo "<tr>
                    <td>" . $produtos[0]['nome_produto'] . "  <a href='../controllers/remover.php?remover=carrinho&id=" . $idProduto . "'>Remover</a></br>
                    " . $produtos[0]['descricao'] . "</td>
                    <td>" . $quantidade . "</td>
                    <td>R$ " . number_format($produtos[0]['preco'], 2, ",", ".") . "</td>
                    </tr>";
        }

        echo "<p>Subtotal: R$ " . number_format($subtotal, 2, ",", ".") . "</p>
                    <p>Taxa de entrega: R$ " . number_format($taxaEntrega, 2, ",", ".") . "</p>
                    <p>Total: R$ " . number_format($total, 2, ",", ".") . "</p>
                <div class='container-btn'>
                    
                    <a href='#' class='button-continuar'>Finalizar Pedido</a>
                    <a href='index.php' class='button-cart'>Continuar comprando</a>
                </div>
                </table>
                <a href='../controllers/limpar_carrinho.php' class='button-limpar'>Limpar carrinho</a>
                </div>";
    }
    ?>

</body>

</html>