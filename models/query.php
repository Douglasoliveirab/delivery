<?php
session_start();
include "../.env/conexao.php";
//funcao pega todos os produtos da categoria pizzas
function getPizzas($conexao)
{
    $select = $conexao->prepare("SELECT * FROM produtos WHERE categoria='pizzas'");
    $select->execute();
    $fetch = $select->fetchAll();

    foreach ($fetch as $produto) {
        echo 'nome:  '. $produto["nome"].' <br/>
         descrição:'. $produto["desc"].'  <br/>
         R$  '. number_format($produto['preco'],2,",",".").'<br/>
         <a href="../controllers/add_carrinho.php?add=carrinho&id='.$produto["id"].'">Adicionar</a>
         <hr/>';
    }
}
//funcao pega todos os produtos da categoria hot-dog
function getDog($conexao)
{
    $select = $conexao->prepare("SELECT * FROM produtos WHERE categoria='hot-dog'");
    $select->execute();
    $fetch = $select->fetchAll();

    foreach ($fetch as $produto) {
        echo 'nome: '. $produto['nome'] .'<br/>
        descrição:'. $produto['desc'] .'<br/>
         R$ ' . number_format($produto["preco"],2,",",".") . '<br/>
         <a href="../controllers/add_carrinho.php?add=carrinho&id='.$produto["id"].'">Adicionar</a>
        <hr/>';
    }
}
?>
