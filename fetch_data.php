<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "world";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch countries from the 'countries' table
$countriesQuery = "SELECT id, name FROM countries";
$countriesResult = $conn->query($countriesQuery);

// Process the countries data and send it as JSON
$countries = array();
while ($row = $countriesResult->fetch_assoc()) {
    $countries[] = $row;
}

echo json_encode($countries);
?>
