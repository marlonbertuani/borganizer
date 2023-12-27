<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
    <title>Super Arthur</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .logoarthur{
            display: block;
            margin-top: 60px;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
        }

        .msghome{
            display: none;
            color: rgb(223, 18, 18);
            text-align: center;
            font-family: Comic Sans MS;
            margin-top: 120px;
        }

        .botoes{
            margin-top: 220px;
            font-family: Comic Sans MS;
            background-color: red;
            border: none;
            color: #fff;
            padding: 18px 35px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            font-size: 22px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .botoes:hover {
            animation: none;
        }

    </style>
</head>
<body>    
    <img class="logoarthur" src="superarthur.png" style="text-align: center;">
    <h1 class="msghome">Estou feliz com sua visita!</h1>
    <br>
    <br>
    <div style="text-align: center;">
    &ensp; <a style="margin-top: 180px;" class="botoes" href="confirmar_presenca.php">Quero Confirmar Presença</a>
    &ensp; <a class="botoes" href="compartilhar_fotos.php">Quero Compartilhar Fotos</a>
    </div>
</body>
</html>