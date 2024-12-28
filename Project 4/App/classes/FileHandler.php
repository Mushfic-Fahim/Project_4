<?php
namespace App\Traits;

trait FileHandler {
    public function readJson($filePath) {
        if (!file_exists($filePath)) {
            return [];
        }
        $jsonContent = file_get_contents($filePath);
        return json_decode($jsonContent, true) ?: [];
    }

    public function writeJson($filePath, $data) {
        $jsonContent = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($filePath, $jsonContent);
    }
}
