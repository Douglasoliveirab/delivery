<?php
$select = $conexao->prepare("SELECT * FROM banner");
$select->execute();
$banners = $select->fetchAll();
echo ' <div class="controle-img-topo">';
foreach ($banners as $banner) {
    echo "<img src='../painel/" . $banner["caminho_banner"] . "'>";
}
