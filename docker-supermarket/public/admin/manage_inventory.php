<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Inventory</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Manage Inventory</h1>

        <div class="card-container">
            <!-- Add Inventory Card -->
            <a href="add_product.php" class="card">
                <div class="card-content">
                    <h2>Add Inventory</h2>
                    <p>Add new products to the inventory.</p>
                </div>
            </a>

            <!-- Edit Inventory Card -->
            <a href="edit_product.php" class="card">
                <div class="card-content">
                    <h2>Edit Inventory</h2>
                    <p>Edit existing products in the inventory.</p>
                </div>
            </a>

            <!-- Delete Inventory Card -->
            <a href="delete_product.php" class="card">
                <div class="card-content">
                    <h2>Delete Inventory</h2>
                    <p>Delete products from the inventory.</p>
                </div>
            </a>
        </div>

        <a href="../auth/logout.php" class="logout-button">Logout</a>
    </div>
</body>
</html>
