<?php
$targetDir = "uploads/";
$uploadOk = 1;
// Tipos de arquivo permitidos
$allowedImageTypes = array("jpg", "jpeg", "png", "gif");
$allowedFileTypes = array_merge($allowedImageTypes, array("zip"));
// Processa cada arquivo enviado
foreach ($_FILES["fileToUpload"]["name"] as $key => $value) {
    $originalFileName = $_FILES["fileToUpload"]["name"][$key];
    // Substitui espaços por underscores
    $fileNameWithoutSpaces = str_replace(' ', '_', $originalFileName);
    $targetFile = $targetDir . basename($fileNameWithoutSpaces);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    // Verifica se o arquivo é uma imagem real (se aplicável)
    if (in_array($fileType, $allowedImageTypes)) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$key]);
        if ($check === false) {
            echo "Desculpe, apenas arquivos de imagem são permitidos.";
            $uploadOk = 0;
        }
    }
    // Verifica se o tipo de arquivo é permitido
    if (!in_array($fileType, $allowedFileTypes)) {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG, GIF e ZIP são permitidos.";
        $uploadOk = 0;
    }
    // Tenta fazer o upload do arquivo
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $targetFile)) {
            echo "O arquivo " . $originalFileName . " foi enviado com sucesso.";
        } else {
            echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
        }
    }
}
?>
