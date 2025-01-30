<?php
session_start(); // Start the session
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'organicHarvestHub';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product_id from URL parameter
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo 'Product not found.';
        exit;
    }
} else {
    echo 'Invalid product ID.';
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['product_name']; ?> Details</title>
    <link rel="stylesheet" href="product_details.css">
</head>
<body>
    <div class="box">
        <br><h2><?php echo $product['product_name']; ?></h2><br><br><br>
        <div class="images">
            <img src="<?php echo $product['image1']; ?>" alt="Image 1">
            <img src="<?php echo $product['image2']; ?>" alt="Image 2">
            <img src="<?php echo $product['image3']; ?>" alt="Image 3">
        </div><br><br><br>
        <p><?php echo $product['product_description']; ?></p>
        <p>Price: $<?php echo $product['price']; ?></p>
        <p>Status: <?php echo $product['status']; ?></p>
        
        <div class="buttons">
            <a href="index.php" class="home-button">Home</a><br><br>
            <button class="add-to-cart" onclick="addToCart(<?php echo $product_id; ?>)">Add to Cart</button>
        </div>
    </div>

    <script>
    function addToCart() {
        console.log('Add to Cart clicked'); // Debug statement
        <?php
        $_SESSION['cart'][$product_id] = $quantity;
        echo 'console.log('.json_encode($_SESSION['cart']).');'; // Print cart contents for debugging
        ?>
        // You can customize this alert message
        alert('Product <?php echo $product["product_name"]; ?> added to cart.');
    }
    </script>
</body>
</html>
