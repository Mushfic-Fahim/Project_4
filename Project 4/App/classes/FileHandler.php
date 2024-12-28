<?php
namespace App\classes;

class FileHandler {
    public function readJson($filePath) {
        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            return json_decode($jsonContent, true);
        }
        return [];
    }

    public function writeJson($filePath, $data) {
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
