<?php
session_start();
include "../.env/conexao.php";
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
        $novo_status = $pedido['status_pedido'];
        break;
    }
    $stmt = $conexao->prepare("UPDATE pedidos SET status_pedido = :novo_status WHERE id_pedido = :id_pedido");
    $stmt->bindParam(':novo_status', $novo_status);
    $stmt->bindParam(':id_pedido', $_POST['id_pedido']);
    $stmt->execute();
     // Adiciona o redirecionamento para a página anterior
     echo "<script>window.history.back();</script>";
  }

?>