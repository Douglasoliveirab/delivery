<?php
session_start();
include "../.env/conexao.php";

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];

    // Recupere as informações do administrador com base no ID do banco de dados
    $query = $conexao->prepare("SELECT * FROM administrador WHERE id_administrador = ?");
    $query->bindParam(1, $id, PDO::PARAM_INT);
    $query->execute();
    $administrador = $query->fetch(PDO::FETCH_ASSOC);

    // Preencha os campos com os valores do administrador
    $id_administrador = $administrador['id_administrador'];
    $nome_usuario = $administrador['nome_usuario'];
    $sobrenome = $administrador['sobrenome'];
    $senha = $administrador['senha'];
    $cpf = $administrador['cpf'];
    $email = $administrador['email'];
    $endereco = $administrador['endereco'];
    $telefone = $administrador['telefone'];
    $previlegios = $administrador['previlegios'];

    // Exiba o formulário com os campos preenchidos
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Atualizar Administrador</title>
        <link rel="stylesheet" href="pianelcss/atualizar_produto.css">
    </head>
    <body>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close"><a href="adm.php">&times;</a></span>
                <div class="card">
                    <form method="POST" id="form-administrador" enctype="multipart/form-data" action="script_atualizacao_admin.php" class="card-body">
                        <div class="form-group">
                            <label for="id_administrador">ID do Administrador:</label>
                            <input type="text" id="id_administrador" name="id_administrador" value="'.$id_administrador.'" required class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nome_usuario">Nome do Usuário:</label>
                            <input type="text" id="nome_usuario" name="nome_usuario" value="'.$nome_usuario.'" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="sobrenome">Sobrenome:</label>
                            <input type="text" id="sobrenome" name="sobrenome" value="'.$sobrenome.'" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" id="senha" name="senha" value="'.$senha.'" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" id="cpf" name="cpf" value="'.$cpf.'" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email" value="'.$email.'" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" id="endereco" name="endereco" value="'.$endereco.'" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="text" id="telefone" name="telefone" value="'.$telefone.'" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="previlegios">Privilégios:</label>
                            <input type="text" id="previlegios" name="previlegios" value="'.$previlegios.'" required class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Atualizar Administrador" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
    ';
}
?>
