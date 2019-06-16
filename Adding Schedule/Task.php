<!DOCTYPE html>
<html>
        <head>
                <link rel="stylesheet" href="style.css">
        </head>
<body>

<?php


// define variables and set to empty values
$Day = $Time = $Venue ="";
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Day = test_input($_POST["Day"]);
  if (empty($_POST["Memberid"])) {
    $Day = "Day is required";
  } 
  
 
  $Time = test_input($_POST["Time"]);
  if (empty($_POST["Time"])) {
    $Time = "Time is required";
  } 

  $Venue = test_input($_POST["Venue"]);
  if (empty($_POST["Venue"])) {
    $Venue = "  Venue is required";
  } 

  
  $servername = "localhost";
  $username = "root";
  $password = "vikas";
  $dbname = "boardgame";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  $sql = "insert into Schedule  (Days , Times , Venue)
  VALUES ('$Day', '$Time', '$Venue')";
  
  if ($conn->query($sql) === TRUE) {
      echo "New record updated successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Asign new venue</h1>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
 Day:<br>
<input type="text" name="Day">
<span class="error">* <?php echo $Day;?></span>
<br>
Time:<br>
<input type="text" name="Time">
<span class="error">* <?php echo $Time;?></span>
<br>
Venue:<br>
<input type="text" name="Venue">
<span class="error">* <?php echo $Venue;?></span>
<br>


  <input type="submit" value="Submit">
</form>
</body>
</html>
