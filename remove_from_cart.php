<?php
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Remove the product from the cart
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Redirect back to the cart page
header('Location: cart.php');
exit();
?>
