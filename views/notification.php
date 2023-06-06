
<?php
session_start();
include "../.env/conexao.php";
require '../vendor/autoload.php';
include './login/verifica_login.php';

//GWT para identificar o numero do peido
if(isset($_GET['external_reference']) != null || ""  && isset($_GET['collection_id']) != null || ""){
$numero_pedido = $_GET['external_reference'];
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
$status_pagamento = $dados_transacao->status;


//Atualiza o status do pedido na tabela pedidos
$sql = "UPDATE pedidos SET status_pagamento = :status_pagamento WHERE numero_pedido = :numero_pedido";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':status_pagamento', $status_pagamento);
$stmt->bindParam(':numero_pedido', $numero_pedido);
$stmt->execute();

echo "<head>
  <title>Seu Título</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  <link rel='stylesheet' href='assets/css/aproved.css'>
</head>
<body>
 <div class='container'>
          <div class='icon'>
          <i class='fas fa-check'></i>
          </div>
          <p class='success-message'>Recebemos o seu pagamento obrigado :) <br/>
           você sera redirecionado em 5 segundos...</p>
        </div>
        </body>
</html>";
 


// Espera 5 segundos antes de redirecionar para a página destino
header('Refresh: 5; URL=index.php');

}else{
  echo "erro para finalizar o seu pagamento em caso de cobrança ou algum problema entre em contato";
}

?>



 