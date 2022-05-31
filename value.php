<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>UR project</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
    
    $db = mysqli_connect("localhost","root","","project");
    
    if(!$db)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    ?>
        <tbody>
         <?php
    
    $records = mysqli_query($db,"select temperature,humidity,soilmoisture from sm  Order by id DESC LIMIT 1"); // fetch data from database
	//"select temperature,humidity,soilmoisture from sm Order by id DESC; 
    
    while($data = mysqli_fetch_array($records))
    {
    ?>
      
	  <div class="container">
	 <div id="Container">
        
        <div class="Card" id="Card1">
            <div class="CardName">Temperature</div>
            <div class="CardValue" id="Temp"><?php echo $data['temperature'];?>C</div>
        </div>
		 <div class="Card" id="Card2">
            <div class="CardName">Humidity</div>
            <div class="CardValue" id="Humidity"><?php echo $data['humidity'];?>%</div>
        </div>
		 <div class="Card" id="Card1">
            <div class="CardName">Soil Moisture</div>
            <div class="CardValue" id="Soilmoisture"><?php echo $data['soilmoisture'];?></div>
        </div>
		</div>
    <?php
 }
    ?>
    <?php mysqli_close($db); ?>
    </body>
    </html>