<?php
session_start();

// Configuração do banco de dados
require_once "../.env/conexao.php";

if (isset($_POST['search-produto']) && !empty($_POST['search-produto'])) {
    $searchTerm = $_POST['search-produto'];

   include "search/buscaProdutos.php";

    // Verificar se foram encontrados produtos
    if (count($resultados) > 0) {
        // Redirecionar para a página de resultados
        $_SESSION['resultados_busca'] = $resultados;
        header('Location: resultados.php');
        exit();
    } else {
        // Exibir mensagem de nenhum produto encontrado
        echo '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Nenhum produto encontrado</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <style>
                body {
                    background-color: #f1f1f1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                
                .container {
                    width: 400px;
                    padding: 20px;
                    background-color: #fff;
                    text-align: center;
                }
                
                .container i {
                    font-size: 100px;
                    color: gray;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <i class="fas fa-shopping-basket"></i>
                <p>Nenhum produto encontrado.</p>
                <a href="../views/">Voltar à página inicial</a>
            </div>
        
            <script src="https://kit.fontawesome.com/SEU_CODIGO.js" crossorigin="anonymous"></script>
        </body>
        </html>
        ';
    }
}else{
    header('location: index.php');
}

// Fechar a conexão com o banco de dados
$conexao = null;
