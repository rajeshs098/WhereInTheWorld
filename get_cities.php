<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "world";

if (isset($_POST['state_id'])) {
    $stateId = $_POST['state_id'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch cities based on selected state
    $cities_query = "SELECT id, name FROM cities WHERE state_id = $stateId";
    $cities_result = $conn->query($cities_query);

    echo '<option value="">Select a city</option>';
    while ($city = $cities_result->fetch_assoc()) {
        echo '<option value="' . $city['id'] . '">' . $city['name'] . '</option>';
    }

    $conn->close();
}
?>
