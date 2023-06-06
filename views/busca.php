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
        echo 'Nenhum produto encontrado.';
        echo '<a href="../views/">Voltar à página inicial</a>';
    }
}else{
    header('location: index.php');
}

// Fechar a conexão com o banco de dados
$conexao = null;
