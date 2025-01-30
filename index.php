<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic Farm Products</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<nav>
    <div class="logo">Organic Harvest Hub</div>
    <div class="search">
        <input type="text" placeholder="Search products...">
        <button>Search</button>
    </div>
    <div class="cart">
        <a href="cart.php">Cart</a>
    </div>
    <div>
        <a href="profile_farmer.php">Profile</a>
    </div>
    
    <div class="account">
        <a href="login.php">Sign In</a>
        <a href="register.php">Register</a>
    </div>
</nav>

<section class="hero">
    <h1>Welcome to Organic Harvest Hub</h1>
    <p>Your Source for Fresh Organic Produce</p>
</section>
    <div class="product-container">
    <?php
     // Database connection
     $db_host = 'localhost';
     $db_user = 'root';
     $db_pass = '';
     $db_name = 'organicHarvestHub';
 
     $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
 
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
 
     // Fetch and display products
     $sql = "SELECT * FROM products";
     $result = $conn->query($sql);
 
    // Display products in a grid layout
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<img src="' . $row['image1'] . '" alt="' . $row['product_name'] . '">';
            echo '<h2>' . $row['product_name'] . '</h2>';
            echo '<p>' . $row['product_description'] . '</p>';
            echo '<p class="price">$' . $row['price'] . '</p>';
            echo '<p class="status ' . strtolower($row['status']) . '">' . $row['status'] . '</p>';
            echo '<a href="product_details.php?id=' . $row['product_id'] . '" class="details-button">Details</a>';
            echo '<button class="add-to-cart">Add to Cart</button>';
            echo '</div>';
        }
        
        
    } else {
        echo 'No products available.';
    }
    ?>
</div>
    $conn->close();
    ?>

</body>
</html>
