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
  include "../.env/conexao.php";

  // Busca o pedido todos os pedidos
  $stmt = $conexao->prepare("SELECT pedidos.*, clientes.nome, clientes.sobrenome, clientes.email, clientes.telefone,clientes.endereco,
  GROUP_CONCAT(CONCAT(produtos.nome_produto, ' QTD: ', itens_pedido.quantidade) SEPARATOR ', ') 
  AS produtos_e_quantidades, SUM(itens_pedido.quantidade) 
  AS total_quantidade, SUM(produtos.preco * itens_pedido.quantidade) 
  AS total_valor FROM pedidos 
  JOIN clientes ON pedidos.id_cliente = clientes.id_cliente 
  JOIN itens_pedido ON pedidos.id_pedido = itens_pedido.id_pedido 
  JOIN produtos ON itens_pedido.id_produto = produtos.id_produto 
  GROUP BY pedidos.id_pedido, clientes.nome, clientes.sobrenome, clientes.email, clientes.telefone, clientes.endereco;");
  $stmt->execute();
  $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    Status: " . $pedido['status'] . "<br>
    <br>
    Dados do Cliente:<br>
    Nome: " . $pedido['nome'] . " " . $pedido['sobrenome'] . "<br>
    E-mail: " . $pedido['email'] . "<br>
    Telefone: " . $pedido['telefone'] . "<br>
    Endereço: " . $pedido['endereco'] . "<br>";

    // Cria um botão para alterar o status do pedido para "Em preparação"
    echo "<br>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='id_pedido' value='" . $pedido['id_pedido'] . "'>";
    if ($pedido['status'] === "pendente") {
      echo "<button type='submit' name='alterar_status'class='btn btn-recusado' value='recusado'>Recusar Pedido</button>";
      echo "<button type='submit' name='alterar_status'class='btn btn-em-preparacao' value='em_preparacao'>Aceitar Pedido</button>";
    } elseif ($pedido['status'] === "A caminho") {
      echo "<button type='submit' name='alterar_status'class='btn btn-recusado' value='recusado'>Recusar Pedido</button>";
      echo "<button type='submit' name='alterar_status' class='btn btn-finalizado' value='finalizado'>Finalizado</button>";
    } elseif ($pedido['status'] === "Em Preparação") {
      echo "<button type='submit' name='alterar_status'class='btn btn-recusado' value='recusado'>Recusar Pedido</button>";
      echo "<button type='submit' name='alterar_status'class='btn btn-saiu-entrega' value='saiu_entrega'>A caminho</button>";
    } elseif ($pedido['status'] === "Finalizado") {

      echo "<button type='submit' name='alterar_status'class='btn btn-em-preparacao' value='em_preparacao'>Retomar Pedido</button>";
    } else {
      echo "<button type='submit' name='alterar_status'class='btn btn-em-preparacao' value='em_preparacao'>Aceitar Pedido</button>";
    }

    echo "</form>";
  }

  // Verifica se o botão foi clicado e altera o status do pedido
  if (isset($_POST['alterar_status'])) {
    switch ($_POST['alterar_status']) {
      case 'recusado':
        $novo_status = 'Recusado';
        break;
      case 'em_preparacao':
        $novo_status = 'Em Preparação';
        break;
      case 'saiu_entrega':
        $novo_status = 'A caminho';
        break;
      case 'finalizado':
        $novo_status = 'Finalizado';
        break;
      default:
        $novo_status = $pedido['status'];
        break;
    }
    $stmt = $conexao->prepare("UPDATE pedidos SET status = :novo_status WHERE id_pedido = :id_pedido");
    $stmt->bindParam(':novo_status', $novo_status);
    $stmt->bindParam(':id_pedido', $_POST['id_pedido']);
    $stmt->execute();
    header("Refresh: 0");
  }
  ?>
</body>

</html>