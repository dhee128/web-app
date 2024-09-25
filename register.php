<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database configuration
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password
$dbname = "my_project_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$user = $_POST['username'];
$contact = $_POST['contact'];
$dob = $_POST['date_of_birth'];
$city = $_POST['city'];
$pass = $_POST['password'];
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
// Prepare and bind
$sql = "INSERT INTO project (username, contact, date_of_birth, city, password) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssss", $user, $contact, $dob, $city, $pass);

// Execute statement
if ($stmt->execute()) {
    // Registration successful, use JavaScript to show alert
    echo "<script>alert('Registration successful! Welcome'); window.location.href='login.html';</script>";
} else {
    echo "<script>alert('Error: " . $stmt->error . "');</script>";
}
// Close connection
$stmt->close();
$conn->close();
?>
