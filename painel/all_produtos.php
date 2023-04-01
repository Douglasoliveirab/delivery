<?php

include "../.env/conexao.php";
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    $update_produto = $conexao->prepare("UPDATE produtos SET status_produto = 'inativo' WHERE id_produto = ?");
    $update_produto->bindParam(1, $id, PDO::PARAM_INT);
    $update_produto->execute();
    header("Location: all_produtos.php");
    exit();
}
if (isset($_GET['todos'])) {
    $select = $conexao->prepare("SELECT * FROM produtos");
    $select->execute();
$produtos = $select->fetchAll();
}

elseif (isset($_GET['ativos'])) {
$select = $conexao->prepare("SELECT * FROM produtos WHERE  status_produto = 'ativo'");
$select->execute();
$produtos = $select->fetchAll();
}else{
    $select = $conexao->prepare("SELECT * FROM produtos WHERE  status_produto = 'ativo'");
$select->execute();
$produtos = $select->fetchAll();
}
include "master.php";
?>



<ol class="breadcrumb">

    
                    <li>
                    <a href="?todos" class="btn btn-default">Mostrar Todos os Produtos</a>
                    </li>
                    <li>
                      <a href="?ativos" class="btn btn-default">Mostrar Produtos Ativos</a>
                  </li>

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
                                            <th>Nome do produto</th>
                                            <th>Descrição</th>
                                            <th>Custo Produto</th>
                                            <th>Preço</th>
                                            <th>status_produto</th>
                                            <th>Ações</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php 
                               
                                        foreach ($produtos as $produto){
                                            
                                            echo'<tr style="align-items:center;">
                                            <td><img src="produtos/'.$produto['img_produto'].'" style="width:50px;height:60px;"></td>
                                            <td>'.$produto['nome_produto'].'</td>
                                             <td>'.$produto['descricao'].'</td>
                                             <td>'.$produto['custo_produto'].'</td>
                                             <td>'.$produto['preco'].'</td>
                                             <td>'.$produto['status_produto'].'</td>
                                             <td>
                                                 <button type="button" class="btn btn-primary btn-xs btn-flat">
                                                     Editar
                                                 </button>
                                                 <a href="?delete='.$produto['id_produto'].'" class="btn btn-danger btn-xs btn-flat">
                                                     Excluir
                                                 </a>
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