<?php
session_start();

// Faz conexão com o banco de dados aqui
include "../.env/conexao.php";
require  '../vendor/autoload.php';
$accessToken = "TEST-1472282048459445-032409-8723148853628c0116c89b140f329544-1337839420";
MercadoPago\SDK::setAccessToken($accessToken);

// Prepara a consulta SQL para inserir os pedidos
$sql_pedidos = "INSERT INTO pedidos (id_pedido, id_cliente, datahora_pedido, numero_pedido, subtotal, frete, valor_total, status_pedido, status_pagamento) 
        VALUES (:id_pedido, :id_cliente, :datahora_pedido, :numero_pedido, :subtotal, :frete, :valor_total, :status_pedido, :status_pagamento)";

// Prepara a declaração SQL para os pedidos
$stmt_pedidos = $conexao->prepare($sql_pedidos);

// Prepara a consulta SQL para inserir os itens do pedido
$sql_itens = "INSERT INTO itens_pedido (id_pedido, id_produto, quantidade) 
              VALUES (:id_pedido, :id_produto, :quantidade)";

// Prepara a declaração SQL para os itens do pedido
$stmt_itens = $conexao->prepare($sql_itens);

try {
    $conexao->beginTransaction();

    // Loop para inserir os pedidos
    foreach($_SESSION['dados'] as $pedido) {
        // Vincular os valores aos placeholders dos pedidos
        $stmt_pedidos->bindParam(':id_pedido', $pedido['id_pedido'], PDO::PARAM_INT);
        $stmt_pedidos->bindParam(':id_cliente', $pedido['id_cliente'], PDO::PARAM_INT);
        $stmt_pedidos->bindParam(':datahora_pedido', $pedido['datahora_pedido'], PDO::PARAM_STR);
        $stmt_pedidos->bindParam(':numero_pedido', $pedido['numero_pedido'], PDO::PARAM_STR);
        $stmt_pedidos->bindParam(':subtotal', $pedido['subtotal'], PDO::PARAM_STR);
        $stmt_pedidos->bindParam(':frete', $pedido['frete'], PDO::PARAM_STR);
        $stmt_pedidos->bindParam(':valor_total', $pedido['valor_total'], PDO::PARAM_STR);
        $stmt_pedidos->bindParam(':status_pedido', $pedido['status_pedido'], PDO::PARAM_STR);
        $stmt_pedidos->bindParam(':status_pagamento', $pedido['status_pagamento'], PDO::PARAM_STR);
        // Executar a consulta SQL para os pedidos
        if ($stmt_pedidos->execute()) {
            echo "Pedido inserido com sucesso!\n";

            // Obter o id do último pedido inserido
            $id_pedido = $conexao->lastInsertId();

            // Loop para inserir os itens do pedido
            foreach($_SESSION['itens'] as $item) {
                // Vincular os valores aos placeholders dos itens do pedido
                
                $stmt_itens->bindParam(':id_pedido', $id_pedido, PDO::PARAM_INT);
                $stmt_itens->bindParam(':id_produto', $item['id_produto'], PDO::PARAM_INT);
                $stmt_itens->bindParam(':quantidade', $item['quantidade'], PDO::PARAM_INT);

                // Executar a consulta SQL para os itens do pedido
                if ($stmt_itens->execute()) {
                    echo "Item do pedido inserido com sucesso!\n";
                } else {
                    throw new Exception("Erro ao inserir item do pedido na tabela: " . $stmt_itens->errorInfo()[2]);
                }
            }
        } else {
            throw new Exception("Erro ao inserir pedido(s) na tabela: " . $stmt_pedidos->errorInfo()[2]);
        }
    }

    $conexao->commit();

  
    $preference = new MercadoPago\Preference();

    $item = new MercadoPago\Item();
    $item->title = 'pedido delivery'; // Nome do produto
    $item->quantity = 1; // Quantidade do produto
    $item->unit_price = (double)$pedido['valor_total']; // Preço unitário do produto
    $preference->items = array($item);
    
    $preference->back_urls = array(
        "success" => "localhost/delivery/views/notification.php", // URL de sucesso
        "failure" => "localhost/delivery/views/notification.php", // URL de falha
        "pending" => "localhost/delivery/views/notification.php" // URL pendente
    );
    
    $preference->payment_methods = array(
        "excluded_payment_methods" => array(
            array("id" => "amex")
        ),
        "excluded_payment_types" => array(
            array("id" => "atm"),
            array("id" => "ticket")
        ),
        "installments" => 6
    );
    
    $preference->notification_url = 'https://seusite.com.br/notification.php'; // URL de notificação de pagamento
    $preference->external_reference = $pedido['numero_pedido']; // Referência externa para a ordem de pagamento
    
    $preference->save();
    
    $link = $preference->init_point;
    
    // redireciona para a pagina de checkout  Mercado Pago 
    header("Location: {$link}"); 
    // Limpar a sessão 'dados' e também a carrinho
    unset($_SESSION['carrinho']);

   
     exit;
    

} catch (Exception $e) {
    $conexao->rollBack();
    echo "Erro na transação: " . $e->getMessage();
}
