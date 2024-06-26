

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="assets/css/cadastrar.css">
    <title>Login cliente Div</title>
</head>

<body>
    <div class="topo">
        <a href="index.php"> Voltar</a>

    </div>


    <div class="container_form">
        <a href="index.html"> <img src="assets/imagens/div_red-removebg-preview.png" alt="" class="imagem-topo"></a>
        
        <br>
        <p>
      

        <form action="login/cadastrar.php" method="post"  class="newConta">

            <input type="text" name="nome" class="campos" placeholder="Digite o seu Nome" maxlength="20" minlength="2" required>
            <input type="text" name="sobrenome" class="campos" placeholder="Digite o seu Sobrenome" maxlength="20" minlength="2" required>
            <input type="tel" name="cpf" class="campos" placeholder="Digite o seu CPF" maxlength="14" minlength="14" required>
            <?php
                if (isset($_GET['error']) && $_GET['error'] == 'invalid_cpf') {
                    echo '<div style="color: red; margin-left: 10%; text-align: left;">CPF inválido. Digite um CPF válido.</div>';
                }
                ?>
            <input type="email" name="email" class="campos" placeholder="Digite o seu melhor Email" required>
            <input type="tel" name="telefone" class="campos" placeholder="Digite o seu telefone" maxlength="16" minlength="9" required>
            <input type="text" name="endereco" class="campos" placeholder="Digite o seu endereço completo" maxlength="60" minlength="15" required>
            <input type="password" id="senha" name="senha"  class="campospw" placeholder=" Digite a sua Senha" maxlength="15" required>
            <span class="senha-toggle"><i class="bi bi-eye-fill"></i></span>
            <input type="password" id="confirma_senha"  name="confirma_senha" class="campospw" placeholder=" Confirme a sua Senha" maxlength="15" required>
            <span class="confirma-senha-toggle"><i class="bi bi-eye-fill"></i></span>
            <div id="senha-mensagem"></div>

            <br>
            <br>

            <div class="alinha-botao">
                <button type="submit" class="btn_envia"><strong>Criar conta</strong></button>
                <button class="btn_novo" id="nextLogar">
                    <!-- <a href="cadastrar.html" style="color: white;text-decoration:none;"> -->
                   Já tenho conta
                    <!-- </a> -->
                </button>

            </div>
            <br>

        </form>

        <form action="login/login.php" method="post"  id="logar">


            <input type="email" name="email" class="campos" placeholder="Digite o seu Email" maxlength="50" required>
            <br>

            <input type="password" name="senha" class="campos" placeholder="Digite a sua Senha" maxlength="15" required>
            <br>
            <br>

            <div class="alinha-botao">
                <button type="submit" class="btn_envia"><strong>Entrar</strong></button>
                <button type="button"class="btn_novo" id="newUser">Cadastre-se</button>
                <!-- <button type="button"class="btn_novo" id="btn_newUser"><a href="cadastrar.html" style="color: white;text-decoration:none;">Novo
                        usuario</a></button> -->
                        

            </div>
            <br>

        </form>
        </p>

    </div>
<script src="assets/js/cadastrar.js"></script>

</body>
</html>