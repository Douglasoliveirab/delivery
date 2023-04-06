<?php

include "master.php";
include "../.env/conexao.php";
$select = $conexao->prepare("SELECT * FROM banner ");
$select->execute();
$banners = $select->fetchAll();

?>

<ol class="breadcrumb">

    <li>
        <button id="btn-cadastrar-banner">Cadastrar novo banner</button>
    </li>

</ol>
</section>


<div id="modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="card">
      <form id="form-banner" action="controllers/recebe_banner.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="banner">Selecione uma imagem:</label>
          <input type="file" name="banner" id="banner" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Enviar">
        </div>
      </form>
    </div>
  </div>
</div>

<div id="success-modal" class="modal">
  <div class="modal-content">
    <div class="card">
      <div class="success-message">
        <i class="fa fa-check-circle"></i>
        <p>Banner criado com sucesso!</p>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Banners</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>imagem</th>
                                <th>codigo do banner</th>
                                <th>Ações</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($banners as $banner) {

                                echo '<tr style="align-items:center;">
                                            <td><img src="' . $banner['caminho_banner'] . '" style="width:120px;height:60px;"></td> 
                                            <td>' . $banner['id_banner'] . '</td>
                    
                                             <td>
                                                 <button type="button" class="btn btn-primary btn-xs btn-flat">
                                                     Editar
                                                 </button>
                                                 <button type="button" class="btn btn-danger btn-xs btn-flat">
                                                     Excluir
                                                 </button>
                                             </td>
                                             </tr>';
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        </body>

        </html>