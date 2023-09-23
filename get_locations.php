<?php
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'dependent_dropdown';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['country_id'])) {
    // Fetch states based on the selected country
    $country_id = $_POST['country_id'];
    $states_query = "SELECT id, name FROM states WHERE country_id = $country_id";
    $states_result = $conn->query($states_query);

    echo '<option value="">Select State</option>';
    while ($state = $states_result->fetch_assoc()) {
        echo '<option value="' . $state["id"] . '">' . $state["name"] . '</option>';
    }
} elseif (isset($_POST['state_id'])) {
    // Fetch cities based on the selected state
    $state_id = $_POST['state_id'];
    $cities_query = "SELECT id, name FROM cities WHERE state_id = $state_id";
    $cities_result = $conn->query($cities_query);

    echo '<option value="">Select City</option>';
    while ($city = $cities_result->fetch_assoc()) {
        echo '<option value="' . $city["id"] . '">' . $city["name"] . '</option>';
    }
}

// Close the database connection
$conn->close();
?>
