<?php include 'connect.php';?>
<?php
$sql = "SELECT id, firstname, lastname FROM clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Name: " . $row["firstname"]. " " . $row["lastname"]. "email: " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 