<?php

$host = 'localhost'; // Replace with your PostgreSQL host
$port = 5432; // Replace with your PostgreSQL port
$username = ''; // Replace with your username
$password = ''; // Replace with your password

$dbname = 'otd_archive';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$username password=$password");
if (!$conn) {
    echo "Connection failed";
    exit;
}
?>