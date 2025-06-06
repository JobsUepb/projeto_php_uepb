<?php

namespace App;

class Uploader {
    public function upload($filename, $contents) {
        $uploadDir = __DIR__ . '/../uploads/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        file_put_contents($uploadDir . $filename, $contents);
    }
}
