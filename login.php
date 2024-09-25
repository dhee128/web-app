<?php
// Starting session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'my_project_db');

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists in the database
    $query = "SELECT * FROM project WHERE Username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Successful login
        $_SESSION['username'] = $username;

        // Redirect to food.html
        header('Location: food.html');
        exit;
    } else {
        // Invalid login, redirect to login.html with error
        header('Location: login.html?error=1');
        exit;
    }
}

// Close connection
$conn->close();
?>

