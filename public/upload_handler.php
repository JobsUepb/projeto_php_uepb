<?php

require_once __DIR__ . '/../src/bootstrap.php';

use App\Uploader;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])) {
    $file = $_FILES['arquivo'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploader = new Uploader();

        $filename = basename($file['name']);
        $contents = file_get_contents($file['tmp_name']);

        $uploader->upload($filename, $contents);

        echo "Arquivo enviado com sucesso!";
    } else {
        echo "Erro no upload: " . $file['error'];
    }
} else {
    echo "Nenhum arquivo enviado.";
}