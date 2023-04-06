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
} elseif (isset($_GET['ativos'])) {
    $select = $conexao->prepare("SELECT * FROM produtos WHERE  status_produto = 'ativo'");
    $select->execute();
    $produtos = $select->fetchAll();
} else {
    $select = $conexao->prepare("SELECT * FROM produtos WHERE  status_produto = 'ativo'");
    $select->execute();
    $produtos = $select->fetchAll();
}
include "master.php";
?>



<ol class="breadcrumb">

    <li>
        <button id="btn-cadastrar-banner">Cadastrar novo Produto</button>
    </li>
    <li>
        <a href="?todos" class="btn btn-default">Mostrar Todos os Produtos</a>
    </li>
    <li>
        <a href="?ativos" class="btn btn-default">Mostrar Produtos Ativos</a>
    </li>


</ol>

<div id="modal" class="modal">

    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="card">

            <form method="POST" id="form-produto" enctype="multipart/form-data" action="controllers/recebe_produto.php" class="card">
                <div class="form-group">
                    <label for="nome_produto">Nome do Produto:</label>
                    <input type="text" id="nome_produto" name="nome_produto" required>
                </div>

                <div class="form-group">
                    <label for="img_produto">Imagem do Produto:</label>
                    <input type="file" id="img_produto" name="img_produto" required accept="image/jpeg,image/png">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição do Produto:</label>
                    <textarea id="descricao" name="descricao" required></textarea>
                </div>

                <div class="form-group">
                    <label for="custo_produto">Custo do Produto:</label>
                    <input type="tel" id="custo_produto" name="custo_produto" required>
                </div>

                <div class="form-group">
                    <label for="preco">Preço do Produto:</label>
                    <input type="tel" id="preco" name="preco" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="categoria_id">Categoria:</label>
                    <select name="id_categoria" id="categoria_id">
                        <?php
                        include "../.env/conexao.php";
                        $select = $conexao->prepare("SELECT * FROM categoria");
                        $select->execute();
                        $categorias = $select->fetchAll();

                        foreach ($categorias as $categoria) {
                            echo "<option value='" . $categoria['id_categoria'] . "'>" . $categoria['nome_categoria'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="custo_produto">Status do produto</label>
                   <select name="status_produto" >
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                   </select>_
                </div>

                <div class="form-group">
                <input type="submit" value="Cadastrar produto">
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
        <p>Produto criado com sucesso!</p>
      </div>
    </div>
  </div>
</div>
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

                                        foreach ($produtos as $produto) {

                                            echo '<tr style="align-items:center;">
                                            <td><img src="' . $produto['img_produto'] . '" style="width:50px;height:60px;"></td>
                                            <td>' . $produto['nome_produto'] . '</td>
                                             <td>' . $produto['descricao'] . '</td>
                                             <td>' . $produto['custo_produto'] . '</td>
                                             <td>' . $produto['preco'] . '</td>
                                             <td>' . $produto['status_produto'] . '</td>
                                             <td>
                                                 <button type="button" class="btn btn-primary btn-xs btn-flat">
                                                     Editar
                                                 </button>
                                                 <a href="?delete=' . $produto['id_produto'] . '" class="btn btn-danger btn-xs btn-flat">
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