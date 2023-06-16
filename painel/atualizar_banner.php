<?php
session_start();
include "../.env/conexao.php";

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];

    // Recupere as informações do banner com base no ID do banco de dados
    $query = $conexao->prepare("SELECT * FROM banner WHERE id_banner = ?");
    $query->bindParam(1, $id, PDO::PARAM_INT);
    $query->execute();
    $banner = $query->fetch(PDO::FETCH_ASSOC);

    // Preencha os campos com os valores do banner
    $id_banner = $banner['id_banner'];
    $img_banner = $banner['img_banner'];
    $caminho_banner = $banner['caminho_banner'];
   

    // Exiba o formulário com os campos preenchidos
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Atualizar Banner</title>
        <link rel="stylesheet" href="pianelcss/atualizar_produto.css">
    </head>
    <body>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close"><a href="all_banners.php">&times;</a></span>
                <div class="card">
                    <form method="POST" id="form-produto" enctype="multipart/form-data" action="script_atualizacao_banner.php" class="card-body">
                        <div class="form-group">
                            <label for="id_banner">ID do Banner:</label>
                            <input type="text" id="id_banner" name="id_banner" value="'.$id_banner.'" required class="form-control" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="img_banner">Imagem do Banner:</label>
                            <img src="'.$caminho_banner.'" alt="Imagem do Banner" style="max-width: 300px;">
                            <input type="file" id="img_banner" name="img_banner" accept="image/jpeg, image/png" class="form-control-file">
                        </div>
    
            
    
                        <div class="form-group">
                            <input type="submit" value="Atualizar Banner" class="btn btn-primary">
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
