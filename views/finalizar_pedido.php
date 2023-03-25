<?php
session_start();

// Faz conexão com o banco de dados aqui
include "../.env/conexao.php";

// Prepara a consulta SQL para inserir os pedidos
$sql_pedidos = "INSERT INTO pedidos (id_pedido, id_cliente, datahora_pedido, numero_pedido, subtotal, frete, valor_total, status) 
        VALUES (:id_pedido, :id_cliente, :datahora_pedido, :numero_pedido, :subtotal, :frete, :valor_total, :status)";

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
        $stmt_pedidos->bindParam(':status', $pedido['status'], PDO::PARAM_STR);

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

    //Faz a requisicao e envia os valores para o mercado pago
    require  '../vendor/autoload.php'; // You have to require the library from your Composer vendor folder
    //Token da conta mercado pago
    $accessToken = "APP_USR-1472282048459445-032409-cb28e763a5c0258351c4844cb36f0d9c-1337839420";
    MercadoPago\SDK::setAccessToken($accessToken); // Either Production or SandBox AccessToken
    
    $preference = new MercadoPago\Preference();
    
    $items = array(); // initialize an array to store the items

    // Loop para pegar os dados do acrrinho e enviar para a Mp
    foreach($_SESSION['dados'] as $produto){
       $numero_pedido =$produto['numero_pedido'];
        $item = new MercadoPago\Item();
        $item->title = $numero_pedido;
        $item->quantity = 1;
        $item->unit_price = (double) $produto['valor_total'];
        array_push($items, $item);
    }
    
    $preference->items = $items; // definir a matriz de itens no objeto de preferência
    
    $preference->back_urls = array(
        "success" => "https://seusite.com.br/success",
        "failure" => "https://seusite.com.br/failure",
        "pending" => "https://seusite.com.br/pending"
    );
    
    // Exclui os metodos de pagemntos nos arrays abaixo
    $preference->payment_methods = array(
        "excluded_payment_methods" => array(
            array("id" => "amex")
        ),
        "excluded_payment_types" => array(
            array("id" => "atm")
        ),
        "excluded_payment_types" => array(
            array("id" => "ticket")
        ),
       
        "installments" => 6
    );
    //Url para notificação de status
    $preference->notification_url = 'https://seusite.com.br/notification.php';
    // referencia do numero do pedido para atualizar ststaus no banco
    $preference->external_reference = $numero_pedido;

    $preference->save();
    
    $link = $preference->init_point;
    
    // redireciona para a pagina de checkout  Mercado Pago 
    header("Location: {$link}"); 
    // Limpar a sessão 'dados' e também a carrinho
    unset($_SESSION['dados']);
    unset($_SESSION['carrinho']);

   
     exit;
    

} catch (Exception $e) {
    $conexao->rollBack();
    echo "Erro na transação: " . $e->getMessage();
}
?>