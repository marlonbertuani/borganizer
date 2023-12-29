<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Diretório de destino
    $targetDir = "uploads/";

    // Verificar se foram enviados arquivos
    if (!empty($_FILES['fileInput']['name'][0])) {
        $files = $_FILES['fileInput'];

        // Loop através dos arquivos
        foreach ($files['name'] as $key => $value) {
            $fileName = basename($value);

            // Remove espaços e caracteres especiais no nome do arquivo
            $fileName = preg_replace('/[^\w\s.-]/', '', $fileName);
            $fileName = str_replace(' ', '_', $fileName);

            $targetFile = $targetDir . $fileName;

            // Verifica se o arquivo já existe
            if (file_exists($targetFile)) {
                echo "Desculpe, o arquivo $fileName já existe.<br>";
            } else {
                if (move_uploaded_file($files['tmp_name'][$key], $targetFile)) {
                    echo "O arquivo $fileName foi enviado com sucesso.<br>";
                    // Adicione aqui qualquer outra lógica necessária após o upload
                } else {
                    echo "Desculpe, ocorreu um erro ao enviar o arquivo $fileName.<br>";
                }
            }
        }
    } else {
        echo "Nenhum arquivo enviado.<br>";
    }
}
?>