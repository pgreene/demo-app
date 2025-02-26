<?php
$servername = "dev-demo-app-db.cluster-crczlgebnier.ca-central-1.rds.amazonaws.com";
$username = "demoapp";
// There is a way to hide this password if secret was in AWS Secrets Manager ... however it's encrypted in parameter store
// Currently I am not clear on how to retrieve this from SSM Parameter Store via PHP
$password = 'u:CmjP}Z$iHf04ml!GO0$$M['; 
$dbname = "demoappdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed ... sad. " . $conn->connect_error);
}

?>