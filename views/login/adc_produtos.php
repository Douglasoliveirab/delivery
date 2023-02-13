

<?php
//arquivos que seerao capturados do formulario de cadastro de produtos
$imagem = $_FILES['arquivo']['name'];
$nome = $_POST['nome'];
$desc_produto = $_POST['desc_produto'];
$preco = $_POST['preco'];

//dados para conexão com BD
$servername = "localhost";
$database = "appdiv";
$username = "root";
$password = "root";


// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

 //insere os dados do formulario no banco de dados
$result_produto = "INSERT INTO produtos_divteste (imagem, nome, desc_produto, preco) VALUES ('$imagem', '$nome', '$desc_produto','$preco')";
$resultado_produto = mysqli_query($conn,$result_produto);

//fais o upload da imagem do computador para o servidor automaticamente
if (move_uploaded_file($_FILES['arquivo']['tmp_name'],$imagem)) {
  
  //msg de sucesso 
 echo '<div style="color:green;">Produto criado com sucesso boas vendas :)</div>';
 echo'<br>';
 echo '<a href="index.php">Voltar a Loja</a>';
}

?>
 
