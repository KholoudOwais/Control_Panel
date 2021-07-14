<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>un</title>
</head>
<body>
<?php

// Create connection
$conn = new mysqli("localhost","root" ,"kh1997" ,"robot_arm" );
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";

#$conn->close();
?>
</body>
</html>