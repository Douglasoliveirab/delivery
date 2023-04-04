<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../controllers/getcarrinho.php";
include "../.env/conexao.php";
if (isset($_SESSION['carrinho'])) {
    $itens = countItens();
} else {
    $itens = 0;
}
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="assets/css/index.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Loja Etec</title>

<!--INICIO HEAD DESKTOP-->
<div class="controle-itens2">
    <div class="itens-head2">

        <div class="itens">
            <?php
            if (
                isset($_SESSION['usuario']) && $_SESSION['usuario'] != "" &&
                $_SESSION['id_cliente'] != "" && $_SESSION['endereco'] != ""
            ) {
                $usuario = $_SESSION['usuario'];
                $usuario = ucfirst($usuario);
                $id_cliente = $_SESSION['id_cliente'];
                $endereco = $_SESSION['endereco'];
                
                echo '<a href="login/logout.php"><i class="bi bi-box-arrow-left"></i>  Sair </a>';
                echo '<a href="index.php">Inicio</a>';
                echo ' <a href="pedidos_cliente.php?id_cliente=' . $id_cliente . '" class="footer-link" id="btn-busca"><i class="bi bi-receipt"></i>Pedidos</a>';
                echo '<a href="login_cliente.html"><i class="bi bi-person"></i>' . $usuario . '</a>';
                echo ' <a href="#"><i class="bi bi-geo-alt" id="btn-busca"></i>' . $endereco . '</a>';
            } else {
                echo "<div class='itens'>
                            <a href='cadastre-se.html'>CADASTRE-SE</a>
                            <a href='login_cliente.html'>LOGIN</a>
                            </div>";
            }
            ?>
        </div>
    </div>

    <div class="item-carrinho">
        <div class="itens_bag"><?= $itens ?></div>
        <div>
            <a href="carrinho.php"><i class="bi bi-basket"></i></a>
        </div>
    </div>
</div>
<!-- FIM HEAD DESKTOP-->
<!--INICIO HEAD MOBILE-->
<div class="mob">
    <!-- <a href="" class="footer-link" active><i class="bi bi-house"></i>Inicio</a> -->



    <?php
    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != "") {
        $usuario = $_SESSION['usuario'];
        $usuario = ucfirst($usuario);
        echo '<a href="login/logout.php" class="footer-link"><i class="bi bi-box-arrow-left"></i>Sair</a>';
        echo '<a href="index.php" class="footer-link"><i class="bi bi-house"></i>Inicio</a>';
        echo ' <a href="pedidos_cliente.php?id_cliente=' . $id_cliente . '" class="footer-link" id="btn-busca"><i class="bi bi-receipt"></i>Pedidos</a>';
        echo '<a href="#" class="footer-link"><i class="bi bi-person"></i>' . $usuario . '</a>';
    } else {
        echo '<a href="index.php" class="footer-link"><i class="bi bi-house"></i>Inicio</a>';
        echo ' <a href="login_cliente.html" class="footer-link" id="btn-busca"><i class="bi bi-receipt"></i>Pedidos</a>';
        echo '<a href="login_cliente.html" class="footer-link"><i class="bi bi-person"></i>Perfil</a>';
    }
    ?>

    <?php
    if ($itens > 0) {
        echo '<a href="carrinho.php" class="footer-link"><div class="itens_bag">' . $itens . '</div><i class="bi bi-basket"></i></a>';
    } else {
        echo '<a href="carrinho.php" class="footer-link"><i class="bi bi-basket"></i>Carrinho</a>';
    }
    ?>
</div>
<!--FIM HEAD MOBILE-->