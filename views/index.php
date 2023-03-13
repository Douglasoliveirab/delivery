        <?php
        session_start();
        include "../controllers/getcarrinho.php";
        include "../.env/conexao.php";
        if (isset($_SESSION['carrinho'])) {
            $itens = countItens();
        } else {
            $itens = 0;
        }
        ?>

        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="stylesheet" href="../assets/css/index.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Loja Etec</title>
        </head>

        <body>

            <div class="controle-head">
                <div class="itens-head">Div Lanche</div>
            </div>

            <div class="controle-itens2">

                <div class="itens-head2">
                    <div class="itens">
                        <a href="login_cliente.html">LOGIN</a>
                    </div>

                    <div class="itens"><a href="#">CADASTRO</a></div>
                    <div class="itens"><a href="#">PEDIDOS</a></div>
                </div>

                <div class="item-carrinho">
                    <div class="itens_bag"><?= $itens ?></div>
                    <div><a href="carrinho.php"><img src="https://cdn-icons-png.flaticon.com/512/3139/3139155.png"></a></div>

                </div>

            </div>

            <div class="controle-img-topo">
                <img src="../assets/imagens/imagen-top.png" alt="" class="">
            </div>

            <div class="slogan">
                <p>Pensou, pediu chegou!</p>
            </div>

            <div class="slogan2">
                <p>Humm, hoje eu vou querer...</p>
            </div>

            <div class="iten-search">
                <p> <input type="text" name="search-produto" class="input-search"> </p>
                <p> <input type="submit" class="btn-search" value="Pesquisar"> </p>
            </div>
            <?php
            //puxa todas as categorias do banco
            $select = $conexao->prepare("SELECT * FROM categoria");
            $select->execute();
            $categorias = $select->fetchAll();

            echo "<div class='categorias'>";
            foreach ($categorias as $categoria) {
                echo "
                <div class='itens-categorias'>
                    <a href='../categorias/selecionada.php?id_categoria=".$categoria['id_categoria']."'>" . $categoria["nome_categoria"] . "</a>
                    
                    </div>";
            }
            echo " </div>";

            ?>

        </body>

        </html>