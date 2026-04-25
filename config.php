<?php
$host = "localhost";
$port = "5432";
$dbname = "portfolio_db";   // tumhara DB name (pgAdmin wala)
$user = "postgres";         // default PostgreSQL user
$password = "yourpassword"; // apna pgAdmin password

// Create connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
