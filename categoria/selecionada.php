<?php
include "../.env/conexao.php";
if (isset($_GET['id_categoria']) && is_numeric($_GET['id_categoria'])) {
    
    $idCategoria = $_GET['id_categoria'];
    
    // Aqui você pode executar sua consulta SQL para buscar os dados da categoria
} 
$select = $conexao->prepare("SELECT * FROM produtos WHERE id_categoria = :idCategoria");
$select->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
$select->execute();
$produtos = $select->fetchAll();


foreach ($produtos as $produto) {
    echo 'nome:  '. $produto["nome_produto"].' <br/>
    descrição:'. $produto["descricao"].'  <br/>
    R$  '. number_format($produto['valor'],2,",",".").'<br/>
    <a href="../controllers/add_carrinho.php?add=carrinho&id_produto='.$produto["id_produto"].'">Adicionar</a>
    <hr/>';
}

?>