<?php
	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "pedidos";
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch (PDOException $ex) {
		echo $ex->getMessage(); 	 	 	 	 	 	
	}
?>


