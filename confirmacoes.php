<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['convidados']) && is_array($_POST['convidados'])) {
        $convidados = $_POST['convidados'];

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Iniciar transação
        $conn->begin_transaction();

        try {
            foreach ($convidados as $convidado) {
                // Validar dados (exemplo: garantir que 'nome' e 'sobrenome' não estão vazios)

                $nome = $conn->real_escape_string($convidado['nome']);
                $sobrenome = $conn->real_escape_string($convidado['sobrenome']);
                $idade = $conn->real_escape_string($convidado['idade']);

                $sql = "INSERT INTO convidados (nome, sobrenome, idade) VALUES ('$nome', '$sobrenome', '$idade')";

                if (!$conn->query($sql)) {
                    throw new Exception("Erro na inserção no banco de dados: " . $conn->error);
                }
            }

            // Commit da transação
            $conn->commit();

            echo "Inserção no banco de dados bem-sucedida.";
        } catch (Exception $e) {
            // Rollback em caso de erro
            $conn->rollback();
            echo "Erro: " . $e->getMessage();
        }

        $conn->close();
    } else {
        echo "Array 'convidados' não está definido ou não é um array.";
    }
} else {
    echo "Esta página aceita apenas solicitações POST.";
}
?>