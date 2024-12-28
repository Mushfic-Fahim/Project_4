<?php
namespace App\classes;

use App\Traits\FileHandler;
use App\Interfaces\VehicleActions;
use App\Models\VehicleBase;

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler;

    private $filePath = 'data/vehicles.json';

    public function addVehicle($vehicle) {
        $vehicles = $this->getVehicles();
        $vehicles[] = $vehicle;
        $this->writeJson($this->filePath, $vehicles);
    }

    public function editVehicle($id, $vehicle) {
        $vehicles = $this->getVehicles();
        $vehicles[$id] = $vehicle;
        $this->writeJson($this->filePath, $vehicles);
    }

    public function deleteVehicle($id) {
        $vehicles = $this->getVehicles();
        unset($vehicles[$id]);
        $this->writeJson($this->filePath, array_values($vehicles));
    }

    public function getVehicles() {
        return $this->readJson($this->filePath);
    }

    public function getDetails() {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image
        ];
    }
}
