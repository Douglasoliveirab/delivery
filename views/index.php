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
    // Verificar se o usuário está logado e possui um ID de cliente
    if (isset($_SESSION['id_cliente'])) {
        $id_cliente = $_SESSION['id_cliente'];

        // Consultar o endereço do cliente na tabela clientes
        $stmt = $conexao->prepare("SELECT endereco FROM clientes WHERE id_cliente = :id_cliente");
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();

        // Verificar se a consulta retornou algum resultado
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['endereco'] = $row['endereco'];
            $endereco = $_SESSION['endereco'];

            // Usar o valor do endereço como desejar
            echo '<div class="localizacao">
        <i class="bi bi-geo-alt">Endereço de entrega</i><br>
        <span class="endereco">' . $endereco . '</span>
        <i class="bi bi-pencil editar" style="color:red" id="btn-editar">editar</i>
    </div>';
        }
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
    <form method="post" action="atualiza_endereco.php">
        <div class="custom-modal">
            <div class="custom-modal-content">
            <span class="modal-close-mob">&times;</span>
                <h3 class="custom-modal-title">Editar Endereço</h3>
                <input type="hidden" name="id_cliente" value="<?= $id_cliente ?>" />
                <input type="text" class="custom-modal-input" id="novo_endereco" name="novo_endereco" placeholder="Digite o novo endereço" value="<?= $endereco ?>">
                <button type="submit" class="custom-modal-btn"> Atualizar </button>
            </div>
        </div>
    </form>

    <footer class="rodape">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- <h3>Cidades atendidas</h3>
                            <ul>
                                <li><a href="#">São Paulo</a></li>

                            </ul>
                        </div> -->
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
    <script>
        // Exibir o modal e preencher o campo com o valor atual do endereço
        $('#btn-editar').click(function() {

            $('.custom-modal').show();
        });

        // Fechar o modal ao clicar no botão de atualizar
        $('#btn-atualizar').click(function() {

        });
        $('.modal-close-mob').click(function() {
                $('.custom-modal').css('display', 'none');
            });

       
            // Abrir o modal ao clicar no botão "Editar"
            $('#edit-address').click(function(e) {
                e.preventDefault();
                $('#address-modal').css('display', 'block');
            });

            // Fechar o modal ao clicar no botão de fechar ou fora do modal
            $('.modal-close').click(function() {
                $('#address-modal').css('display', 'none');
            });
            $(window).click(function(event) {
                if (event.target == document.getElementById('address-modal')) {
                    $('#address-modal').css('display', 'none');
                }
            });
       
    </script>
</body>

</html>