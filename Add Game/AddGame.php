<!DOCTYPE html>
<html>
        <head>
                <link rel="stylesheet" href="style.css">
        </head>
<body>

<?php


// define variables and set to empty values
$memberid = $Boardgame = $Position = $Dates = $Eventt = $Notes="";
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $memberid = test_input($_POST["Memberid"]);
  if (empty($_POST["Memberid"])) {
    $memberid = "Member id is required";
  } 
  
 
  $Boardgame = test_input($_POST["Boardgame"]);
  if (empty($_POST["Boardgame"])) {
    $Boardgame = "Boardgame is required";
  } 

  $Position = test_input($_POST["Position"]);
  if (empty($_POST["Position"])) {
    $Position = "Position is required";
  } 

  $Dates = test_input($_POST["Dates"]);
  if (empty($_POST["Dates"])) {
    $Dates = "Dates is required";
  } 

  $Eventt = test_input($_POST["Eventt"]);
  if (empty($_POST["Eventt"])) {
    $Eventt = "Event is required";
  } 

  $Notes = test_input($_POST["Notes"]);
  if (empty($_POST["Notes"])) {
    $Notes = "Notes is required";
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
  
  $sql = "INSERT INTO BoardGame (Memberid, Boardgame, Notes,Position,Dates,eventt)
  VALUES ('$memberid', '$Boardgame', '$Notes','$Position','$Dates','$eventt')";
  
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

<h1>Asign member new game </h1>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
 Member ID:<br>
<input type="text" name="Memberid">
<span class="error">* <?php echo $memberid;?></span>
<br>
Boardgame:<br>
<input type="text" name="Boardgame">
<span class="error">* <?php echo $Boardgame;?></span>
<br>
Notes:<br>
<input type="text" name="Notes">
<span class="error">* <?php echo $Notes;?></span>
<br>
Position:<br>
<input type="text" name="Position">
<span class="error">* <?php echo $Position;?></span>
<br>

Dates:<br>
<input type="text" name="Dates">
<span class="error">* <?php echo $Dates;?></span>
<br>
event:<br>
<input type="text" name="event">
<span class="error">* <?php echo $eventt;?></span>
<br>

  <input type="submit" value="Submit">
</form>
</body>
</html>
