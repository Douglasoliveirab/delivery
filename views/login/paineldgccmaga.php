<?php
session_start();
  include('verifica_login.php');
$pdo = new PDO ('mysql:host=localhost;dbname=id18614539_appdiv',"id18614539_root","uF~8%QrmR%J>}2f2");
$sql = $pdo ->prepare ("SELECT * FROM usuario");
$sql->execute();


if (isset($_GET['delete'])) {

	$id = (int)$_GET['delete'];
	$pdo->exec("DELETE FROM infos WHERE id=$id");
	header('Location: ');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="text.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    <title>Div Comercios online</title>
</head>
<body>

    <div class="top">
        <div class="itens-top">Olá, <?php echo $_SESSION['usuario'];?></div>
       
		<div class="itens-top">
			<a href="logout.php" class="itens-top-logo"> Sair </a>
		</div>
	
        
    </div>
    <div class="menu-categorias">
      <div class="categorias">Restaurantes</div>
      <div class="categorias">Pizzarias</div>
      <div class="categorias">Mercados</div>
      <div class="categorias">Bebidas</div>
      <div class="categorias">Pets</div>
      <div class="categorias">Doces</div>
      <div class="categorias">Acougue</div>
      </div>
   <hr>
 
     <div class="controle-banner-promocao">
      <img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/03menuentregagratis2bisnaga_eZRR.png" class="banner-feira">
      <img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/03menuentregagratis2bisnaga_eZRR.png" class="banner-feira">
      <img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/03menuentregagratis2bisnaga_eZRR.png" class="banner-feira">
     
     
     </div>


<div id="text_em_alta">
Comércios em alta
</div>


<div class="comercios_em_alta">


    <div class="comercios"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_thumbnail/logosgde/201801231937__HABIB_VERDE.jpg"></a></div>


     <div class="comercios"> <a href="#"><img src="https://static-images.ifood.com.br/image/upload/t_thumbnail/logosgde/201906182008_2b157a73-7564-4733-94c1-8d0376e7bb39.png"></a></div>
     
     <div class="comercios">  <a href=""><img src="https://static-images.ifood.com.br/image/upload/t_thumbnail/logosgde/d4a3984f-2b73-4f46-99df-1d6bc79ff293/202001031317_CXpO_i.png" ></a></div>
     
     <div class="comercios"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_thumbnail/logosgde/Logo%20McDonald_MCDON_DRIV15.jpg"></a></div>


     <div class="comercios"> <a href="#"><img src="https://static-images.ifood.com.br/image/upload/t_thumbnail/logosgde/201910292243_94aaf166-84cc-4ebf-a35d-d223be34d01f.png"></a></div>
     
     <div class="comercios">  <a href=""><img src="https://static-images.ifood.com.br/image/upload/t_thumbnail/logosgde/202010121938_31dbd467-bb46-4884-8879-e545789acc39.png" ></a></div>
     
     <div class="comercios"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/202006160727_43bee831-2385-40de-bdd0-179b026ec456.jpg"></a></div>

     <div class="comercios"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/a93696cc-df78-4b06-9229-8312b8793c7f/202205301814_qr2R_i.jpg"></a></div>

     <div class="comercios"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/0d981df1-7bf4-4440-a19a-16591a33b94d/202106081431_tj1F_i.jpg"></a></div>

     <div class="comercios"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/b65117a6-a13c-425c-b7f0-0fb8ba445ed4/202003231911_Vkmw_.jpeg"></a></div>


     <div class="comercios"> <a href="#"><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/e3bad929-4835-4c99-89ff-ec039665dcd5/202012152147_JcvN_i.png"></a></div>
     
     <div class="comercios">  <a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/f83739c1-9ab8-4ce0-a0a0-8891ef7d1441/202203281606_tj11_i.jpg" ></a></div>
     
     <div class="comercios"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/cd82227a-6ca1-40bc-b5e8-68e71221bd59/202108140911_fUxL_i.png"></a></div>


     <div class="comercios"> <a href="#"><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/8c343a14-e6be-4492-9318-8c67e4e083cd/201904081505_img20.jpg"></a></div>
     
     <div class="comercios">  <a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/5bca3a2b-8d08-455e-8dfd-7d95540cdf9b/202201240017_lkQ6_i.jpg" ></a></div>
     
     <div class="comercios"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/16679750-6478-4fee-b9bf-e4525980bf94/202201261002_QjHW_.jpeg"></a></div>

     <div class="comercios"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/logosgde/d3624119-36a2-499e-8a99-6286d71f3dfb/202108191732_1aSE_i.png"></a></div>
  </div>
<!-- Fim parceiros em alta -->

<div id="text_em_alta">
  Promoções imperdiveis
  </div>
<div class="controle-banner-promocao">
 <img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/03menuentregagratis2bisnaga_eZRR.png" class="banner-feira">
 <img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/03menuentregagratis2bisnaga_eZRR.png" class="banner-feira">
 <img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/03goumetselecaobisnaga2_hWdM.png" class="banner-feira">

</div>

<!-- inicio dos popular -->

<div id="text_em_alta">
  Mais buscados
  </div>
<div class="categoria_popular">


  <div class="popular"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Mercado-nov_20_v3gC.jpg"></a></div>


   <div class="popular"> <a href="#"><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Padaria-out_20_7j6C.jpg"></a></div>
   
   <div class="popular">  <a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Saudavel-out_20_xTER.jpg" ></a></div>
   
   <div class="popular"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Japonesa-out_20_Y35F.jpg"></a></div>


   <div class="popular"> <a href="#"><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Marmita-nov_20_Jdve.jpg"></a></div>
   
   <div class="popular">  <a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Brasileira-nov_20_4P7h.jpg" ></a></div>
   
   <div class="popular"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Promocoes1_wjjx.png"></a></div>

   <div class="popular"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Lanches-out_20_LYk4.jpg"></a></div>

   <div class="popular"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/convenienciaAzGa_fVlS.png"></a></div>

   <div class="popular"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Doces_e_bolos-out_20_AJ6s.jpg"></a></div>

   <div class="popular"><a href=""><img src="https://static-images.ifood.com.br/image/upload/t_high/discoveries/Pastel-out_20_XrHw.jpg"></a></div>



</div>


    <footer class="rodape">
      <hr>
      
<div class="texto-rodape">© Copyright 2022 - Todos os direitos reservados Douglas Oliveira</div> 
    

</footer>

</html>
	
     

