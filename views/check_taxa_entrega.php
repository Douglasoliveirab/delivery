<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function tipoEntrega() {
    $result = array();

    if (isset($_POST['tipo_entrega']) && $_POST['tipo_entrega'] == 'entrega') {
        $frete = 5.00;
        $tipo_entrega = $_POST['tipo_entrega'];
    } else {
        $frete = 0.00;
        $tipo_entrega = $_POST['tipo_entrega'];
    }

    $result['frete'] = $frete;
    $result['tipo_entrega'] = $tipo_entrega;

    return $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dadosEntrega = tipoEntrega();

    $frete = $dadosEntrega['frete'];
    $tipo_entrega = $dadosEntrega['tipo_entrega'];

    // Armazena os valores na sessão
    $_SESSION['frete'] = $frete;
    $_SESSION['tipo_entrega'] = $tipo_entrega;

    header("Location: carrinho.php");
    exit;
}



?>
