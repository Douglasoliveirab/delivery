<?php

include "master.php";
include "../.env/conexao.php";
$select = $conexao->prepare("SELECT * FROM administrador");
$select->execute();
$adms = $select->fetchAll();

?>

<ol class="breadcrumb">
<?php 
if(isset($_SESSION['previlegios']) && $_SESSION['previlegios'] == 'admin'){
  echo '<li>
  <button id="btn-cadastrar-adm">Cadastrar administrador</button>
</li>
';
}
?>
    
</ol>
</section>


<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="card">
            <form id="form-adm" action="recebe_adm.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="banner">Nome</label>
                    <input type="text" name="nome_usuario" id="nome_usuario" required>
                </div>
                <div class="form-group">
                    <label for="banner">Sobrenome</label>
                    <input type="text" name="sobrenome" id="" max-length="20" required>
                </div>
                <div class="form-group">
                    <label for="banner">Senha</label>
                    <input type="password" name="senha" id="" required>
                </div>
                <div class="form-group">
                    <label for="banner">CPF</label>
                    <input type="tel" name="cpf" id="" required>
                </div>
                <div class="form-group">
                    <label for="banner">Email</label>
                    <input type="email" name="email" id="" required>
                </div>

                <div class="form-group">
                    <label for="banner">Endereco completo</label>
                    <input type="text" name="endereco" id="" required>
                </div>
                <div class="form-group">
                    <label for="banner">Telefone</label>
                    <input type="tel" name="telefone" id="" required>
                </div>
                <div class="form-group">
                    <label for="banner">Privilégio</label>
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
                                <th>Telefone</th>
                                <th>privilégio</th>
                                <th>Ações</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($adms as $adm) {

                                echo '<tr style="align-items:center;">
                                            <td>' . $adm['nome_usuario'] . '</td> 
                                            <td>' . $adm['sobrenome'] . '</td>
                                            <td>' . $adm['email'] . '</td>
                                            <td>' . $adm['telefone'] . '</td>
                                            <td>' . $adm['previlegios'] . '</td>
                                            
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