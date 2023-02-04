        <?php
        session_start();
        if(isset($_SESSION['itens'])){
            $itens = count($_SESSION['itens']);
        }else{
            $itens = 0;
        }
        

        ?>

        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="stylesheet" href="assets/css/index.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Loja Etec</title>
        </head>

        <body>

            <div class="controle-head">
                <div class="itens-head">Div Lanche</div>
            </div>

            <div class="controle-itens2">

                <div class="itens-head2">
                    <div class="itens">LOGIN</div>
                    <div class="itens">CADASTRO</div>
                    <div class="itens">PEDIDOS</div>
                </div>

                <div class="item-carrinho">
                    <div class="itens_bag"><?= $itens ?></div>
                    <div><a href="views/carrinho.php"><img src="https://cdn-icons-png.flaticon.com/512/3139/3139155.png"></a></div>

                </div>

            </div>

            <div class="controle-img-topo">
                <img src="assets/imagens/imagen-top.png" alt="" class="">
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
            <br>
            <div class="categorias">
            <div class="itens-categorias">
                    <a href="#">Comida</a>
                </div>
                <div class="itens-categorias">
                <a href="#">Hambúrguer</a> 
                </div>
                <div class="itens-categorias">
                <a href="categorias/pizzas.php">Pizzas</a>
                </div>
                <div class="itens-categorias">
                    <a href="categorias/hotdog.php">Hotdog</a>
                </div>
            </div>

        </body>

        </html>