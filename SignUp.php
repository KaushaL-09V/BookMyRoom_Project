<?php
$servername = "localhost";
$username = "root";
$password = "@Vadher01"; 
$dbname = "bookmyroom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = trim($_POST['username']);
$email = trim($_POST['email']);
$pass = trim($_POST['password']);

// Check if username or email already exists
$sql = "SELECT * FROM users WHERE username='$user' OR email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username or Email already exists!";
} else {
    // Use correct variable name ($pass, not $Pass)
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $pass, $email);

    if ($stmt->execute()) {
        header("Location: loginPage.html");
        exit(); 
    } else {
        echo "Registration not successful.";
    }
    $stmt->close();
}

$conn->close();
?>
