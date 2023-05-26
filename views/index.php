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
    //mostra o enderço
   include "queries/checkLogado.php";
   //banners 
   include "queries/banners.php";
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
    include "queries/categorias.php";
    
    // mais vendidos
    include "queries/maisVendidos.php";

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
                        <h3> Politicas Div </h3>
                     
                    </div>
                    <div class="col-md-6">
                        <h3>Sobre nós</h3>
                       
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <div class="icon-sociais">
                                <li><i class="bi bi-facebook"></i></li>
                                <li><i class="bi bi-instagram"></i></li>
                                <li><i class="bi bi-linkedin"></i></li>
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