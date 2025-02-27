<?php include 'connect.php';?>
<?php
$sql = "SELECT firstname, lastname, email FROM clients ORDER BY lastname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    #echo "<b>NAME:</b> " . $row["firstname"]. " " . $row["lastname"]. " | <b>E-MAIL:</b> " . $row["email"]. "<br>";
    echo $row["firstname"]. " " . $row["lastname"]. "<br>";

  }
} else {
  echo "0 results";
}
$conn->close();

?> 