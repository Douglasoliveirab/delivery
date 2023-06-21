<?php
session_start();
include "../.env/conexao.php";

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];

    // Recupere as informações da categoria com base no ID do banco de dados
    $query = $conexao->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
    $query->bindParam(1, $id, PDO::PARAM_INT);
    $query->execute();
    $categoria = $query->fetch(PDO::FETCH_ASSOC);

    // Preencha os campos com os valores da categoria
    $id_categoria = $categoria['id_categoria'];
    $img_categoria = $categoria['img_categoria'];
    $nome_categoria = $categoria['nome_categoria'];

    // Exiba o formulário com os campos preenchidos
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Atualizar Categoria</title>
        <link rel="stylesheet" href="pianelcss/atualizar_produto.css">
    </head>
    <body>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close"><a href="all_categorias.php">&times;</a></span>
                <div class="card">
                    <form method="POST" id="form-produto" enctype="multipart/form-data" action="script_atualizacao_categoria.php" class="card-body">
                        <div class="form-group">
                            <label for="id_categoria">ID da Categoria:</label>
                            <input type="text" id="id_categoria" name="id_categoria" value="'.$id_categoria.'" required class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="img_categoria">Imagem da Categoria:</label>
                            <img src="'.$img_categoria.'" alt="Imagem da Categoria" style="max-width: 300px;">
                            <input type="file" id="img_categoria" name="img_categoria" accept="image/jpeg, image/png" class="form-control-file">
                        </div>

                        <div class="form-group">
                        <label for="nome_categoria">Nome da Categoria</label>
                        <input type="text" name="nome_categoria" value="'.$nome_categoria.'" required class="form-control">

                          </div>

                        <div class="form-group">
                            <input type="submit" value="Atualizar Categoria" class="btn btn-primary">
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
