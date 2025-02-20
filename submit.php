<?php
include 'config.php';  // Database Connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];

    // Prevent SQL Injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $mobile = mysqli_real_escape_string($conn, $mobile);
    $message = mysqli_real_escape_string($conn, $message);

    // Insert Data
    $sql = "INSERT INTO contacts (name, email, mobile, message) 
            VALUES ('$name', '$email', '$mobile', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
