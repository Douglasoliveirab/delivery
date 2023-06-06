<?php
    
    // Consulta SQL
    $query = "SELECT * FROM produtos WHERE nome_produto LIKE :searchTerm";

    // Preparação e execução da consulta
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
    $stmt->execute();

    // Obter os resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>