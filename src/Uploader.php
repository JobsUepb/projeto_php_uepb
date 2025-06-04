<?php

namespace App;

use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;

class Uploader
{
    private Filesystem $filesystem;

    public function __construct()
    {
        $uploadDir = getenv('UPLOADS_DIR');
        if (!$uploadDir) {
            throw new \Exception('UPLOADS_DIR não definido no .env');
        }

        $fullPath = __DIR__ . '/../' . $uploadDir;
        $adapter = new LocalFilesystemAdapter($fullPath);
        $this->filesystem = new Filesystem($adapter);
    }

    public function upload(string $filename, string $contents): void
    {
        // Gera subpastas com base no ano e mês
        $subfolder = date('Y/m'); // exemplo: 2025/06
        $path = $subfolder . '/' . $filename;

        // Cria o arquivo no caminho com subpastas
        $this->filesystem->write($path, $contents);
    }
}