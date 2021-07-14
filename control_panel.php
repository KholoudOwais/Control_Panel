<!DOCTYPE html>
<?php
ob_start();
	//require 'validator.php';
   include 'config.php';
?>
<html>
<head>
  <title>Control Panel</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-----------------------------START CSS----------------------------->

<style>
.slidecontainer {
  width: 50%;
}

.slider {
  -webkit-appearance: none;
  width: 30%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: hsl(202, 95%, 34%);
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: hsl(202, 95%, 34%);
  cursor: pointer;
}

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

<!-----------------------------END CSS----------------------------->

</head>
<body>


<!-----------------------------START HTML----------------------------->

</br>
</br>

<center>

<h1 style="color:rgb(85, 85, 85);">Control Panel</h1>


<div  style="color:rgb(85, 85, 85);" class="container">
  <form id="myform"action="" method="POST">
  <div class="slidecontainer">
    <p> 
    Motor1 
    <input type="range" min="0" max="180" value='90' class="slider" name="myRange" id="myRange">
    Angle: <span id="demo" name="demo"></span>
  </p>
  </div>

  <div class="slidecontainer">
    <p>
      Motor2
    <input type="range" min="0" max="180" value="90" class="slider" id="myRange1" name="myRange1">
    Angle: <span id="demo1" name="demo1" ></span>
  </p>
  </div>

  <div class="slidecontainer">
    <p>
      Motor3
    <input type="range" min="0" max="180" value="90" class="slider" id="myRange2" name="myRange2">
    Angle: <span id="demo2" name="demo1"></span>
  </p>
  </div>

  <div class="slidecontainer">
    <p></span>
      Motor4
    <input type="range" min="0" max="180" value="90" class="slider" id="myRange3" name="myRange3">
    Angle: <span id="demo3" name="demo3">
    </p>
  </div>

  <div class="slidecontainer">
    <p>
      Motor5
    <input type="range" min="0" max="180" value="90" class="slider" id="myRange4" name="myRange4">
    Angle: <span id="demo4" name="demo4" ></span>
  </p>
  </div>

  <div class="slidecontainer">
    <p>
      Motor6
    <input type="range" min="0" max="180" value="90" class="slider" id="myRange5" name="myRange5">
    Angle: <span id="demo5" name="demo5" ></span>
    </p>
  </div>
</br>
  <input class="button button" type="submit" name="submit1" value="Save">
  <input class="button button" type="submit" name="submit2" value="Run">
  <input class="button button" type="reset" name="submit3" value="Reset">
</form>
</div>
</center>

<!-----------------------------END HTML----------------------------->


<!-----------------------------START JS----------------------------->

<script>
var slider = document.getElementById("myRange");
var slider1 = document.getElementById("myRange1");
var slider2 = document.getElementById("myRange2");
var slider3 = document.getElementById("myRange3");
var slider4 = document.getElementById("myRange4");
var slider5 = document.getElementById("myRange5");

var output = document.getElementById("demo");
var output1 = document.getElementById("demo1");
var output2 = document.getElementById("demo2");
var output3 = document.getElementById("demo3");
var output4 = document.getElementById("demo4");
var output5 = document.getElementById("demo5");

output.innerHTML = slider.value;
output1.innerHTML = slider1.value;
output2.innerHTML = slider2.value;
output3.innerHTML = slider3.value;
output4.innerHTML = slider4.value;
output5.innerHTML = slider5.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
slider1.oninput = function() {
  output1.innerHTML = this.value;
}
slider2.oninput = function() {
  output2.innerHTML = this.value;
}
slider3.oninput = function() {
  output3.innerHTML = this.value;
}
slider4.oninput = function() {
  output4.innerHTML = this.value;
}
slider5.oninput = function() {
  output5.innerHTML = this.value;
}
</script>

<!-----------------------------END JS----------------------------->

<!-----------------------------START PHP----------------------------->

<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);

if(isset($_POST['submit1']))
{
  

$sql = " UPDATE motor_angle SET motor1='".$_POST["myRange"]."', motor2='".$_POST["myRange1"]."',
motor3= '".$_POST["myRange2"]."', motor4='".$_POST["myRange3"]."', motor5='".$_POST["myRange4"]."', motor6='".$_POST["myRange5"]."', run = 0 ";

if(mysqli_multi_query($conn, $sql)) {
    echo "<br><center style='color:hsl(202, 95%, 34%);'>Saved successfully<center>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
if(isset($_POST['submit2']))
{
   ?>
   <script type='text/javascript'>
  window.location="run.php";
   </script>
   <?php
   
  }
  


$conn->close();

?>

<!-----------------------------END PHP----------------------------->


</body>
</html>
