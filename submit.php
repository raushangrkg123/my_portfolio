<?php
include 'config.php';

// Form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

// Insert query (PostgreSQL style)
$query = "INSERT INTO contact_messages (name, email, mobile, message) 
          VALUES ($1, $2, $3, $4)";

// Execute
$result = pg_query_params($conn, $query, array($name, $email, $mobile, $message));

// Response
if ($result) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . pg_last_error($conn);
}
?>
