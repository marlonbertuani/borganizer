<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
    <title>Mural de Recados</title>
    <!-- Incluindo Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div style="text-align: center; margin: 20px;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deixarRecadoModal">Deixar um Recado</button>
        <button type="button" class="btn btn-secondary" onclick="voltarParaInicio()">Voltar para o Início</button>
    </div>
    <!-- Modal para deixar recado -->
    <div class="modal fade" id="deixarRecadoModal" tabindex="-1" role="dialog" aria-labelledby="deixarRecadoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deixarRecadoModalLabel">Deixe seu Recado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" id="mensagemRecado" placeholder="Digite seu recado aqui"></textarea>
                    <br>
                    <input type="text" class="form-control" id="nomeRecado" placeholder="Identificar-me (opcional)">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarRecado()">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de recados -->
    <div class="container" id="listaRecados">
        <?php include 'carregar_recados.php'; ?>
    </div>

    <!-- Incluindo Bootstrap e JS Incluindo jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Função para salvar recado
        function salvarRecado() {
            var mensagem = document.getElementById('mensagemRecado').value;
            var nome = document.getElementById('nomeRecado').value || 'Anônimo';

            // Enviar dados para o servidor usando AJAX
            $.ajax({
                type: "POST",
                url: "salvar_recado.php",
                data: { mensagem: mensagem, nome: nome },
                success: function(response) {
                    // Atualizar a lista de recados após o salvamento
                    atualizarListaRecados();
                    
                    // Fechar o modal
                    $('#deixarRecadoModal').modal('hide');
                },
                error: function(error) {
                    console.error("Erro na requisição AJAX:", error);
                }
            });
        }

        // Função para atualizar a lista de recados
        function atualizarListaRecados() {
            // Carregar a lista de recados usando PHP
            $("#listaRecados").load("carregar_recados.php");
        }

        // Função para redirecionar para a página inicial
        function voltarParaInicio() {
            window.location.href = "index.php";
        }

        // Atualizando a lista de recados ao carregar a página
        window.onload = atualizarListaRecados;
    </script>
    <!-- Botão no final da página -->
    <button type="button" class="btn btn-secondary btn-voltar" onclick="voltarParaInicio()">Voltar para o Início</button>
</body>
</html>
