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
?>