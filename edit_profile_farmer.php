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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $nid_number = $_POST['nid_number'];
    $sex = $_POST['sex'];
    $bio = $_POST['bio'];
   

    // Update the user data in the database
    $sql = "UPDATE farmers SET 
                full_name = '$full_name',
                date_of_birth = '$date_of_birth',
                address = '$address',
                phone_number = '$phone_number',
                email = '$email',
                nid_number = '$nid_number',
                sex = '$sex',
                bio = '$bio'

            WHERE farmer_id = $farmer_id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Profile updated successfully!"); window.location.href = "profile_farmer.php";</script>';
    } else {
        echo '<script>alert("Error updating profile. Please try again."); window.location.href = "edit_profile_farmer.php";</script>';
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Farmer Profile</title>
    <link rel="stylesheet" href="edit_profile_farmer.css">
</head>
<body>
    <div class="container">
        <h1>Edit Farmer Profile</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo $user_data['full_name']; ?>"><br><br>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $user_data['date_of_birth']; ?>"><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address"><?php echo $user_data['address']; ?></textarea><br><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $user_data['phone_number']; ?>"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user_data['email']; ?>"><br><br>

            <label for="nid_number">NID Number:</label>
            <input type="text" id="nid_number" name="nid_number" value="<?php echo $user_data['nid_number']; ?>"><br><br>

            <label for="sex">Sex:</label>
            <select id="sex" name="sex">
                <option value="male" <?php if ($user_data['sex'] == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if ($user_data['sex'] == 'female') echo 'selected'; ?>>Female</option>
                <option value="other" <?php if ($user_data['sex'] == 'other') echo 'selected'; ?>>Other</option>
            </select><br><br>

            <label for="document_pdf">Document PDF:</label>
            <input type="file" id="document_pdf" name="document_pdf"><br><br>

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio"><?php echo $user_data['bio']; ?></textarea><br><br>

            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture"><br><br>

            <button type="submit" class="update-button">Update Profile</button>
        </form>
        <a href="profile_farmer.php" class="cancel-button">Cancel</a>
    </div>
</body>
</html>
