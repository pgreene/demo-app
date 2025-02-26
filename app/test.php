
<?php
echo "remove connection so this can't run anymore";
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