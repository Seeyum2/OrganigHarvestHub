<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="register-login.css">

</head>
</head>
<body>
    <h1>Registration</h1>
    <form action="register.php" method="post">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Choose a password" required>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

        <label for="user_type">Select User Type:</label>
        <select id="user_type" name="user_type">
            <option value="farmer">Farmer</option>
            <option value="customer">Customer</option>
        </select>
        
        <button type="submit">Register</button>
    </form>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Add your database connection and error handling here
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'organicHarvestHub';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the phone number is already registered
    $check_query = "SELECT * FROM farmers WHERE phone_number = '$phone_number'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        echo '<script>alert("You are already registered. Please log in.");</script>';
        echo '<script>window.location.href = "login.php";</script>';
    } else {
        // Add the user registration data to the database
        $sql = "INSERT INTO farmers (full_name, phone_number, password) VALUES ('$full_name', '$phone_number', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Registration successful!");</script>';
            echo '<script>window.location.href = "index.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>


</body>
</html>
