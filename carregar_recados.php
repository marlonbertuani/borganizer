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

// Selecionar todos os recados ordenados pela data de postagem
$sql = "SELECT nome, mensagem, data_envio FROM recados ORDER BY data_envio DESC";
$result = $conn->query($sql);

// Exibir os recados
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="alert alert-info">';
        echo '<strong>' . $row['nome'] . '</strong>: ' . $row['mensagem'];
        echo '</div>';
    }
} else {
    echo '<p>Nenhum recado encontrado.</p>';
}

// Fechar a conexão
$conn->close();
?>