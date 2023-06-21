<?php
    //seleciona os 6 mais vendidos de todas as categorias 
    $select = $conexao->prepare("SELECT p.id_produto, p.nome_produto, p.img_produto, p.descricao, p.preco, SUM(ip.quantidade) as total_vendido
            FROM produtos p
            INNER JOIN itens_pedido ip ON p.id_produto = ip.id_produto
            INNER JOIN pedidos pe ON pe.id_pedido = ip.id_pedido
            WHERE p.status_produto = 'ativo'
            GROUP BY p.id_produto
            ORDER BY total_vendido DESC
            LIMIT 9;
            ");
    $select->execute();
    $produtos = $select->fetchAll();

    echo "<p class='title-categoria'> Produtos mais vendidos</p>";
    echo '<div class="container_loja">';
    foreach ($produtos as $produto) {
        echo '<div class="loja">
                <div class="conteudo" style="display:flex;align-items:center">
                <img src="../painel/' . $produto["img_produto"] . '">
                    <div>
                    <h3>' . $produto["nome_produto"] . '</h3>
                    <p class="descricao">' . $produto["descricao"] . '</p>
                    <p>R$  ' . number_format($produto['preco'], 2, ",", ".") . '</p>
                    </div>
                </div>
                <div class="botao">
                        <a href="../controllers/add_carrinho.php?add=carrinho&id=' . $produto["id_produto"] . '" class="btn-adicionar"><i class="bi bi-basket"></i></a>
                    </div>
                </div>
                <hr/>';
    }
    echo '</div>';
?>