<?php
if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente'];

    // Consultar o endereço do cliente na tabela clientes
    $stmt = $conexao->prepare("SELECT endereco FROM clientes WHERE id_cliente = :id_cliente");
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->execute();

    // Verificar se a consulta retornou algum resultado
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['endereco'] = $row['endereco'];
        $endereco = $_SESSION['endereco'];

        // Consultar o status da loja na tabela loja
        $stmt_loja = $conexao->prepare("SELECT status_loja FROM loja");
        $stmt_loja->execute();
        $row_loja = $stmt_loja->fetch(PDO::FETCH_ASSOC);
        $status_loja = $row_loja['status_loja'];

        // Usar o valor do endereço e status da loja como desejar
        echo '<div class="localizacao">
        <div class="status-loja">
        <i class="bi bi-shop"></i> <span>' . $status_loja . '</span>
    </div>
            <div class="endereco-entrega" style="margin-top:5px;">
                <i class="bi bi-geo-alt"></i>
                <span class="endereco">' . $endereco . '</span>
                <i class="bi bi-pencil editar" style="color:red" id="btn-editar"></i>
            </div>
           
        </div>';
    }
}
?>
