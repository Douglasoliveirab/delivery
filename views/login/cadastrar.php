<?php

require_once('../../.env/conexao.php');
// Recebe os dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];

// Validação dos campos obrigatórios
if (empty($nome) || empty($sobrenome) || empty($cpf) || empty($email) || empty($telefone) || empty($endereco) || empty($senha)) {
    echo "Por favor, preencha todos os campos obrigatórios.";
    exit;
}


function validateCPF($cpf) {
    // Remove caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
  
    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }
  
    // Verifica se todos os dígitos são iguais
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
  
    // Calcula o primeiro dígito verificador
    $sum = 0;
    for ($i = 0; $i < 9; $i++) {
        $sum += intval($cpf[$i]) * (10 - $i);
    }
    $digit1 = 11 - ($sum % 11);
    if ($digit1 >= 10) {
        $digit1 = 0;
    }
  
    // Calcula o segundo dígito verificador
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
        $sum += intval($cpf[$i]) * (11 - $i);
    }
    $digit2 = 11 - ($sum % 11);
    if ($digit2 >= 10) {
        $digit2 = 0;
    }
  
    // Verifica se os dígitos verificadores estão corretos
    if ($cpf[9] != $digit1 || $cpf[10] != $digit2) {
        return false;
    }
  
    return true;
}

// Exemplo de uso


if (validateCPF($cpf)) {
    // Encripta a senha
$senha_encriptada = password_hash($senha, PASSWORD_DEFAULT);


// Insere os dados na tabela clientes
$sql = "INSERT INTO clientes (nome, sobrenome, cpf, email, telefone, endereco, senha) VALUES (:nome, :sobrenome, :cpf, :email, :telefone, :endereco, :senha)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':sobrenome', $sobrenome);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':senha', $senha_encriptada);
$stmt->execute();

echo "Usúario cadastrados com sucesso.";
header("location:  ../login_cliente.php");
} else {
     // CPF inválido, redirecionar para a página anterior com uma mensagem de erro
     header("Location: ../cadastre-se.php?error=invalid_cpf");
     exit();
}



?>
