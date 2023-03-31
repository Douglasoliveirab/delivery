<?php
session_start();
// include('login/verifica_sessao.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Painel adiministrador</title>
</head>
<body>


<form method="POST" enctype="multipart/form-data" action="controllers/recebe_produto.php">
  <label for="nome_produto">Nome do Produto:</label>
  <input type="text" id="nome_produto" name="nome_produto" required>

  <label for="img_produto">Imagem do Produto:</label>
  <input type="file" id="img_produto" name="img_produto" required accept="image/jpeg,image/png">

  <label for="descricao">Descrição do Produto:</label>
  <textarea id="descricao" name="descricao" required></textarea>

  <label for="custo_produto">Custo do Produto:</label>
  <input type="number" id="custo_produto" name="custo_produto"  required>

  <label for="preco">Preço do Produto:</label>
  <input type="number" id="preco" name="preco" step="0.01" required>

  <label for="categoria_id">Categoria:</label>
<select name="id_categoria" id="categoria_id">
    <?php
         include "../.env/conexao.php";
		$select = $conexao->prepare("SELECT * FROM categoria");
		$select->execute();
		$categorias = $select->fetchAll();
        

        foreach($categorias as $categoria) {
            echo "<option value='".$categoria['id_categoria']."'>".$categoria['nome_categoria']."</option>";
        }

		
    ?>
</select>
  <input type="submit" value="Adicionar Produto">
</form>



</html>


