<?php


require_once('../../.env/conexao.php');
// Recebe os dados do formulário
$nome_usuario = $_POST['nome_usuario'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];
$previlegios = $_POST['previlegios'];

// Validação dos campos obrigatórios
if (empty($nome_usuario) || empty($sobrenome) || empty($cpf) || empty($email) || empty($telefone) || empty($endereco) || empty($senha)) {
    echo "Por favor, preencha todos os campos obrigatórios.";
    exit;
}

// Encripta a senha
$senha_encriptada = password_hash($senha, PASSWORD_DEFAULT);


// Insere os dados na tabela clientes
$sql = "INSERT INTO administrador (nome_usuario, sobrenome, cpf, email, telefone, endereco, senha, previlegios) VALUES (:nome_usuario, :sobrenome, :cpf, :email, :telefone, :endereco, :senha, :previlegios)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':nome_usuario', $nome_usuario);
$stmt->bindParam(':sobrenome', $sobrenome);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':senha', $senha_encriptada);
$stmt->bindParam(':previlegios', $previlegios);
$stmt->execute();


echo "Dados cadastrados com sucesso.";
header("location:  ../../painel/");
?>
