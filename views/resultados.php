<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Verificar se os resultados da busca estão armazenados na sessão
if (isset($_SESSION['resultados_busca'])) {
    $resultados = $_SESSION['resultados_busca'];
    // Limpar os resultados da sessão após exibi-los
    unset($_SESSION['resultados_busca']);

    // Incluir o cabeçalho e outros elementos HTML
    include "cabecalho.php";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/index.css">
        <title>Resultados da Busca</title>
    </head>

    <body>
        <div class="container_loja">
            <?php
            foreach ($resultados as $produto) {
                echo '<div class="loja">';
                echo '<div class="conteudo">';
                echo '<img src="../painel/' . $produto["img_produto"] . '">';
                echo '<h3>' . $produto["nome_produto"] . '</h3>';
                echo '<p class="descricao">' . $produto["descricao"] . '</p>';
                echo '<p>R$ ' . number_format($produto['preco'], 2, ",", ".") . '</p>';
                echo '</div>';
                echo '<div class="botao">';
                echo '<a href="../controllers/add_carrinho.php?add=carrinho&id=' . $produto["id_produto"] . '" class="btn-adicionar"><i class="bi bi-basket"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<hr/>';
            }
            ?>
        </div>

    </body>

    </html>

<?php
} else {
    // Se os resultados da busca não estiverem disponíveis na sessão, redirecionar para a página inicial
    header('Location: ../views/');
    exit();
}
?>