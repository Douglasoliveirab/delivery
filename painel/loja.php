<?php
include "master.php";
include "../.env/conexao.php";
$select = $conexao->prepare("SELECT * FROM loja");
$select->execute();
$lojas = $select->fetchAll();
?>

<ol class="breadcrumb">

<?php 
foreach ($lojas as $loja) {
    if (isset($loja['status_loja']) && $loja['status_loja'] == 'Fechada') {
        echo '<form action="atualizar_status_loja.php" method="POST">
                  <input type="hidden" name="id_loja" value="' . $loja['id_loja'] . '">
                  <input type="hidden" name="novo_status" value="Aberta">
                  <button type="submit" id="abrir-loja">Abrir loja</button>
              </form>';
    } else {
        echo '<form action="atualizar_status_loja.php" method="POST">
                  <input type="hidden" name="id_loja" value="' . $loja['id_loja'] . '">
                  <input type="hidden" name="novo_status" value="Fechada">
                  <button type="submit" id="fechar-loja">Fechar loja</button>
              </form>';
    }
}
?>

</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detalhes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Nome da loja</th>
                                <th>Status da loja</th>
                                <th>telefone</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($lojas as $lojaItem) {

                                echo '<tr style="align-items:center;">
                                            <td>' . $lojaItem['nome_loja'] . '</td> 
                                            <td>' . $lojaItem['status_loja'] . '</td>
                                            <td>' . $lojaItem['telefone'] . '</td>
                    
                                             <td>
                                             <a href="atualizar_loja.php?id=' . $lojaItem['id_loja'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
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
    </div>
</section>
