<?php
// Incluindo o arquivo de conexão
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head style="background-color: rgb(255, 255, 255, 0.75);">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Convidados Confirmados</title>
        <!-- Incluindo Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Meu CSS personalizado -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="consultas">
        <br>
        <h2 style="text-align: center;">Convidados Confirmados:</h2>
        <div class="table-container">
            <table class="table">
                <colgroup>
                    <!-- Necessario para ajustar colunas -->
                    <col class="col-data_postagem">
                    <col class="col-nome">
                    <col class="col-sobrenome">
                    <col class="col-data_registro">
                </colgroup>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta SQL para obter os dados
                    $query = "SELECT data_registro, nome, sobrenome, comentario FROM naovou";
                    $resultado = $conexao->query($query);
                    // Verifica se a consulta retornou resultados
                    if ($resultado->num_rows > 0) {
                        // Loop para exibir os dados
                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            $dataFormatada = date('d/m', strtotime($linha['data_registro']));
                            echo "<td>{$dataFormatada}</td>";
                            echo "<td>{$linha['nome']}</td>";
                            echo "<td>{$linha['sobrenome']}</td>";
                            echo "<td>{$linha['comentario']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum dado encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Incluindo Bootstrap e JS Incluindo jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            // Função para redirecionar para a página inicial
            function voltarParaInicio() {
                window.location.href = "index.php";
            }
            // Função para redirecionar para a página de confirmados
            function confirmados() {
                window.location.href = "confirmados.php";
            }
        </script>
        <!-- Botão no final da página -->
        <footer class="text-center mt-2">
            <button type="button" class="btn btn-secondary" onclick="voltarParaInicio()">Voltar para o Início</button>
            <button type="button" class="btn btn-secondary" onclick="confirmados()">Confirmados</button>
        </footer>
    </body>
</html>
<?php
// Fechando a conexão
$conexao->close();
?>