<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Presença</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
    <style>
        .footer{
            position: absolute;
            bottom: 5;
            width: 50%;
        }

        .caixatexto{
            height: 70px;
            width: 293px;
        }
        
        .name-field {
            margin-bottom: 10px;
        }

        .first-namefield {
            margin-bottom: 10px;
        }

        button.childb.selected {
            background-color: #3399FF; /* Cor de destaque desejada */
            color: black; /* Cor do texto */
        }

        button.childb{
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #A5BE3280;
            font-family: 'Lato';
            font-size: inherit;
            cursor: pointer;
            padding: 10px 20px;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-weight: 700;
            outline: none;
            -webkit-transition: all 1s;
            -moz-transition: all 1s;
            transition: all 1s;
        }
    </style>
    <script>
        var selectedChildCount = 0; // Inicialmente, nenhum botão está selecionado
        var quantidadePessoas = 0; // Variável para rastrear a quantidade de pessoas

        function showStep(step) {
            if (step === 2 && quantidadePessoas === 0) {
                alert("Você deve cadastrar pelo menos uma pessoa antes de prosseguir para a próxima etapa.");
            } else {
                if (step === 2) {
                    var nomeInputs = document.querySelectorAll('input[name="nomes[]"]');
                    var nomePreenchido = false;
                    for (var i = 0; i < nomeInputs.length; i++) {
                        if (nomeInputs[i].value.trim() !== '') {
                            nomePreenchido = true;
                            break;
                        }
                    }
                    if (!nomePreenchido) {
                        alert("Preencha pelo menos um nome antes de prosseguir para a próxima etapa.");
                        return; // Impede a transição se nenhum nome estiver preenchido
                    }
                }

                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'none';
                document.getElementById('step' + step).style.display = 'block';
            }
        }

        function addNameField() {
            const inputContainer = document.getElementById('name-input-container');
            const newDiv = document.createElement('div');
            const newInput = document.createElement('input');
            newInput.type = "text";
            newInput.name = "nomes[]";
            newInput.placeholder = "Nome da pessoa";
            newInput.classList.add('name-field'); // Adiciona a classe CSS
            newDiv.appendChild(newInput);

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = 'Remover';
            removeButton.addEventListener('click', function() {
                inputContainer.removeChild(newDiv);
                // Atualize a quantidade de pessoas quando uma pessoa for removida
                quantidadePessoas = Math.max(0, quantidadePessoas - 1);
            });

            newDiv.appendChild(removeButton);
            inputContainer.appendChild(newDiv);
            
            // Atualize a quantidade de pessoas
            quantidadePessoas++;
        }

        function setChildCount(count) {
            selectedChildCount = count;
            document.querySelector('input[name="criancas"]').value = count;
            
            // Remove a classe de destaque de todos os botões
            for (let i = 0; i <= 9; i++) {
                var button = document.getElementById('childButton' + i);
                button.classList.remove('selected');
            }
            
            // Adicione a classe de destaque ao botão clicado
            var selectedButton = document.getElementById('childButton' + count);
            selectedButton.classList.add('selected');
        }

        function validateChildrenCount() {
            if (selectedChildCount >= quantidadePessoas) {
                alert("A quantidade de crianças selecionadas não pode ser maior do que o número de pessoas cadastradas." + quantidadePessoas);
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <form method="post" onsubmit="return validateChildrenCount();">
        <div id="step1">
            <p>Preencha os nomes das pessoas que gostariam de confirmar presença:</p>
            <div id="name-input-container" >
            </div>
            <button type="button" onclick="addNameField()">Adicionar Mais</button>
            <br><br>
            <button type="button" onclick="showStep(2)">Próximo</button>
        </div>

        <div id="step2" style="display: none;">
            <p>Obrigado! Das pessoas confirmadas, quantas têm menos de 7 anos?</p>
            <div>
                <?php
                for ($i = 0; $i <= 9; $i++) {
                    echo '<button class="childb" type="button" id="childButton' . $i . '" onclick="setChildCount(' . $i . ')">' . $i . '</button>';
                }
                ?>
            </div>
            <input type="hidden" name="criancas" value="0">
            <br><br>
            <button type="button" onclick="showStep(1)">Anterior</button>
            <input type="submit" value="Confirmar Presença">
        </div>
    </form>
    <script>
        showStep(1); // Mostrar a primeira parte inicialmente
    </script>

    <?php
    // Configuração do banco de dados
    $hostname = "192.168.0.14";
    $username = "arthur";
    $password = "Marlon@87";
    $database = "arthur";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Conectar ao banco de dados
        $conn = new mysqli($hostname, $username, $password, $database);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Coletar informações do formulário
        $nomes = isset($_POST['nomes']) ? $_POST['nomes'] : array();
        $criancas = $_POST['criancas'];
        $total_pessoas = count($nomes); // Conta o número de pessoas do "Step 1"
        $adultos = $total_pessoas - $criancas; // Calcula o número de adultos

        // Converter o array de nomes em uma única string
        $nomesFormatados = implode(", ", $nomes);

        // Preparar a consulta SQL com parâmetros
        $query = $conn->prepare("INSERT INTO confirmacao_presenca (nomes, adultos, criancas) VALUES (?, ?, ?)");
        $query->bind_param("sii", $nomesFormatados, $adultos, $criancas);

        // Executar a consulta
        if ($query->execute()) {
            echo "<script>alert('Confirmado com sucesso!\\nObrigado por confirmar sua presença!\\nAguardaremos vocês lá!');</script>";
        } else {
            echo "<script>alert('Erro ao inserir os dados: " . $conn->error . "');</script>";
        }

        // Fechar a conexão com o banco de dados
        $query->close();
        $conn->close();
    }
    ?>
    <br>
    <form action="index.php">
        <input type="submit" value="Voltar!" />
    </form>
</body>
</html>