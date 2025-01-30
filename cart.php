<?php
session_start();
// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'organicHarvestHub';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function calculateTotalPrice($cart, $conn) {
    $totalPrice = 0;

    foreach ($cart as $product_id => $quantity) {
        // Fetch product price from the database based on $product_id
        $sql = "SELECT price FROM products WHERE product_id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $totalPrice += $product['price'] * $quantity;
        }
    }

    return $totalPrice;
}

// Handle removing items from cart
if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="product_details.css">

</head>
<body>
    <h1>Your Cart</h1>

    <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        echo '<table>';
        echo '<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Action</th></tr>';

        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            // Fetch product details from your database based on $product_id
            $sql = "SELECT * FROM products WHERE product_id = $product_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $product = $result->fetch_assoc();

                // Display product information in the cart table
                echo '<tr>';
                echo '<td>' . $product['product_name'] . '</td>';
                echo '<td>$' . $product['price'] . '</td>';
                echo '<td>' . $quantity . '</td>';
                echo '<td><a href="?remove_id=' . $product_id . '">&#10060;</a></td>';
                echo '</tr>';
            }
        }

        echo '</table>';

        // Calculate and display total price
        $totalPrice = calculateTotalPrice($_SESSION['cart'], $conn);
        echo '<p>Total Price: $' . $totalPrice . '</p>';
    } else {
        echo '<p>Your cart is empty.</p>';
    }

    // Close the database connection
    $conn->close();
    ?>
      <div class="buttons">
     <a href="index.php" class="home-button">Home</a><br><br>
    </div>
</body>
</html>
