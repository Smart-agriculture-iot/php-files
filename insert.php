<?php
if(isset($_GET["temperature"]) && isset($_GET["humidity"])&& isset($_GET["soilmoisture"])) {
   $temperature = $_GET["temperature"]; // get temperature value from HTTP GET
   $humidity = $_GET["humidity"]; // get humidity value from HTTP GET
   $soilmoisture = $_GET["soilmoisture"]; // get water value from HTTP GET
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "project";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
   
   $sql = "INSERT INTO sm (humidity,temperature,soilmoisture) VALUES ($temperature,$humidity,$soilmoisture)";
   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $conn->error;
   }
   $conn->close();
} else {
   echo "Humidity,Temperature and soilmoisture are not set";
}
?>