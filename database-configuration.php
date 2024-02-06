<?php
// Get the database connection URL from the environment variable
$url = getenv('JAWSDB_URL');

// Parse the URL to obtain connection details
$urlParts = parse_url($url);

$host = $urlParts['host'];
$port = $urlParts['port'];
$user = $urlParts['user'];
$pass = $urlParts['pass'];
$dbname = ltrim($urlParts['path'], '/');

// Create the mysqli connection object
$Link = mysqli_connect($host, $user, $pass, $dbname, $port);

// Check if the connection was successful
if (!$Link) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>


