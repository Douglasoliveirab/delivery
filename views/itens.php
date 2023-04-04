<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/itens.css">
    <title>produtos</title>
</head>
<body>
<?php

include "cabecalho.php";
if (isset($_GET['id_categoria']) && is_numeric($_GET['id_categoria'])) {
    
    $idCategoria = $_GET['id_categoria'];
    
    // Aqui você pode executar sua consulta SQL para buscar os dados da categoria
} 
$select = $conexao->prepare("SELECT * FROM produtos WHERE id_categoria = :idCategoria and status_produto = 'ativo'" );
$select->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
$select->execute();
$query = $select->fetchAll();


if (isset($_SESSION['endereco']) && $_SESSION['endereco'] != "") {
    echo ' <div class="localizacao">
                     <i class="bi bi-geo-alt" id="btn-busca"></i>' . $endereco . '
                  </div>';
}
echo '<div class="container_produtos">';
foreach ($query as $produtos) {
    echo '<div class="produto">
    <div class="conteudo" style="display:flex;align-items:center">
    <img src="../painel/'. $produtos["img_produto"].'">
    <div>
      <h3>'. $produtos["nome_produto"].'</h3>
      <p class="descricao">'. $produtos["descricao"].'</p>
      <p>R$  '. number_format($produtos['preco'],2,",",".").'</p>
    </div>
    </div>
    <div class="botao">
      <a href="../controllers/add_carrinho.php?add=carrinho&id='.$produtos["id_produto"].'" class="btn-adicionar"><i class="bi bi-basket"></i></a>
    </div>
   </div>
    <hr/>';
}
echo '</div>';
?>
</body>
</html>
