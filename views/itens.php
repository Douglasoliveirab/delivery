<?php
session_start();
include "cabecalho.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/itens.css">
    <title>produtos</title>
</head>
<body>
   <!-- Modal HTML -->
   <form method="post" action="atualiza_endereco.php">
        <div class="custom-modal">
            <div class="custom-modal-content">
            <span class="modal-close-mob">&times;</span>
                <h3 class="custom-modal-title">Editar Endereço</h3>
                <input type="hidden" name="id_cliente" value="<?= $id_cliente ?>" />
                <input type="text" class="custom-modal-input" id="novo_endereco" name="novo_endereco" placeholder="Digite o novo endereço" value="<?=$endereco?>">
                <button type="submit" class="custom-modal-btn"> Atualizar </button>
            </div>
        </div>
    </form>
<?php


if (isset($_GET['id_categoria']) && is_numeric($_GET['id_categoria'])) {
    
    $idCategoria = $_GET['id_categoria'];
    
    // Aqui você pode executar sua consulta SQL para buscar os dados da categoria
} 
$select = $conexao->prepare("SELECT * FROM produtos WHERE id_categoria = :idCategoria and status_produto = 'ativo'" );
$select->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
$select->execute();
$query = $select->fetchAll();


 // Verificar se o usuário está logado e possui um ID de cliente
 if (isset($_SESSION['id_cliente'])) {
  $id_cliente = $_SESSION['id_cliente'];

  // Consultar o endereço do cliente na tabela clientes
  $stmt = $conexao->prepare("SELECT endereco FROM clientes WHERE id_cliente = :id_cliente");
  $stmt->bindParam(':id_cliente', $id_cliente);
  $stmt->execute();

  // Verificar se a consulta retornou algum resultado
  if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $_SESSION['endereco'] = $row['endereco'];
      $endereco = $_SESSION['endereco'];

      // Usar o valor do endereço como desejar
      echo '<div class="localizacao">
      <i class="bi bi-geo-alt">Endereço de entrega</i><br>
      <span class="endereco">' . $endereco . '</span>
      <i class="bi bi-pencil editar" style="color:red" id="btn-editar">editar</i>
  </div>';
  } 
}

echo '<div class="container_produtos">';
foreach ($query as $produtos) {
    echo '<div class="produto">
    <div class="conteudo" style="display:flex;align-items:center">
    <img src="../painel/'. $produtos["img_produto"].'">
    <div>
      <h3>'. $produtos["nome_produto"].'</h3>
      <p class="descricao">'. $produtos["descricao"].'</p>
      <p>R$  '. number_format($produtos['preco'],2,",",".").'</p>
    </div>
    </div>
    <div class="botao">
      <a href="../controllers/add_carrinho.php?add=carrinho&id='.$produtos["id_produto"].'" class="btn-adicionar"><i class="bi bi-basket"></i></a>
    </div>
   </div>
    <hr/>';
}
echo '</div>';
?>

  <script>
      // Exibir o modal e preencher o campo com o valor atual do endereço
      $('#btn-editar').click(function() {
            
            $('.custom-modal').show();
        });


        $('.modal-close-mob').click(function() {
                $('.custom-modal').css('display', 'none');
            });

         // Abrir o modal ao clicar no botão "Editar"
         $('#edit-address').click(function(e) {
                e.preventDefault();
                $('#address-modal').css('display', 'block');
            });

            // Fechar o modal ao clicar no botão de fechar ou fora do modal
            $('.modal-close').click(function() {
                $('#address-modal').css('display', 'none');
            });
            $(window).click(function(event) {
                if (event.target == document.getElementById('address-modal')) {
                    $('#address-modal').css('display', 'none');
                }
            });

    
</script>
  </script> 
</body>
</html>
