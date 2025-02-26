<?php
$servername = "dev-demo-app-db.cluster-crczlgebnier.ca-central-1.rds.amazonaws.com";
$username = "demoapp";
$password = 'u:CmjP}Z$iHf04ml!GO0$$M[';
$dbname = "demoapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sql_insert = "INSERT INTO clients (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com'),('Brad', 'Power', 'brad@example.com'),('Paul', 'Greene', 'paul@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "Table clients created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($sql_insert) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

$conn->close();
?>