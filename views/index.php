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
    ?>

    <script src="./assets/js/index.js"></script>
</body>

</html>