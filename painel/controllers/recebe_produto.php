<?php
session_start();
include "../../.env/conexao.php";



// Verifica se é uma imagem válida
$tipo = $_FILES['img_produto']['type'];
if($tipo == 'image/jpeg' || $tipo == 'image/png') {

  // Verifica se a pasta "produtos" existe, se não existir, cria a pasta
  if (!file_exists("produtos")) {
      mkdir("produtos");
  }

  // Move o arquivo para o diretório de uploads
  $caminho_img_produto = $_FILES['img_produto']['name'];
  $img_produto = 'produtos/' . $caminho_img_produto;
  move_uploaded_file($_FILES['img_produto']['tmp_name'], $img_produto);
  
  // Insere as informações do produto na tabela produtos
  $nome_produto = $_POST['nome_produto'];
  $descricao = $_POST['descricao'];
  $custo_produto = $_POST['custo_produto'];
  $preco = $_POST['preco'];
  $id_categoria = $_POST['id_categoria'];
  $status_produto = $_POST['status_produto'];
  $sql = "INSERT INTO produtos (nome_produto, img_produto, descricao, custo_produto, preco, id_categoria,status_produto) VALUES (?, ?, ?, ?, ?, ?,?)";
  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(1, $nome_produto);
  $stmt->bindParam(2, $img_produto);
  $stmt->bindParam(3, $descricao);
  $stmt->bindParam(4, $custo_produto);
  $stmt->bindParam(5, $preco);
  $stmt->bindParam(6, $id_categoria);
  $stmt->bindParam(7, $status_produto);
  $stmt->execute();

  
} else {
  echo 'Apenas imagens JPEG e PNG são permitidas.';
}
// Espera 5 segundos antes de redirecionar para a página destino
header('Refresh: 4; URL=../produtos.php');

// Exibe uma mensagem para o usuário informando sobre o redirecionamento
echo "produto cadstrado você sera redirecionado em 4 segundos...";

?>
