<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $state = $_POST["state"];
    $city = $_POST["city"];

    // Send the email
    $to = "web-test@luckycx.com";
    $subject = "Form Submission";
    $message = "Name: $name\nEmail: $email\nCountry: $country\nState: $state\nCity: $city";
    
    mail($to, $subject, $message);
}
?>
