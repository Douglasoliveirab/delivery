<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Categorias</title>
</head>
<body>
    <form action="controllers/recebe_categoria.php" method="post" enctype="multipart/form-data">
        <label for="img_categoria">Selecione uma imagem:</label>
        <input type="file" name="img_categoria" id="img_categoria"><br><br>
        <label for="nome_categoria">Nome da categoria:</label>
        <input type="text" name="nome_categoria" id="nome_categoria"><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
