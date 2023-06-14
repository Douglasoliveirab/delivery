<?php

include "master.php";
include "../.env/conexao.php";
$select = $conexao->prepare("SELECT * FROM categoria ");
$select->execute();
$categorias = $select->fetchAll();

?>

<ol class="breadcrumb">
    <?php
    if (isset($_SESSION['previlegios']) && $_SESSION['previlegios'] == 'admin') {
        echo  '<li>
        <button id="btn-cadastrar-categoria">Cadastrar Categoria</button>
    </li>';
    }
    ?>
    <li>
        <a href="?todos" class="btn btn-default">Mostrar Todos categorias</a>
    </li>
    <li>
        <a href="?ativos" class="btn btn-default">Mostrar Categorias Ativas</a>
    </li>

</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Categorias</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>imagem da categoria</th>
                                <th>codigo</th>
                                <th>Nome da categoria </th>
                                <th>Ações</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($categorias as $categoria) {

                                echo '<tr style="align-items:center;">
                                            <td><img src="' . $categoria['img_categoria'] . '" style="width:60px;height:60px;"></td>
                                            <td>' . $categoria['id_categoria'] . '</td> 
                                            <td>' . $categoria['nome_categoria'] . '</td>
                                             <td>
                                             <a href="atualizar_categoria.php?id=' . $categoria['id_categoria'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
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