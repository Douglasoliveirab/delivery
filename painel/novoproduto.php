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
	<link rel="stylesheet" href="./pianelcss/cdprodutos.css">
	<title>Painel adiministrador</title>
</head>
<body>
	<div class="top_head">
	    <div class="itens-top"><img src="assets/imagens/div_red-removebg-preview.png" alt="" class="img-top"><div class="user">Olá, <?php echo $_SESSION['usuario'];?></div></div>
		<div class="itens-top"><a href="login/paineldgccmaga.php">Voltar ao painel</a></div>

    </div>
	<hr>
<div class="controle_form">
<form action="controllers/recebe_produto.php" method="POST" enctype="multipart/form-data">
	<br>
		<p><h3>Cadastro de novos Produtos</h3></p>
		
		<p><label for="nome">Nome do Produto</label> </p>

		<p><input type="text" name="nome_produto"  class="input_form" required/></p>
		
		<p><label for="des">Descrição</label></p>
		<input type="text" name="descricao"  class="input_form" required/></p>
		
        <p><label for="valor">valor do produto</label></p>
		<p><input type="text" name="valor"  class="input_form" required/></p>

		<p><label for="valor">custo do produto</label></p>
		<p><input type="text" name="valor"  class="input_form" required/></p>
		
		<p><label for="imagem">Imagem do Produto</label></p>
		<p><input type="file" name="img_produto"  class="input_form" required/></p>
	
		<p><input type="submit" value="Finalizar Cadastro" class="btn_envia"/></p>
		<br>
	</form>
</div>

</html>