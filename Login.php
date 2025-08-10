<?php
$servername = "localhost";
$username = "root";
$password = "@Vadher01";
$dbname = "bookmyroom";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = trim($_POST['username']);
$pass = trim($_POST['password']);

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if ($pass === $row['password']) {
        echo "Login successful!";
        header("Location: dashboard.html");
        exit();
    } else {
        echo "Invalid password!";
    }

} else {
    echo "No user found!";
}

$stmt->close();
$conn->close();
?>
