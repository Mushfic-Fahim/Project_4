<?php
include './header.php';

if (!isset($_GET['id'])) {
    die('Vehicle ID is missing.');
}

$id = $_GET['id'];

// Fetch existing data (assuming you have access to VehicleManager)
require_once '../App/classes/VehicleManager.php';
use App\classes\VehicleManager;

$vehicleManager = new VehicleManager();
$vehicles = $vehicleManager->getVehicles();

if (!isset($vehicles[$id])) {
    die('Vehicle not found.');
}

$vehicle = $vehicles[$id];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedVehicle = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image'],
    ];

    $vehicleManager->editVehicle($id, $updatedVehicle);

    header('Location: ../index.php');
    exit;
}
?>


<div class="container my-4">
    <h1>Edit Vehicle</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Vehicle Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($vehicle['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vehicle Type</label>
            <input type="text" name="type" class="form-control" value="<?php echo htmlspecialchars($vehicle['type']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="<?php echo htmlspecialchars($vehicle['price']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" value="<?php echo htmlspecialchars($vehicle['image']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Vehicle</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
