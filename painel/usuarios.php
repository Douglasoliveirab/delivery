<?php

include "master.php";
include "../.env/conexao.php";
$select = $conexao->prepare("SELECT * FROM clientes");
$select->execute();
$clientes = $select->fetchAll();

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
                                <h3 class="box-title">Lista de Usuários</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>E-mail</th>
                                            <th>CPF</th>
                                            <th>Telefone</th>
                                            <th>Endereço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php foreach ($clientes as $client){
                                            
                                            echo'<tr>
                                            <td>'.$client['nome'].'</td>
                                             <td>'.$client['sobrenome'].'</td>
                                             <td>'.$client['cpf'].'</td>
                                             <td>'.$client['email'].'</td>
                                             <td>'.$client['telefone'].'</td>
                                             <td> '.$client['endereco'].'</td>
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

