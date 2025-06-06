<?php

namespace App;

class Uploader {
    public function upload($filename, $contents) {
        $uploadDir = __DIR__ . '/../uploads/';

        // Verifica se a pasta existe, senão cria
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true) && !is_dir($uploadDir)) {
                throw new \RuntimeException("Falha ao criar o diretório de upload.");
            }
        }

        // Caminho completo do arquivo
        $destination = $uploadDir . $filename;

        // Salva o conteúdo do arquivo
        if (file_put_contents($destination, $contents) === false) {
            throw new \RuntimeException("Erro ao salvar o arquivo.");
        }
    }
}
