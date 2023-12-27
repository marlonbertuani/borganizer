<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Configuração do banco de dados
    $hostname = "192.168.0.14";
    $username = "arthur";
    $password = "Marlon@87";
    $database = "arthur";

    // Conectar ao banco de dados
    $conn = new mysqli($hostname, $username, $password, $database);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Coletar informações do formulário
    $nome = $_POST['nome'];
    $adultos = $_POST['adultos'];
    $criancas = $_POST['criancas'];

    // Inserir informações no banco de dados
    $query = "INSERT INTO confirmacao_presenca (nome, adultos, criancas) VALUES ('$nome', $adultos, $criancas)";

    if ($conn->query($query) === TRUE) {
        echo "Registro de presença inserido com sucesso.";
    } else {
        echo "Erro ao inserir o registro: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>