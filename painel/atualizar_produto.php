<?php
session_start();
include "../.env/conexao.php";

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];

    // Recupere as informações do produto com base no ID do banco de dados
    $query = $conexao->prepare("SELECT * FROM produtos WHERE id_produto = ?");
    $query->bindParam(1, $id, PDO::PARAM_INT);
    $query->execute();
    $produto = $query->fetch(PDO::FETCH_ASSOC);

    // Preencha os campos com os valores do produto
    $idProduto = $produto['id_produto'];
    $imgProduto = $produto['img_produto'];
    $nomeProduto = $produto['nome_produto'];
    $descricao = $produto['descricao'];
    $custoProduto = $produto['custo_produto'];
    $preco = $produto['preco'];
    $statusProduto = $produto['status_produto'];

    // Exiba o formulário com os campos preenchidos
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Atualizar Produto</title>
        <link rel="stylesheet" href="pianelcss/atualizar_produto.css">
    </head>
    <body>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close"><a href="all_produtos.php">&times;</a></span>
                <div class="card">
                    <form method="POST" id="form-produto" enctype="multipart/form-data" action="script_atualizacao.php" class="card-body">
                        <div class="form-group">
                            <label for="id_produto">ID do Produto:</label>
                            <input type="text" id="id_produto" name="id_produto" value="'.$idProduto.'" required class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="img_produto">Imagem do Produto:</label>
                            <img src="'.$imgProduto.'" alt="Imagem do Produto">
                            <input type="file" id="img_produto" name="img_produto" accept="image/jpeg, image/png" class="form-control-file">
                        </div>
    
                        <div class="form-group">
                            <label for="nome_produto">Nome do Produto:</label>
                            <input type="text" id="nome_produto" name="nome_produto" value="'.$nomeProduto.'" required class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="descricao">Descrição do Produto:</label>
                            <textarea id="descricao" name="descricao" required class="form-control">'.$descricao.'</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="custo_produto">Custo do Produto:</label>
                            <input type="tel" id="custo_produto" name="custo_produto" value="'.$custoProduto.'" required class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="preco">Preço do Produto:</label>
                            <input type="tel" id="preco" name="preco" step="0.01" value="'.$preco.'" required class="form-control">
                        </div>
    
                        <div class="form-group">
                        <label for="status_produto">Status do Produto:</label>
                        <select id="status_produto" name="status_produto" required class="form-control">
                            <option value="ativo" '.($statusProduto === "ativo" ? "selected" : "").'>Ativo</option>
                            <option value="inativo" '.($statusProduto === "inativo" ? "selected" : "").'>Inativo</option>
                        </select>
                    </div>
    
                        <div class="form-group">
                            <input type="submit" value="Atualizar Produto" class="btn btn-primary">
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
