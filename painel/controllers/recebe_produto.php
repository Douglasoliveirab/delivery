<?php

require_once('../../.env/conexao.php');

        // // Verifica se é uma imagem válida
        // $tipo = $_FILES['foto']['type'];
        // if($tipo == 'image/jpeg' || $tipo == 'image/png') {
        //     // Move o arquivo para o diretório de uploads
        //     $nome_arquivo = $_FILES['foto']['name'];
        //     $caminho_arquivo = 'uploads/' . $nome_arquivo;
        //     move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_arquivo);
        //     // Insere as informações da foto na tabela fotos
        //     $sql = "INSERT INTO produtos (img_produto, nome_produto,descricao,valor,custo_produto,categoria) VALUES (?,?,?,?,?,?)";
        //     $stmt = $conexao->prepare($sql);
        //     $stmt->bindParam(1, $img_produto);
        //     $stmt->bindParam(2, $nome_produto);
        //     $stmt->bindParam(3, $descricao);
        //     $stmt->bindParam(4, $valor);
        //     $stmt->bindParam(5, $custo_produto);
        //     $stmt->bindParam(6, $categoria);
        //     $stmt->execute();
            
        // } else {
        //     echo 'Apenas imagens JPEG e PNG são permitidas.';
        // }
        // echo "<script>window.location.href='novoproduto.php'</script>";
    
?>