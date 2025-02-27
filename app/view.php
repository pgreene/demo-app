<?php include 'connect.php';?>
<?php
$sql = "SELECT DISTINCT firstname, lastname FROM clients WHERE firstname IS NOT NULL ORDER BY lastname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["firstname"]. " " . $row["lastname"]. "<br>";

  }
} else {
  echo "0 results";
}
$conn->close();

?> 