<?php
include "../.env/conexao.php";
if (isset($_GET['id_categoria']) && is_numeric($_GET['id_categoria'])) {
    
    $idCategoria = $_GET['id_categoria'];
    
    // Aqui você pode executar sua consulta SQL para buscar os dados da categoria
} 
$select = $conexao->prepare("SELECT * FROM produtos WHERE id_categoria = :idCategoria");
$select->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
$select->execute();
$query = $select->fetchAll();


foreach ($query as $produtos) {
    echo 'nome:  '. $produtos["nome_produto"].' <br/>
    descrição:'. $produtos["descricao"].'  <br/>
    R$  '. number_format($produtos['preco'],2,",",".").'<br/>
    <a href="../views/add_carrinho.php?add=carrinho&id='.$produtos["id_produto"].'">Adicionar</a>
    <hr/>';
}

?>