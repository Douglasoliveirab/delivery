<?php
session_start();
include "../.env/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (
        isset($_POST['id_administrador']) && isset($_POST['nome_usuario']) && isset($_POST['sobrenome']) &&
        isset($_POST['senha']) && isset($_POST['cpf']) && isset($_POST['email']) &&
        isset($_POST['endereco']) && isset($_POST['telefone']) && isset($_POST['previlegios'])
    ) {
        $id = $_POST['id_administrador'];
        $nomeUsuario = $_POST['nome_usuario'];
        $sobrenome = $_POST['sobrenome'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $previlegios = $_POST['previlegios'];

        // Atualize as informações do administrador no banco de dados
        $query = $conexao->prepare("UPDATE administrador SET nome_usuario = ?, sobrenome = ?, senha = ?, cpf = ?, email = ?, endereco = ?, telefone = ?, previlegios = ? WHERE id_administrador = ?");
        $query->bindParam(1, $nomeUsuario, PDO::PARAM_STR);
        $query->bindParam(2, $sobrenome, PDO::PARAM_STR);
        $query->bindParam(3, $senha, PDO::PARAM_STR);
        $query->bindParam(4, $cpf, PDO::PARAM_STR);
        $query->bindParam(5, $email, PDO::PARAM_STR);
        $query->bindParam(6, $endereco, PDO::PARAM_STR);
        $query->bindParam(7, $telefone, PDO::PARAM_STR);
        $query->bindParam(8, $previlegios, PDO::PARAM_STR);
        $query->bindParam(9, $id, PDO::PARAM_INT);

        if ($query->execute()) {
            // Atualização bem-sucedida, redirecione para a página de administradores
            header("Location: adm.php");
            exit();
        } else {
            // Ocorreu um erro ao atualizar o administrador, exiba uma mensagem de erro
            echo "Ocorreu um erro ao atualizar o administrador. Por favor, tente novamente.";
        }
    } else {
        // Nem todos os campos foram preenchidos, exiba uma mensagem de erro
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
} else {
    // Redirecione de volta para a página anterior
    header("Location: adm.php");
    exit();
}
?>
