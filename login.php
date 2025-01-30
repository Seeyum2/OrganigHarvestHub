<?php
session_start();

// If user is already logged in, redirect to landing page
if (isset($_SESSION['farmer_id'])) {
    header("Location: index.php"); // Change to actual landing page
    exit;
}

// Rest of your HTML and login form
?>
       <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="register-login.css">
</head>
<body>
    <h1>Login</h1>
    <form action="login_process.php" method="post">
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
   
</body>
</html>
