<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'espacioPatino');
   define('DB_PASSWORD', 'ESIP*2019');
   define('DB_NAME', 'espacioPatino');

/*
	$servername = "localhost";
	$username = "espacioPatino";
	$password = "ESIP*2019";
	$db = 'espacioPatino';
	*/

try {
 	$conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
   // Set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "<script>console.log('Connected successfully')</script>"; 
   }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }

   date_default_timezone_set( "America/La_Paz" );
?>