<?php
require_once 'App/classes/VehicleManager.php';  

use App\classes\VehicleManager;
$vehicleManager = new VehicleManager();
$vehicles = $vehicleManager->getVehicles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Listing</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include('./view/header.php'); ?> <!-- Include header from another file -->

    <div class="container mt-4">
        <h2>Vehicle List</h2>
        <div class="row">
            <?php foreach ($vehicles as $key => $vehicle): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="assets/<?php echo $vehicle['image']; ?>" class="card-img-top" alt="<?php echo $vehicle['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $vehicle['name']; ?></h5>
                            <p class="card-text"><?php echo $vehicle['type']; ?> - $<?php echo $vehicle['price']; ?></p>
                            <a href="view/edit.php?id=<?php echo $key; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_vehicle.php?id=<?php echo $key; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
