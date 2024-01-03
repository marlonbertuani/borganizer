<!DOCTYPE html>
<html lang="pt-br">
    <head class="fotos">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
        <title>Mural de Fotos</title>
        <!-- Incluindo Bootstrap CSS -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Seu CSS personalizado -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="fotos">
        <br>
        <h2 class="fotos">Envio de Arquivos</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data" id="uploadForm">
            <p>Sejam bem vindos a esta novidade, abaixo algumas observações sobre esta seção</p>
            <p>Esta seção foi separada com o intuito de recebermos fotos tiradas pelos convidados, mas por que não compartilhar no WhatsApp?</p>
            <p>Quando a foto e compartilhada pelo WhatsApp além de gerar um cache em seu dispositivo o arquivo passa por processamento, por aqui foi feito um tratamento para que o compartilhamento ocorra de modo direto, 
            sem passar por servidores externos e sem passar por nenhum tipo de tratamento, assim vamos receber sua foto com a máxima qualidade possível do seu dispositivo.</p>
            <p>Entao caso queira utilizar e nos presentear com mais memórias deste dia tao incrível, prometo que vamos guardar com muito carinho cada clique! E o mais importante! Divirtam-se!</p>
            <input type="file" class="escolher-arquivos" name="fileToUpload[]" id="fileToUpload" multiple>
            <p></p>
            <br>
            <input type="submit" class="btn btn-primary" value="Enviar Arquivos" name="submit">
        </form>
        <BR>
        <!-- Modal Bootstrap para exibir mensagem de carregamento -->
        <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loadingModalLabel">Carregando suas fotos...</h5>
                    </div>
                    <div class="modal-body">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%" id="modalProgressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Bootstrap para exibir mensagem de sucesso -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Upload Concluído</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Os arquivos foram enviados com sucesso!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Função para redirecionar para a página inicial
            function voltarParaInicio() {
                window.location.href = "index.php";
            }
            $(document).ready(function() {
                $("#uploadForm").submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    // Exibe a barra de progresso
                    $("#progressBarContainer").show();
                    $.ajax({
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(e) {
                                if (e.lengthComputable) {
                                    var percent = Math.round((e.loaded / e.total) * 100);
                                    $("#progressBar").css("width", percent + "%");
                                }
                            }, false);
                            return xhr;
                        },
                        type: "POST",
                        url: "upload.php",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // Exibir o modal de sucesso
                            $('#successModal').modal('show');
                            // Limpar a barra de progresso após o upload
                            $("#progressBarContainer").hide();
                            $("#progressBar").css("width", "0%");
                        }
                    });
                });
            });
            $(document).ready(function () {
                $("#uploadForm").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    // Exibe o modal de carregamento
                    $('#loadingModal').modal('show');
                    $.ajax({
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (e) {
                                if (e.lengthComputable) {
                                    var percent = Math.round((e.loaded / e.total) * 100);
                                    $("#modalProgressBar").css("width", percent + "%");
                                }
                            }, false);
                            return xhr;
                        },
                        type: "POST",
                        url: "upload.php",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // Exibir o modal de sucesso
                            $('#successModal').modal('show');
                            // Limpar a barra de progresso após o upload
                            $("#progressBarContainer").hide();
                            $("#progressBar").css("width", "0%");
                            // Fechar o modal de carregamento
                            $('#loadingModal').modal('hide');
                        },
                        error: function (error) {
                            // Em caso de erro, fechar o modal de carregamento
                            $('#loadingModal').modal('hide');
                            // Exibir mensagem de erro
                            alert("Desculpe, ocorreu um erro ao enviar seu arquivo.");
                        }
                    });
                });
            });
        </script>
        <!-- Botão no final da página -->
        <button type="button" class="btn btn-secondary btn-voltar" onclick="voltarParaInicio()">Voltar para o Início</button>
    </body>
</html>