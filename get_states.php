<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "world";

if (isset($_POST['country_id'])) {
    $countryId = $_POST['country_id'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch states based on selected country
    $states_query = "SELECT id, name FROM states WHERE country_id = $countryId";
    $states_result = $conn->query($states_query);

    echo '<option value="">Select a state</option>';
    while ($state = $states_result->fetch_assoc()) {
        echo '<option value="' . $state['id'] . '">' . $state['name'] . '</option>';
    }

    $conn->close();
}
?>
