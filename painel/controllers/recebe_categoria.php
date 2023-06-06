<?php
session_start();
include "../../.env/conexao.php";

// Verifica se é uma imagem válida
$tipo = $_FILES['img_categoria']['type'];
if($tipo == 'image/jpeg' || $tipo == 'image/png') {

  // Verifica se a pasta "categorias" existe, se não existir, cria a pasta
  if (!file_exists("categorias")) {
      mkdir("categorias");
  }

  // Move o arquivo para o diretório de uploads
  $caminho_img = $_FILES['img_categoria']['name'];
  $img_categoria = 'categorias/' . $caminho_img;
  move_uploaded_file($_FILES['img_categoria']['tmp_name'], $img_categoria);
  
  // Recebe as informações do formulário
  $nome_categoria = $_POST['nome_categoria'];

  // Insere as informações da categoria na tabela categoria
  $sql = "INSERT INTO categoria (img_categoria, nome_categoria) VALUES (?, ?)";
  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(1, $img_categoria);
  $stmt->bindParam(2, $nome_categoria);
  $stmt->execute();
} else {
  
  header('Refresh: 4; URL=../categorias.php');

// Exibe uma mensagem para o usuário informando sobre o redirecionamento
echo 'Apenas imagens JPEG e PNG são permitidas.';
echo "Erro na criação da categoria você sera redirecionado em 4 segundos...";
}
header('Refresh: 4; URL=../categorias.php');

// Exibe uma mensagem para o usuário informando sobre o redirecionamento
echo "Categoria criada com sucesso você sera redirecionado em 4 segundos...";
?>
