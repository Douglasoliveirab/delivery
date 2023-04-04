<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//verifica se existe usuario logado se não existir redireciona
//para faser login e nao adiciona ao carrinho
if(!isset($_SESSION['usuario'])){
    header('Location: ../views/login_cliente.html');
exit();
}
//se nao existir ainda a sessao carrinho prepara a sessao 
//criando um array vazio
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
//verifica se existi o parametro carrinho com valor de id
//se existir atribui o valor para a variavel $idProduto
if (isset($_GET['add']) && $_GET['add'] == 'carrinho') {
    $idProduto = $_GET['id'];
   //verifica se ja existi ua sessao carrinho com o id do prudto 
   //se existir ele incrementa com mais 1 na quantidade
    if (isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto]++;
        //se nao existir o id do produto na sessao carrinho ele conta com um 
    } else {
        $_SESSION['carrinho'][$idProduto] = 1;
    }
    //redirecio para a pagina anterior
    echo "<script>javascript:history.go(-1)</script>";
}
?>
    
