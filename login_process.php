<?php
session_start();

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

$enteredPhone = $_POST['phone_number'];
$enteredPassword = $_POST['password'];

$sql = "SELECT * FROM farmers WHERE phone_number = '$enteredPhone' AND password = '$enteredPassword'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $_SESSION['farmer_id'] = $result->fetch_assoc()['farmer_id'];
    echo '<script>alert("Login successfully"); window.location.href = "profile_farmer.php"; </script>';
    exit;
} else {
    echo '<script>alert("Invalid credentials. Please try again."); window.location.href = "login.php";</script>';
}

$conn->close();
?>
