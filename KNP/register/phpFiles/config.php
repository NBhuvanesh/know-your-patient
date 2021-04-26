<?php
$servername = "freedb.tech";
$username = "freedbtech_bhuvanesh";
$password = "bhuvan2000";
$dbname = "freedbtech_knowYourPatient";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
