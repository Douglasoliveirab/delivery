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

        // Usar o valor do endereço como desejar
        echo '<div class="localizacao">
    <i class="bi bi-geo-alt">Endereço de entrega</i><br>
    <span class="endereco">' . $endereco . '</span>
    <i class="bi bi-pencil editar" style="color:red" id="btn-editar">editar</i>
</div>';
    }
}
?>