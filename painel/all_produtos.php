<?php

include "master.php";
include "../.env/conexao.php";
$select = $conexao->prepare("SELECT * FROM produtos ");
$select->execute();
$produtos = $select->fetchAll();

?>

<ol class="breadcrumb">
                    <li>
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="active">Usuários</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Lista de Produtos</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>imagem</th>
                                            <th>Categoria</th>
                                            <th>Nome do produto</th>
                                            <th>Descrição</th>
                                            <th>Custo Produto</th>
                                            <th>Preço</th>
                                            <th>Ações</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php foreach ($produtos as $produto){
                                            
                                            echo'<tr style="align-items:center;">
                                            <td><img src="produtos/'.$produto['img_produto'].'" style="width:50px;height:60px;"></td>
                                            <td>'.$produto['id_categoria'].'</td> 
                                            <td>'.$produto['nome_produto'].'</td>
                                             <td>'.$produto['descricao'].'</td>
                                             <td>'.$produto['custo_produto'].'</td>
                                             <td>'.$produto['preco'].'</td>
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