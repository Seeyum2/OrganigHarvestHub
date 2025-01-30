<?php
session_start();

if (!isset($_SESSION['farmer_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['farmer_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... other data ...
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $available_date = $_POST['available_date'];
    // Handle image upload
    $image_dir = "images/"; // Specify the directory to store images
    $image_name = $_FILES['product_image']['name'];
    $image_tmp = $_FILES['product_image']['tmp_name'];
    $image_path = $image_dir . $image_name;
    move_uploaded_file($image_tmp, $image_path);

    // ... other data ...

    // Replace with your database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "organicHarvestHub";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO products (user_id, product_name, product_description, price, status, available_date, image1)
    VALUES ('$user_id', '$product_name', '$product_description', '$price', '$status', '$available_date', '$image_path')";

    // ... execute the query ...
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Product added successfully"); window.location.href = "sell_product.php"; </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
