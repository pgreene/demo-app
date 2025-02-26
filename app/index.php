<?php
$servername = "dev-demo-app-db.cluster-crczlgebnier.ca-central-1.rds.amazonaws.com";
$username = "demoapp";
$password = 'u:CmjP}Z$iHf04ml!GO0$$M[';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed ... sad. : " . $conn->connect_error);
}
echo "Connected to RDS successfully ... happy. )";
?>
