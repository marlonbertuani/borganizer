<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <title>Super Arthur</title>
        <!-- Incluindo Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Incluindo fontawesome para os ícones e alertas personalizados -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Meu CSS -->
        <link rel="stylesheet" href="css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="index">
        <div class="header-container">
            <div class="logo-container">
                <img class="logoarthur" src="img/superarthur.png" alt="Super Arthur Logo">
            </div>
            <div class="menu-container">
                <a href="#" id="menu-icon" data-toggle="modal" data-target="#menuModal">
                    <i class="fas fa-bars fa-2x custom-hamburger"></i>
                </a>
            </div>
        </div>   
        <div class="content-container">
            <h1 class="msghome">Aniversário do Arthur!</h1>
            <img src="img/arthur3.png" alt="Imagem arthur" width="180" height="200" class="arthur-img">
            <h1 style="font-size: medium; text-align: center;">Confirme sua presença e nos ajude a organizar este momento especial!</h1>
            <h1 style="font-size: medium; text-align: center;">Prazo para confirmações até 17/01/2024 - 23:55</h1>
            <div class="container">
                <img class="calendar-img" src="img/calendar.png" alt="calendar logo">
                <p class="text-next-to-image">27/01/2024 de 18:00 ás 22:00</p>
            </div>
            <div class="container2">
                <div class="img-container">
                    <img class="gps-img" src="img/gps.png" alt="GPS logo">
                </div>
                <div class="text-container">
                    <p>Salão Celina Festas:</p>
                    <p>Rua Rio Comprido, 989 - Riacho das Pedras, Contagem - MG</p>
                </div>
            </div>
            <!-- Botao do Modal de rotas -->
            <div style="text-align: center;">
                <a class="botoes" data-toggle="modal" data-target="#myModal">Opções de rota!</a>
            </div>
        </div>
        <!-- Modal Rotas -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escolha a forma de transporte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <a href="https://www.google.com/maps/dir/?api=1&destination=-19.947782,-44.048882" target="_blank" style="text-align: center;">
                                <i class="fas fa-map-marker-alt"></i> Abrir no Google Maps
                            </a>
                        </p>
                        <p>
                            <a href="https://www.waze.com/ul?ll=-19.947782,-44.048882&navigate=yes" target="_blank">
                                <i class="fab fa-waze"></i> Abrir no Waze
                            </a>
                        </p>
                        <p>
                            <a href="https://m.uber.com/ul/?action=setPickup&dropoff[latitude]=-19.947782&dropoff[longitude]=-44.048882" target="_blank">
                                <i class="fab fa-uber"></i> Solicitar Uber
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <a class="botoes" href="#" data-toggle="modal" data-target="#confirmacaoModal">Eu Vou!!!</a>
            <a class="botoesn" href="#" data-toggle="modal" data-target="#naoVouModal">Não Vou!</a>
        </div>
        <!-- Modal de Confirmação -->
        <div class="modal fade" id="confirmacaoModal" tabindex="-1" role="dialog" aria-labelledby="confirmacaoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmacaoModalLabel">Confirmação de Presença</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulário para coletar nome e sobrenome -->
                        <form id="confirmacaoForm" onsubmit="return validarFormulario()">
                            <div class="form-group text-center">
                                <input type="text" class="form-control border-0 text-center" id="inputNome" placeholder="Digite seu nome">
                            </div>
                            <div id="erroNome" class="text-danger"></div>
                            <div class="form-group text-center">
                                <input type="text" class="form-control border-0 text-center" id="inputSobrenome" placeholder="Digite seu sobrenome">
                            </div>
                            <!-- Botão para prosseguir -->
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" onclick="voltar()">Voltar</button>
                                <button type="submit" class="btn btn-primary">Prosseguir</button>
                                <button type="button" class="btn btn-secondary" onclick="exibirlista()">Cadastrados</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de Idade -->
        <div class="modal fade" id="idadeModal" tabindex="-1" role="dialog" aria-labelledby="idadeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="idadeModalLabel">Confirmação de Idade</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Olá <span id="nomeConfirmado"></span>, fico feliz em contar com sua presença!</p>
                        <p>Só mais uma pergunta, considero você como?</p>
                        <div class="opcao-btn-group btn-group" role="group" aria-label="Opções">
                            <!-- Botão para selecionar Adulto -->
                            <label class="opcao-btn btn btn-outline-primary">
                                <input type="radio" name="idadeRadio" id="adultoRadio" value="adulto" onclick="selecionarOpcao('adulto')">
                                <i class="fas fa-user"></i> Adulto
                            </label>
                            <!-- Botão para selecionar Criança -->
                            <label class="opcao-btn btn btn-outline-primary">
                                <input type="radio" name="idadeRadio" id="criancaRadio" value="crianca" onclick="selecionarOpcao('crianca')">
                                <i class="fas fa-child"></i> Criança (abaixo de 7 anos)
                            </label>
                        </div>
                        <!-- botão de adicionar convidado -->
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" onclick="adicionarConvidado()">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de Convidados -->
        <div class="modal fade" id="convidadosModal" tabindex="-1" role="dialog" aria-labelledby="convidadosModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="convidadosModalLabel">Lista de Convidados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul id="listaConvidados" class="list-group">
                            <!-- Lista de convidados será exibida aqui dinamicamente -->
                        </ul>
                        <p></p>
                        <div class="text-center">
                            <button type="button" class="btn btn-success" onclick="iniciarCadastroNovo()">Adicionar Convidado</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="voltar2()">Voltar</button>
                        <button type="button" class="btn btn-primary" onclick="finalizar()">Finalizar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de Não Vou -->
        <div class="modal fade" id="naoVouModal" tabindex="-1" role="dialog" aria-labelledby="naoVouModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="naoVouModalLabel">Informar Ausência</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulário para coletar nome, sobrenome e comentário -->
                        <form id="naoVouForm" onsubmit="return validarNaoVouFormulario()">
                            <div class="form-group text-center">
                                <input type="text" class="form-control border-0 text-center" id="inputNomeNaoVou" placeholder="Digite seu nome" required>
                            </div>
                            <div class="form-group text-center">
                                <input type="text" class="form-control border-0 text-center" id="inputSobrenomeNaoVou" placeholder="Digite seu sobrenome" required>
                            </div>
                            <div class="form-group text-center">
                                <textarea class="form-control" id="inputComentario" placeholder="Caso queira deixar alguma mensagem, Opcional!"></textarea>
                            </div>
                            <!-- Botões para cancelar e confirmar -->
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var convidados = []; // Array para armazenar convidados
            function validarFormulario() {
                var nomeInput = document.getElementById('inputNome');
                var sobrenomeInput = document.getElementById('inputSobrenome');
                var nome = nomeInput.value.trim(); // Remover espaços em branco
                var sobrenome = sobrenomeInput.value.trim(); // Remover espaços em branco
                if (!nome) {
                    Swal.fire({
                        html: 'Para prosseguir, preencha o campo de nome.',
                        icon: 'warning',
                        confirmButtonColor: '#007bff',
                        confirmButtonText: 'Voltar',
                    });
                    nomeInput.focus();
                    return false;
                }
                // Verificar se o nome e sobrenome já estão cadastrados
                var duplicado = convidados.some(function(convidado) {
                    return convidado.nome.toLowerCase() === nome.toLowerCase() &&
                        convidado.sobrenome.toLowerCase() === sobrenome.toLowerCase();
                });
                if (duplicado) {
                    Swal.fire({
                        html: 'Este nome ja foi cadastrado!<br/> Para verificar os convidados cadastrados clique no botão <b>Cadastrados</b>',
                        icon: 'warning',
                        confirmButtonColor: '#007bff',
                        confirmButtonText: 'Voltar',
                    });
                    nomeInput.focus();
                    return false;
                } else {
                    document.getElementById('erroNome').innerText = "";
                }
                // Adicione o nome e sobrenome ao objeto do convidado
                var convidado = { nome: nome, sobrenome: sobrenome };
                convidados.push(convidado);
                document.getElementById('nomeConfirmado').innerText = nome;
                // Remover a classe 'active' de todos os botões
                document.getElementById("adultoRadio").checked = false;
                document.getElementById("criancaRadio").checked = false;
                var opcoes = document.querySelectorAll('.opcao-btn');
                opcoes.forEach(function (opcaoBtn) {
                    opcaoBtn.classList.remove('active');
                });
                $('#confirmacaoModal').modal('hide');
                $('#idadeModal').modal('show');
                return false;
            }
            function limparListaConvidados() {
                convidados = [];
                atualizarListaConvidados();
            }
            function adicionarConvidado() {
                // Verificar se algum botão de rádio está selecionado
                var adultoRadio = document.getElementById("adultoRadio");
                var criancaRadio = document.getElementById("criancaRadio");
                if (!adultoRadio.checked && !criancaRadio.checked) {
                    // Nenhum botão de rádio foi selecionado, exibir mensagem
                    Swal.fire({
                        html: 'Por favor, selecione se você é um adulto ou uma criança.',
                        icon: 'warning',
                        confirmButtonColor: '#007bff',
                        confirmButtonText: 'Voltar'
                    });
                    return; // Impede que a função prossiga
                }
                var idadeSelecionada = $("input[name='idadeRadio']:checked").val();
                var nome = document.getElementById('nomeConfirmado').innerText;
                var sobrenome = convidados[convidados.length - 1].sobrenome;
                convidados[convidados.length - 1].idade = idadeSelecionada;
                // Atualizar a lista de convidados no modal
                atualizarListaConvidados();
                // Limpar o campo de nome para o próximo convidado
                document.getElementById('inputNome').value = "";
                document.getElementById('inputSobrenome').value = "";
                // Fechar o modal de idade
                $('#idadeModal').modal('hide');
                // Abrir novamente o modal de confirmação
                $('#convidadosModal').modal('show');
            }
            function selecionarOpcao(opcao) {
            // Remover a classe 'active' de todos os botões antes de selecionar o novo
            var opcoes = document.querySelectorAll('.opcao-btn');
            opcoes.forEach(function (opcaoBtn) {
                opcaoBtn.classList.remove('active');
            });
            // Adicionar a classe 'active' ao botão selecionado
            var botaoSelecionado = document.querySelector('#' + opcao + 'Radio');
            botaoSelecionado.parentNode.classList.add('active');
            }
            function voltar() {
                // Fechar o modal de idade
                $('#confirmacaoModal').modal('hide');
            }
            function voltar2() {
                // Abrir novamente o modal de confirmação
                $('#convidadosModal').modal('hide');
            }
            function exibirlista() {
                // Abrir novamente o modal de confirmação
                $('#convidadosModal').modal('show');
            }
            function atualizarListaConvidados() {
                var listaConvidados = document.getElementById('listaConvidados');
                listaConvidados.innerHTML = ""; // Limpar a lista antes de atualizar
                for (var i = 0; i < convidados.length; i++) {
                    var li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    // Divisão para o nome completo (nome + sobrenome)
                    var divNome = document.createElement('div');
                    divNome.innerHTML = convidados[i].nome + ' ' + convidados[i].sobrenome;
                    // Divisão para o tipo de convidado e botão de exclusão
                    var divDireita = document.createElement('div');
                    divDireita.className = 'd-flex justify-content-end align-items-center'; // Ajustei para uma linha (row) e alinhamento à direita
                    // Adicionar ícone de lixeira para deletar o convidado
                    var span = document.createElement('span');
                    span.className = 'badge badge-danger badge-pill ml-2'; // Adicionei uma margem à esquerda (ml-2)
                    span.innerHTML = '<i class="fas fa-trash"></i>';
                    span.onclick = function(i) {
                        return function() {
                            // Chamar a função de deletar passando o índice correto
                            deletarConvidado(i);
                        };
                    }(i);
                    // Tipo de convidado (Adulto ou Criança)
                    var tipoConvidado = convidados[i].idade === 'adulto' ? 'Adulto' : 'Criança';
                    divDireita.innerHTML = tipoConvidado;
                    // Adicionar divisões à li
                    divDireita.appendChild(span);
                    li.appendChild(divNome);
                    li.appendChild(divDireita);
                    listaConvidados.appendChild(li);
                }
            }
            function deletarConvidado(index) {
                // Confirmar a exclusão
                if (confirm("Tem certeza que deseja excluir este convidado?")) {
                    convidados.splice(index, 1);
                    atualizarListaConvidados();
                }
            }
            function iniciarCadastroNovo() {
                // Reiniciar o processo de cadastro com um novo nome
                $('#convidadosModal').modal('hide');
                $('#confirmacaoModal').modal('show');
                // Limpar o campo de nome para o próximo convidado
                document.getElementById('inputNome').value = "";
            }
            function finalizar() {
                // Certifique-se de que a lista de convidados não está vazia
                if (convidados.length === 0) {
                    Swal.fire({
                        html: 'Nenhum convidado cadastrado!<br/> Antes de finalizar, cadastre ao menos um convidado.',
                        icon: 'error',
                        confirmButtonColor: '#007bff',
                        confirmButtonText: 'Voltar',
                    });
                    return;
                }
                // Pergunta se os convidados foram cadastrados e se pode prosseguir
                Swal.fire({
                    html: 'Todos convidados foram cadastrados? Posso prosseguir?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#007bff',
                    cancelButtonText: 'Não',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // O usuário clicou em "Sim", proceda com o envio dos dados
                        enviarDados();
                    } else {
                        // O usuário clicou em "Não" ou fechou o alerta, faça o que for necessário
                        console.log('O usuário optou por não prosseguir.');
                    }
                });
            }
            function enviarDados() {
                // Criar um formulário dinâmico
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = 'confirmacoes.php'; // Altere o caminho conforme necessário
                // Adicionar os dados dos convidados como campos ocultos ao formulário
                for (var i = 0; i < convidados.length; i++) {
                    var inputNome = document.createElement('input');
                    inputNome.type = 'hidden';
                    inputNome.name = 'convidados[' + i + '][nome]';
                    inputNome.value = convidados[i].nome;
                    var inputSobrenome = document.createElement('input');
                    inputSobrenome.type = 'hidden';
                    inputSobrenome.name = 'convidados[' + i + '][sobrenome]';
                    inputSobrenome.value = convidados[i].sobrenome;
                    var inputIdade = document.createElement('input');
                    inputIdade.type = 'hidden';
                    inputIdade.name = 'convidados[' + i + '][idade]';
                    inputIdade.value = convidados[i].idade;
                    form.appendChild(inputNome);
                    form.appendChild(inputSobrenome);
                    form.appendChild(inputIdade);
                }
                // Enviar os dados usando
                $.ajax({
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), // Serializar o formulário
                    success: function(response) {
                        // Manipular a resposta do servidor
                        Swal.fire({
                            html: 'Presença confirmada com sucesso!',
                            icon: 'success',
                            confirmButtonColor: '#28a745',
                            confirmButtonText: 'Fechar'
                        });
                    },
                    error: function(error) {
                        // Manipular erros, se necessário
                        console.error("Erro na requisição AJAX:", error);
                    }
                });
                // Verificar se o formulário é filho do body antes de tentar removê-lo
                if (form.parentNode === document.body) {
                    // Remover o formulário da página
                    document.body.removeChild(form);
                }
                $('#convidadosModal').modal('hide');
                // Limpar a lista de convidados
                limparListaConvidados();
            }
            function validarNaoVouFormulario() {
                var nomeNaoVouInput = document.getElementById('inputNomeNaoVou');
                var sobrenomeNaoVouInput = document.getElementById('inputSobrenomeNaoVou');
                var comentarioInput = document.getElementById('inputComentario');
                var nomeNaoVou = nomeNaoVouInput.value.trim();
                var sobrenomeNaoVou = sobrenomeNaoVouInput.value.trim();
                var comentario = comentarioInput.value.trim();
                if (!nomeNaoVou) {
                    alert("Por favor, preencha o campo de nome.");
                    nomeNaoVouInput.focus();
                }
                // Crie um objeto para armazenar os dados
                var dados = {
                    nome: nomeNaoVou,
                    sobrenome: sobrenomeNaoVou,
                    comentario: comentario
                };
                // Envie os dados para o servidor usando
                $.ajax({
                    type: "POST",
                    url: "processanao.php",
                    data: { convidados: [dados] }, // Envie como um array
                    success: function (response) {
                        alert("È uma pena não contar com sua presença, obrigado por nos avisar!"); // Exiba a resposta do servidor
                    },
                    error: function (error) {
                        console.error("Erro na requisição AJAX:", error);
                    }
                });
                // Fechar o modal após o envio
                $('#naoVouModal').modal('hide');
                // Limpar os campos após o envio
                nomeNaoVouInput.value = "";
                sobrenomeNaoVouInput.value = "";
                comentarioInput.value = "";
                return false;
            }
        </script>
        <!-- Incluindo Bootstrap JS (necessário para funcionalidade do Modal) -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Incluindo fontawesome para os ícones -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
        <!-- Modal de Menu -->
        <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
            <div class="modal-dialog menu-modal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="menuModalLabel">Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Adicione seus itens de menu aqui -->
                        <button type="button" class="btn btn-warning btn-block mb-2" onclick="window.location.href='mural_recados.php'">Mural de Recados</button>
                        <button type="button" class="btn btn-warning btn-block mb-2" onclick="window.location.href='contrucao.html'">Compartilhar fotos</button>
                        <button type="button" class="btn btn-warning btn-block mb-2" onclick="window.open('https://api.whatsapp.com/send/?phone=5531994778938&text=Preciso+de+ajuda+para+confirmar+minha+presen%C3%A7a.&type=phone_number&app_absent=0', '_blank')">Entrar em Contato!</button>                
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>