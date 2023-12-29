<?php
// Inclua o arquivo de conexão
include 'conexao.php';

// Verifique se a solicitação é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se o array $_POST['convidados'] está definido
    if (isset($_POST['convidados']) && is_array($_POST['convidados'])) {
        // Recupere a lista de convidados do array POST
        $convidados = $_POST['convidados'];

        // Conecte-se ao banco de dados
        $conn = new mysqli("192.168.0.14", "arthur", "Marlon@87", "arthur");

        // Verifique a conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Prepare e execute a instrução de inserção para cada convidado
        foreach ($convidados as $convidado) {
            $nome = $conn->real_escape_string($convidado['nome']);
            $sobrenome = $conn->real_escape_string($convidado['sobrenome']);
            $comentario = $conn->real_escape_string($convidado['comentario']);

            $sql = "INSERT INTO naovou (nome, sobrenome, comentario) VALUES ('$nome', '$sobrenome', '$comentario')";
            
            if ($conn->query($sql) === TRUE) {
                // Inserção bem-sucedida
                echo "Inserção no banco de dados bem-sucedida.";
            } else {
                // Erro na inserção
                echo "Erro na inserção no banco de dados: " . $conn->error;
            }
        }

        // Feche a conexão com o banco de dados
        $conn->close();
    } else {
        // Array 'convidados' não está definido ou não é um array
        echo "Array 'convidados' não está definido ou não é um array.";
    }
} else {
    // Solicitação não é do tipo POST
    echo "Esta página aceita apenas solicitações POST.";
}
?>
