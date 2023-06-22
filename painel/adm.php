<?php

session_start();
include "../.env/conexao.php";

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    $update_admin = $conexao->prepare("UPDATE administrador SET status_adm = 'inativo' WHERE id_administrador = ?");
    $update_admin->bindParam(1, $id, PDO::PARAM_INT);
    $update_admin->execute();
    header("Location: adm.php");
    exit();
}

if (isset($_GET['habilitar'])) {
    $id = (int) $_GET['habilitar'];

    $update_admin = $conexao->prepare("UPDATE administrador SET status_adm = 'ativo' WHERE id_administrador = ?");
    $update_admin->bindParam(1, $id, PDO::PARAM_INT);
    $update_admin->execute();
    header("Location: adm.php");
    exit();
}

if (isset($_GET['todos'])) {
    $select = $conexao->prepare("SELECT * FROM administrador");
    $select->execute();
    $adms = $select->fetchAll();
} elseif (isset($_GET['ativos'])) {
    $select = $conexao->prepare("SELECT * FROM administrador WHERE status_adm = 'ativo'");
    $select->execute();
    $adms = $select->fetchAll();
} elseif (isset($_GET['inativos'])) {
    $select = $conexao->prepare("SELECT * FROM administrador WHERE status_adm = 'inativo'");
    $select->execute();
    $adms = $select->fetchAll();
} else {
    $select = $conexao->prepare("SELECT * FROM administrador WHERE status_adm = 'ativo'");
    $select->execute();
    $adms = $select->fetchAll();
}

// Exiba a página do administrador
include "master.php";

  ?>



<ol class="breadcrumb">
<?php 
if(isset($_SESSION['previlegios']) && $_SESSION['previlegios'] == 'admin'){
  echo '<li>
  <button id="btn-cadastrar-adm" class="btn btn-default">Cadastrar administrador</button>
</li>
';
}
?>
    <li>
        <a href="?todos" class="btn btn-default">Mostrar Todos administradores</a>
    </li>
    <li>
        <a href="?ativos" class="btn btn-default">Mostrar administradores Ativos</a>
    </li>
    <li>
        <a href="?inativos" class="btn btn-default">Mostrar administradores Desabilitados</a>
    </li>
</ol>
</section>


<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="card">
            <form id="form-adm" action="recebe_adm.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="adm">Nome</label>
                    <input type="text" name="nome_usuario" id="nome_usuario" required>
                </div>
                <div class="form-group">
                    <label for="adm">Sobrenome</label>
                    <input type="text" name="sobrenome" id="" max-length="20" required>
                </div>
                <div class="form-group">
                    <label for="adm">Senha</label>
                    <input type="password" name="senha" id="" required>
                </div>
                <div class="form-group">
                    <label for="adm">CPF</label>
                    <input type="tel" name="cpf" id="" required>
                </div>
                <div class="form-group">
                    <label for="adm">Email</label>
                    <input type="email" name="email" id="" required>
                </div>

                <div class="form-group">
                    <label for="adm">Endereco completo</label>
                    <input type="text" name="endereco" id="" required>
                </div>
                <div class="form-group">
                    <label for="adm">Telefone</label>
                    <input type="tel" name="telefone" id="" required>
                </div>
                <div class="form-group">
                    <label for="adm">Privilégio</label>
                    <select  name="previlegios">
                        <option value ="admin">Administrador</option>
                        <option value ="usuario">Usuario</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Criar Administrador">
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
                <p>administrador criado com sucesso!</p>
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
                    <h3 class="box-title">Lista de administradores</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>email</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Status</th>
                                <th>privilégio</th>
                                <th>Ações</th>

                            </tr>
                        </thead>
                        <tbody>

                        <?php
foreach ($adms as $adm) {
    echo '<tr style="align-items:center;">
              <td>' . $adm['nome_usuario'] . '</td> 
              <td>' . $adm['sobrenome'] . '</td>
              <td>' . $adm['email'] . '</td>
              <td>' . $adm['cpf'] . '</td>
              <td>' . $adm['telefone'] . '</td>
              <td>' . $adm['status_adm'] . '</td>
              <td>' . $adm['previlegios'] . '</td>
              <td>';

    if ($adm['status_adm'] == 'inativo') {
        echo '<a href="atualizar_adm.php?id=' . $adm['id_administrador'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
              <a href="?habilitar=' . $adm['id_administrador'] . '" class="btn btn-success btn-xs btn-flat">Habilitar</a>';
    } elseif ($adm['status_adm'] == 'ativo') {
        echo '<a href="atualizar_adm.php?id=' . $adm['id_administrador'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
              <a href="?delete=' . $adm['id_administrador'] . '" class="btn btn-danger btn-xs btn-flat">Excluir</a>';
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