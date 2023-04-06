<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    include "cabecalho.php";
    ?>
</head>

<body>

    <?php
    if (isset($_SESSION['endereco']) && $_SESSION['endereco'] != "") {
        echo ' <div class="localizacao">
                         <i class="bi bi-geo-alt" id="btn-busca"></i>' . $endereco . '
                      </div>';
    }

    $select = $conexao->prepare("SELECT * FROM banner");
    $select->execute();
    $banners = $select->fetchAll();
    echo ' <div class="controle-img-topo">';
    foreach ($banners as $banner) {
        echo "<img src='../painel/" . $banner["caminho_banner"] . "'>";
    }
    echo '</div>';
    ?>

    <div class="slogan">
        <p>Pensou, pediu chegou!</p>
    </div>

    <div class="slogan2">
        <p>Humm, hoje eu vou querer...</p>
    </div>

    <div class="container-busca" id="busca">
        <div class="iten-search">
            <p> <input type="text" name="search-produto" class="input-search"> </p>
            <p> <input type="submit" class="btn-search" value="Buscar"> </p>
        </div>
    </div>

    <p class="title-categoria"> Categorias</p>
    <?php
    //puxa todas as categorias do banco
    $select = $conexao->prepare("SELECT * FROM categoria");
    $select->execute();
    $categorias = $select->fetchAll();

    echo "<div class='categorias'>";
    foreach ($categorias as $categoria) {
        echo "
            <div class='itens-categorias'>
                <a href='itens.php?id_categoria=" . $categoria['id_categoria'] . "'>
                    <img src='../painel/" . $categoria['img_categoria'] . "'>
                    " . $categoria['nome_categoria'] . "
                </a>
            </div>";
    }
    echo "</div>";

    //seleciona os 6 mais vendidos de todas as categorias 
    $select = $conexao->prepare("SELECT p.id_produto, p.nome_produto, p.img_produto, p.descricao, p.preco, SUM(ip.quantidade) as total_vendido
    FROM produtos p
    INNER JOIN itens_pedido ip ON p.id_produto = ip.id_produto
    INNER JOIN pedidos pe ON pe.id_pedido = ip.id_pedido
    WHERE p.status_produto = 'ativo'
    GROUP BY p.id_produto
    ORDER BY total_vendido DESC
    LIMIT 6;
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

    <footer class="rodape">
        <div class="container">
            <div class="row">
            <div class="col-md-6">
                    <h3>Cidades atendidas</h3>
                    <ul>
                        <li><a href="#">São Paulo</a></li>
                        
                        
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Div Delivery</h3>
                    <ul>
                        <li><a href="#">Termos de Uso</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="#">Política de Reembolso</a></li>
                        <li><a href="#">Cookies</a></li>
                        <li><a href="#">Ajuda</a></li>
                        
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Descubra</h3>
                    <ul>
                        <li><a href="#">Cadastre seu Comércio</a></li>
                        <li><a href="#">Como funciona</a></li>
                        <li><a href="../painel/">Painel para parceiros</a></li>
                        <li><a href="#">Trabalhe conosco</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Social</h3>
                    <ul>
                        <div class="icon-sociais">
                        <li><i class="bi bi-facebook"></i></li>
                        <li><i class="bi bi-instagram"></i></li>
                        <li><i class="bi bi-linkedin"></i></li>
                        <li><i class="bi bi-twitter"></i></li>
                        <li><i class="bi bi-youtube"></i></li>
                        <li><i class="bi bi-whatsapp"></i></li>
                        </div>
                      
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="./assets/js/index.js"></script>
</body>

</html>