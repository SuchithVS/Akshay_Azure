<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../index.php");
    exit;
}
include('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $add_query = "INSERT INTO products (product_name, category, price, quantity) 
                  VALUES ('$product_name', '$category', '$price', '$quantity')";
    
    if (mysqli_query($conn, $add_query)) {
        header("Location: manage_inventory.php");
        exit;
    } else {
        $error = "Error adding product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Add Inventory</h1>
        <form method="POST" action="add_product.php">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" id="product_name" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" name="category" id="category" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" name="price" id="price" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" required>
            </div>
            <button type="submit">Add Product</button>
            <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        </form>

        <a href="manage_inventory.php" class="back-button">Back to Manage Inventory</a>
    </div>
</body>
</html>
