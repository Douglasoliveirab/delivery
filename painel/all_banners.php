<?php


include "../.env/conexao.php";
if (isset($_GET['delete'])) {
  $id = (int) $_GET['delete'];

  $update_banner = $conexao->prepare("UPDATE banner SET status_banner = 'inativo' WHERE id_banner = ?");
  $update_banner->bindParam(1, $id, PDO::PARAM_INT);
  $update_banner->execute();
  header("Location: all_banners.php");
  exit();
}

if (isset($_GET['habilitar'])) {
  $id = (int) $_GET['habilitar'];

  $update_banner = $conexao->prepare("UPDATE banner SET status_banner = 'ativo' WHERE id_banner = ?");
  $update_banner->bindParam(1, $id, PDO::PARAM_INT);
  $update_banner->execute();
  header("Location: all_banners.php");
  exit();
}

if (isset($_GET['todos'])) {
  $select = $conexao->prepare("SELECT * FROM banner");
  $select->execute();
  $banners = $select->fetchAll();
} elseif (isset($_GET['ativos'])) {
  $select = $conexao->prepare("SELECT * FROM banner WHERE status_banner = 'ativo'");
  $select->execute();
  $banners = $select->fetchAll();
} elseif (isset($_GET['inativos'])) {
  $select = $conexao->prepare("SELECT * FROM banner WHERE  status_banner = 'inativo'");
  $select->execute();
  $banners = $select->fetchAll();
} else {
  $select = $conexao->prepare("SELECT * FROM banner WHERE status_banner = 'ativo'");
  $select->execute();
  $banners = $select->fetchAll();
}
include "master.php";
?>

<ol class="breadcrumb">

<?php 
if(isset($_SESSION['previlegios']) && $_SESSION['previlegios'] == 'admin'){
  echo '<li>
  <button id="btn-cadastrar-banner" class="btn btn-default">Cadastrar banner</button>
</li>
';
}
?>
 <li>
        <a href="?todos" class="btn btn-default">Mostrar Todos Banners</a>
    </li>
    <li>
        <a href="?ativos" class="btn btn-default">Mostrar Banners Ativos</a>
    </li>
    <li>
        <a href="?inativos" class="btn btn-default">Mostrar Banners Desabilitados</a>
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
    <label for="status_banner">Status do banner:</label>
        <select name="status_banner" id="status_banner" required>
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
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

                                <th>Imagem</th>
                                <th>Codigo do banner</th>
                                <th>Status do banner</th>
                                <th>Ações</th>

                            </tr>
                        </thead>
                        <tbody>

                        <?php
foreach ($banners as $banner) {
    echo '<tr style="align-items:center;">
            <td><img src="' . $banner['caminho_banner'] . '" style="width:120px;height:60px;"></td>
            <td>' . $banner['id_banner'] . '</td>
            <td>' . $banner['status_banner'] . '</td>
            <td>';

    // Verifica se o parâmetro "?todos" está presente na URL
    if (isset($_GET['todos'])) {
        if ($banner['status_banner'] == 'inativo') {
            echo '<a href="atualizar_banner.php?id=' . $banner['id_banner'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
                 <a href="?habilitar=' . $banner['id_banner'] . '" class="btn btn-success btn-xs btn-flat">Habilitar</a>';
        } elseif ($banner['status_banner'] == 'ativo') {
            echo '<a href="atualizar_banner.php?id=' . $banner['id_banner'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
                  <a href="?delete=' . $banner['id_banner'] . '" class="btn btn-danger btn-xs btn-flat">Excluir</a>';
        }
    } else {
        // Verifica se existe o parâmetro "?inativos" na URL
        if (!isset($_GET['inativos'])) {
            echo '<a href="atualizar_banner.php?id=' . $banner['id_banner'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
                  <a href="?delete=' . $banner['id_banner'] . '" class="btn btn-danger btn-xs btn-flat">Excluir</a>';
        } // Verifica se existe o parâmetro "?ativos" na URL
        elseif (isset($_GET['inativos'])) {
            echo '<a href="atualizar_banner.php?id=' . $banner['id_banner'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
                  <a href="?habilitar=' . $banner['id_banner'] . '" class="btn btn-success btn-xs btn-flat">Habilitar</a>';
        }
    }

    echo '</td></tr>';
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