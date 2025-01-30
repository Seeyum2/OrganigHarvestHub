<?php
session_start();

if (!isset($_SESSION['farmer_id'])) {
    header("Location: login.php");
    exit;
}

$farmer_id = $_SESSION['farmer_id'];

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

$sql = "SELECT * FROM farmers WHERE farmer_id = $farmer_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user_data = $result->fetch_assoc();
} else {
    // Handle error
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="container">
        <h1>Farmer Profile</h1>
        <table>
            <tr>
                <td>Full Name:</td>
                <td><?php echo $user_data['full_name']; ?></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><?php echo $user_data['date_of_birth']; ?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><?php echo $user_data['address']; ?></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><?php echo $user_data['phone_number']; ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $user_data['email']; ?></td>
            </tr>
            <tr>
                <td>NID Number:</td>
                <td><?php echo $user_data['nid_number']; ?></td>
            </tr>
            <tr>
                <td>Sex:</td>
                <td><?php echo $user_data['sex']; ?></td>
            </tr>
            <tr>
                <td>Bio:</td>
                <td><?php echo $user_data['bio']; ?></td>
            </tr>
            <tr>
                <td>Profile Picture:</td>
                <td><img src="<?php echo $user_data['profile_picture']; ?>" alt="Profile Picture" width="100"></td>
            </tr>
            <!-- You can add more fields here -->
        </table>
        <a href="edit_profile_farmer.php" class="edit-button">Edit Profile</a>
        <a href="index.php" class="edit-button">HOME</a>
        <a href="sell_product.php" class="edit-button">Sell a Product</a>
        <a href="profile_farmer_logout.php" class="logout-button">Logout</a> 
    </div>
</body>
</html>
