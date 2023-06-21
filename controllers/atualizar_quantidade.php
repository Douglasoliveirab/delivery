<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['acao']) && isset($_GET['id'])) {
        $acao = $_GET['acao'];
        $idProduto = $_GET['id'];

        if ($acao === 'mais') {
            // Incrementa a quantidade do produto no carrinho
            $_SESSION['carrinho'][$idProduto]++;
        } elseif ($acao === 'menos') {
            // Verifica se a quantidade é maior que 1 antes de decrementar
            if ($_SESSION['carrinho'][$idProduto] > 1) {
                $_SESSION['carrinho'][$idProduto]--;
            } elseif ($_SESSION['carrinho'][$idProduto] === 1) {
                // Se a quantidade for igual a 1 e a ação for "menos", remove o produto do carrinho
                unset($_SESSION['carrinho'][$idProduto]);
            }
        }
    }
}

// Redireciona de volta para a página do carrinho
header('Location: ../views/carrinho.php');
exit();

?>
