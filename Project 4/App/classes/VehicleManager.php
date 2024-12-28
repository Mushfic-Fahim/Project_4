<?php
namespace App\classes;

require_once __DIR__ . '/FileHandler.php';
require_once __DIR__ . '/VehicleBase.php';

use App\classes\VehicleBase;
use App\Traits\FileHandler;

class VehicleManager extends VehicleBase {
    use FileHandler;

    private $filePath = __DIR__ . '/../../data/vehicles.json';

    public function __construct() {
        parent::__construct('', '', 0, ''); // Adjust constructor call as needed
    }

    public function getVehicles() {
        // Read vehicles from the JSON file
        $data = $this->readJson($this->filePath);
        return $data ?: []; // Return an empty array if no data is found
    }

    public function addVehicle($data) {
        $vehicles = $this->getVehicles();
        $vehicles[] = $data;
        $this->writeJson($this->filePath, $vehicles);
    }

    public function editVehicle($id, $data) {
        $vehicles = $this->getVehicles();
        $vehicles[$id] = $data;
        $this->writeJson($this->filePath, $vehicles);
    }

    public function deleteVehicle($id) {
        $vehicles = $this->getVehicles();
        unset($vehicles[$id]);
        $this->writeJson($this->filePath, array_values($vehicles));
    }

    public function getDetails() {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image,
        ];
    }
}
