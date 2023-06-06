<?php
require_once('../../.env/conexao.php');

// Verifica se é uma imagem válida
$tipo = $_FILES['banner']['type'];
if($tipo == 'image/jpeg' || $tipo == 'image/png' && $tipo !== '') {

  // Verifica se a pasta "banners" existe, se não existir, cria a pasta
  if (!file_exists("banners")) {
      mkdir("banners");
  }

  // Move o arquivo para o diretório de uploads
  $caminho_banner = $_FILES['banner']['name'];
  $img_banner = 'banners/' . $caminho_banner;
  move_uploaded_file($_FILES['banner']['tmp_name'], $img_banner);
  
  // Insere as informações da foto na tabela fotos
  $sql = "INSERT INTO banner (img_banner, caminho_banner) VALUES (?, ?)";
  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(1, $caminho_banner);
  $stmt->bindParam(2, $img_banner);
  $stmt->execute();
} else {
  echo 'Apenas imagens JPEG e PNG são permitidas.';
}
echo "<script>window.location.href='../banner.php'</script>";
?>
