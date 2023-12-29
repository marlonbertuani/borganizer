<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexao.php';

// Criar conexão
$conn = new mysqli($host, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$mensagem = $_POST['mensagem'];
$nome = $_POST['nome'];

// Preparar e executar a instrução SQL para salvar o recado
$sql = "INSERT INTO recados (nome, mensagem) VALUES ('$nome', '$mensagem')";

if ($conn->query($sql) === TRUE) {
    echo "Recado salvo com sucesso!";
} else {
    echo "Erro ao salvar o recado: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>