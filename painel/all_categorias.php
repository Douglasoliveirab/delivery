<?php
include "../.env/conexao.php";

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    $update_categoria = $conexao->prepare("UPDATE categoria SET status_categoria = 'inativo' WHERE id_categoria = ?");
    $update_categoria->bindParam(1, $id, PDO::PARAM_INT);
    $update_categoria->execute();
    header("Location: all_categorias.php");
    exit();
}

if (isset($_GET['habilitar'])) {
    $id = (int) $_GET['habilitar'];

    $update_categoria = $conexao->prepare("UPDATE categoria SET status_categoria = 'ativo' WHERE id_categoria = ?");
    $update_categoria->bindParam(1, $id, PDO::PARAM_INT);
    $update_categoria->execute();
    header("Location: all_categorias.php");
    exit();
}

if (isset($_GET['todos'])) {
    $select = $conexao->prepare("SELECT * FROM categoria");
    $select->execute();
    $categorias = $select->fetchAll();
} elseif (isset($_GET['ativos'])) {
    $select = $conexao->prepare("SELECT * FROM categoria WHERE status_categoria = 'ativo'");
    $select->execute();
    $categorias = $select->fetchAll();
} elseif (isset($_GET['inativos'])) {
    $select = $conexao->prepare("SELECT * FROM categoria WHERE  status_categoria = 'inativo'");
    $select->execute();
    $categorias = $select->fetchAll();
} else {
    $select = $conexao->prepare("SELECT * FROM categoria WHERE status_categoria = 'ativo'");
    $select->execute();
    $categorias = $select->fetchAll();
}

include "master.php";

?>

<ol class="breadcrumb">
    <?php
    if (isset($_SESSION['previlegios']) && $_SESSION['previlegios'] == 'admin') {
        echo  '<li>
        <button id="btn-cadastrar-categoria" class="btn btn-default">Cadastrar Categoria</button>
    </li>';
    }
    ?>
    <li>
        <a href="?todos" class="btn btn-default">Mostrar Todas Categorias</a>
    </li>
    <li>
        <a href="?ativos" class="btn btn-default">Mostrar Categorias Ativas</a>
    </li>
    <li>
        <a href="?inativos" class="btn btn-default">Mostrar Categorias Desabilitadas</a>
    </li>

</ol>
</section>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="card">
            <form id="form-categoria" action="recebe_categoria.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="banner">Selecione uma imagem:</label>
                    <input type="file" name="img_categoria" id="img_categoria" required>
                </div>
                <div class="form-group">
                    <label for="banner">Nome da categoria</label>
                    <input type="text" name="nome_categoria" id="nome_categoria" required>
                </div>
                <div class="form-group">
                    <label for="status_categoria">Status da categoria:</label>
                    <select name="status_categoria" id="status_categoria" required>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" value="Cadastrar">
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
                <p>Categoria criada com sucesso!</p>
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
                    <h3 class="box-title">Lista de Categorias</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Imagem da categoria</th>
                                <th>Código</th>
                                <th>Nome da categoria</th>
                                <th>Status da categoria</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($categorias as $categoria) {
                                echo '<tr style="align-items:center;">
                                        <td><img src="' . $categoria['img_categoria'] . '" style="width:60px;height:60px;"></td>
                                        <td>' . $categoria['id_categoria'] . '</td>
                                        <td>' . $categoria['nome_categoria'] . '</td>
                                        <td>' . $categoria['status_categoria'] . '</td>
                                        <td>';

                                // Verifica se o parâmetro "?todos" está presente na URL
                                if (isset($_GET['todos'])) {
                                    if ($categoria['status_categoria'] == 'inativo') {
                                        echo '<a href="atualizar_categoria.php?id=' . $categoria['id_categoria'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
                                            <a href="?habilitar=' . $categoria['id_categoria'] . '" class="btn btn-success btn-xs btn-flat">Habilitar</a>';
                                    } elseif ($categoria['status_categoria'] == 'ativo') {
                                        echo '<a href="atualizar_categoria.php?id=' . $categoria['id_categoria'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
                                            <a href="?delete=' . $categoria['id_categoria'] . '" class="btn btn-danger btn-xs btn-flat">Excluir</a>';
                                    }
                                } else {
                                    // Verifica se existe o parâmetro "?inativos" na URL
                                    if (!isset($_GET['inativos'])) {
                                        echo '<a href="atualizar_categoria.php?id=' . $categoria['id_categoria'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
                                            <a href="?delete=' . $categoria['id_categoria'] . '" class="btn btn-danger btn-xs btn-flat">Excluir</a>';
                                    } // Verifica se existe o parâmetro "?ativos" na URL
                                    elseif (isset($_GET['inativos'])) {
                                        echo '<a href="atualizar_categoria.php?id=' . $categoria['id_categoria'] . '" class="btn btn-primary btn-xs btn-flat">Editar</a>
                                            <a href="?habilitar=' . $categoria['id_categoria'] . '" class="btn btn-success btn-xs btn-flat">Habilitar</a>';
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
    </div>
</section>
</body>

</html>