<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
        <title>Mural de Fotos</title>
        <!-- Incluindo Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Seu CSS personalizado -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
         <script>
            window.onload = function() {
                alert("Você concorda em compartilhar suas fotos não só com os organizadores do evento, mas também com todos os convidados?");
                exibirConfirmacaoCompartilhamento();
            };
        </script>
        <!-- Botão para iniciar o processo de compartilhamento -->
        <div class="text-center mt-2">
            <button type="button" class="btn btn-success" onclick="exibirConfirmacaoCompartilhamento()">Compartilhar Fotos</button>
        </div>
        <!-- Formulário de compartilhamento de fotos -->
        <div class="container" id="formularioCompartilhamento" style="display: none;">
            <h2>Compartilhar Fotos</h2>
            <form id="formCompartilhamento" enctype="multipart/form-data" method="post">
                <input type="file" id="fileInput" multiple>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exibirNoMural">
                    <label class="form-check-label" for="exibirNoMural">Exibir no Mural</label>
                </div>
                <button type="button" class="btn btn-primary" onclick="uploadPhotos()">Enviar Fotos</button>
            </form>
            <h2>Fotos Compartilhadas</h2>
            <div id="sharedPhotos"></div>
        </div>
        <!-- Incluindo Bootstrap e JS Incluindo jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            function exibirConfirmacaoCompartilhamento() {
                var resposta = confirm("Você concorda em compartilhar suas fotos não só com os organizadores do evento, mas também com todos os convidados?");
                
                if (resposta) {
                    // Se o usuário concordar, mostrar opção de compartilhamento de fotos
                    exibirOpcaoCompartilhamento();
                } else {
                    // Se o usuário não concordar, mostrar apenas a opção de carregar fotos
                    exibirOpcaoCarregarFotos();
                }
            }
            function exibirOpcaoCompartilhamento() {
                // Mostrar o formulário de compartilhamento
                document.getElementById("formularioCompartilhamento").style.display = "block";
            }
            function exibirOpcaoCarregarFotos() {
                alert("Opção de carregar fotos ativada!");
                // Implemente aqui a lógica para carregar as fotos apenas
                // ...
            }
            function uploadPhotos() {
                var fileInput = document.getElementById('fileInput');
                var formData = new FormData(document.getElementById('formCompartilhamento'));

                // Adicione outros dados ao formulário, se necessário
                var exibirNoMural = confirm('Deseja que os convidados vejam estas fotos no mural?');
                formData.append('exibirNoMural', exibirNoMural);

                $.ajax({
                    type: 'POST',
                    url: 'http://192.168.0.14/arthur/upload.php', // Substitua com o caminho para seu script de upload no servidor
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response); // Exibe a resposta do servidor (pode ser removido ou adaptado)
                        fileInput.value = ''; // Limpar input de arquivo após o upload
                    },
                    error: function(error) {
                        console.error("Erro na requisição AJAX:", error);
                    }
                });
            }
            function voltarParaInicio() {
                window.location.href = "index.php";
            }
        </script>
        <!-- Botão no final da página -->
        <button type="button" class="btn btn-secondary btn-voltar" onclick="voltarParaInicio()">Voltar para o Início</button>
    </body>
</html>