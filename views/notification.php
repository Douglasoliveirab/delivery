<?php
include "../.env/conexao.php";
require '../vendor/autoload.php';

// Configura as credenciais de acesso à API
MercadoPago\SDK::setAccessToken("TEST-1472282048459445-032409-8723148853628c0116c89b140f329544-1337839420");
if(isset($_GET) && $_GET['collection_id'] !== "" || null){
   // Obtém o ID do pagamento a partir do parâmetro GET
$collection_id = $_GET['collection_id'];

// Busca o pagamento na API do Mercado Pago
$payment = MercadoPago\Payment::find_by_id($collection_id);

// Obtém o status do pagamento
$status_pagamento = $payment->status;

// Obtém o número do pedido a partir do parâmetro GET
$numero_pedido = $_GET['external_reference'];

//Atualiza o status do pedido na tabela pedidos
$sql = "UPDATE pedidos SET status_pagamento = :status_pagamento WHERE numero_pedido = :numero_pedido";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':status_pagamento', $status_pagamento);
$stmt->bindParam(':numero_pedido', $numero_pedido);
$stmt->execute();

echo "Status do pedido atualizado para: " . $status_pagamento;

// Espera 5 segundos antes de redirecionar para a página destino
header('Refresh: 5; URL=index.php');

// Exibe uma mensagem para o usuário informando sobre o redirecionamento
echo "Você será redirecionado para a página destino em 5 segundos...";
}else{
  header('Refresh: 5; URL=index.php');
  echo "o seu pagamento falhou";
}



 
?>

