<!DOCTYPE html>
<?php 
ob_start();
	//require 'validator.php';
   include 'config.php';
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-----------------------------START CSS----------------------------->


<style>
    .button {
  background-color:hsl(202, 95%, 34%); /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}


.button {
  background-color: white; 
  color: black; 
  padding: 10px;
  border: 2px solid hsl(202, 95%, 34%);
  border-radius: 8px;
}

.button:hover {
  background-color:hsl(202, 95%, 34%);
  color: white;
}
</style>
</head>
<body>
<?php



mysqli_query($conn, "UPDATE motor_angle set run = 1 where run=0");
$sql = "SELECT * FROM motor_angle LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "</br>motor1: " . $row["motor1"];
    echo " - motor2: " . $row["motor2"];
    echo " - motor3: " . $row["motor3"];
    echo " - motor4: " . $row["motor4"];
    echo " - motor5: " . $row["motor5"];
    echo " - motor6: " . $row["motor6"];
    echo "</br></br> run = " . $row["run"];
  
  }
} else {
  echo "0 results";
}
?>
<form id="myform"action="" method="POST">
</br><button class=" button button" type="submit"name="submit1">Stop & Go Back</button>
</form>
  <?php 
  if(isset($_POST['submit1']))
  {
    mysqli_query($conn, "UPDATE motor_angle set run = 0 ");
  ?>
    <script type='text/javascript'>
  window.location="control_panel.php";
   </script>
<?php  
  }
mysqli_close($conn);
?>
</body>
</html>