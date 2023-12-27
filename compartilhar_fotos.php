<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compartilhar Fotos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Compartilhar Fotos</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Selecione uma imagem para fazer upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Fazer Upload" name="submit">
    </form>
    <br>
    <form action="index.php">
        <input type="submit" value="Voltar!" />
    </form>
</body>
</html>