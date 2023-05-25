<?php

$host = 'localhost';
$port = 5432;
$username = '';
$password = '';

$dbname = 'otd_archive';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$username password=$password");
if (!$conn) {
    echo "Connection failed";
    exit;
}
?>