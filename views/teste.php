<?php
// Credenciais de acesso à API do Mercado Pago
$access_token = 'TEST-1472282048459445-032409-8723148853628c0116c89b140f329544-1337839420';
// $client_id = 'SEU_CLIENT_ID';

// ID da transação que você deseja consultar o status
$id_transacao = $_GET['collection_id'];

// URL da API com os parâmetros necessários
$url = 'https://api.mercadopago.com/v1/payments/' . $id_transacao . '?access_token=' . $access_token;

// Faz a requisição GET utilizando a função cURL do PHP
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json'
  )
));

$response = curl_exec($curl);

curl_close($curl);

// Converte a resposta JSON em um objeto do PHP
$dados_transacao = json_decode($response);

// Obtém o status da transação
$status = $dados_transacao->status;

// Exibe o status da transação
echo 'Status da transação: ' . $status;
?>