<?php
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
        echo '<div class="alert alert-info" style="background-color: rgba(173, 216, 230, 0.9);">';
        echo '<strong>' . $row['nome'] . '</strong>: ' . $row['mensagem'];
        echo '<br>';
        $dataFormatada = date('d/m/Y', strtotime($row['data_envio']));
        echo "<small>{$dataFormatada}</small>";
        echo '</div>';
    }
} else {
    echo '<p>Nenhum recado encontrado.</p>';
}
// Fechar a conexão
$conn->close();
?>