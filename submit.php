<?php
// Database connection
$conn = pg_connect("host=localhost dbname=portfolio_db user=postgres password=yourpassword");

if (!$conn) {
    die("Connection failed");
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

// Insert query
$query = "INSERT INTO contact_messages (name, email, mobile, message) 
          VALUES ($1, $2, $3, $4)";

$result = pg_query_params($conn, $query, array($name, $email, $mobile, $message));

if ($result) {
    echo "Message sent successfully!";
} else {
    echo "Error occurred!";
}
?>
