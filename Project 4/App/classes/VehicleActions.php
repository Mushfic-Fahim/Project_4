<?php
namespace App\classes;

interface VehicleActions {
    public function addVehicle($vehicle);
    public function editVehicle($id, $vehicle);
    public function deleteVehicle($id);
    public function getVehicles();
}
