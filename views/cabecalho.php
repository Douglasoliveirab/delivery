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
        <img src="./assets/imagens/div_red-removebg-preview.png">
        <div class="itens">
            <?php
            // Consultar a tabela "loja"
            $stmt = $conexao->prepare("SELECT nome_loja, status_loja FROM loja");
            $stmt->execute();

            // Verificar se a consulta retornou algum resultado
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $nomeLoja = $row['nome_loja'];
                $statusLoja = $row['status_loja'];
                $_SESSION["status_loja"] = $statusLoja;
            } else {
                // Se não houver registros na tabela "loja", defina valores padrão
                $nomeLoja = "Nome da Loja";
                $statusLoja = "Status da Loja";
                
            }
            //verifica se existe o usuario logado para buscar o endereço no banco
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
                }
            }
            if (
                isset($_SESSION['usuario']) && $_SESSION['usuario'] != "" &&
                $_SESSION['id_cliente'] != "" && $_SESSION['endereco'] != ""
            ) {
                $usuario = $_SESSION['usuario'];
                $usuario = ucfirst($usuario);
                $id_cliente = $_SESSION['id_cliente'];
                $endereco = $_SESSION['endereco'];
                echo '<a href="index.php">Inicio</a>';
                echo ' <a href="pedidos_cliente.php?id_cliente=' . $id_cliente . '" class="footer-link" id="btn-busca">Pedidos</a>';
                echo '<a href="#">' . $usuario . '</a>';
                echo '   <a href="#" id="edit-address">' . $endereco . ' <i class="bi bi-pencil" style="color:red">Editar</i></a>';
                echo '<a href="login/logout.php">  Sair </a>';
            } else {
                echo "<div class='itens'>
                            <a href='cadastre-se.php'>CADASTRE-SE</a>
                            <a href='login_cliente.php'>LOGIN</a>
                            <i class='bi bi-shop'></i> ' . $statusLoja . '</a>'
                            </div>";
            }
            ?>
        </div>
    </div>
    <!-- Modal de Edição de Endereço -->
    <div id="address-modal" class="modal-endereco">
        <div class="modal-content-desk">
            <span class="modal-close">&times;</span>
            <h2 class="custom-modal-title">Editar Endereço</h2>
            <form id="address-form" method="POST" action="atualiza_endereco.php">
                <input type="hidden" name="id_cliente" value="<?= $id_cliente ?>" />
                <input type="text" class="custom-modal-input" id="novo_endereco" name="novo_endereco" placeholder="Digite o novo endereço" value="<?= $endereco ?>">
                <button class="custom-modal-btn" type="submit"> Atualizar </button>
            </form>
        </div>
    </div>
    <div class="align" style="display:flex;align-items: center;">
    <div class="status_loja"><i class="bi bi-shop" ></i> <?=$statusLoja?></div>
    <div class="item-carrinho">
      
        <div class="itens_bag"><?= $itens ?></div>
        <div>
            <a href="carrinho.php"><i class="bi bi-basket"></i></a>
        </div>
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
        echo ' <a href="login_cliente.php" class="footer-link" id="btn-busca"><i class="bi bi-receipt"></i>Pedidos</a>';
        echo '<a href="login_cliente.php" class="footer-link"><i class="bi bi-person"></i>Perfil</a>';
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