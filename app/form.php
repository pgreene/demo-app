<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php include 'connect.php';?>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $lastnameErr = "";
$firstname = $email = $lastname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["lastname"])) {
    $lastname = "";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
        $lastnameErr = "Only letters and white space allowed";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['submit']))
{
	//print_r($_POST);
	$sql = "INSERT INTO clients (firstname, lastname, email) VALUES('".addslashes($_POST['name'])."', '".addslashes($_POST['lastname'])."', '".addslashes($_POST['email'])."')";
    $conn->query($sql);
}
?>

<h2>New Client</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  firstname: <input type="text" name="name" value="<?php echo $firstname;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  lastname: <input type="text" name="lastname" value="<?php echo $lastname;?>">
  <span class="error"><?php echo $lastnameErr;?></span>
  <br><br>
  email: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Input</h2>";
echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $email;
echo "<br>";
?>

<h2>Clients</h2> 
<br>
<?php include 'view.php';?>
</body>
</html>