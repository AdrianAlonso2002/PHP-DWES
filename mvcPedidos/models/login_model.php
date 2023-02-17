<?php

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function errorrdc($usu,$clv){
	
	$error = true;
	$usuv = false;
	$clvv = false;
	$userpl = userpl();
	$clvpl = clvpl();
							
	if ($usu == "") {
		echo "Tienes que añadir tu nombre como usuario(customerNumber)"."<br>";
		$error = true;
	}else{
		if ($clv == "") {
			echo "Tienes que añadir tu clave (contactLastName)."."<br>";
			$error = true;
		}else{
			for ($i=0; $i <= count($userpl)-1; $i++){
			if ($usu == $userpl[$i]){
				$usuv = true;
			}
		}
		}
	}
	
	if ($usuv == true) {
		for ($i=0; $i <= count($clvpl)-1; $i++){
			if ($clv == $clvpl[$i]){
				echo "La clave es correcta."."<br>";
				$error = false;
				$clvv = true;
			}
		}
	}else{
		echo "Usuario erróneo."."<br>";
		$error = true;
	}
	
	if ($clvv == false){
		echo "Clave no válida."."<br>";
	}
				
	return $error;
							
}

function userpl(){
	/*SELECTs - mysql PDO*/

	try {
		global $conn;
								
		$stmt = $conn->prepare("SELECT customerNumber FROM customers");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$userpl = [];
		$cont = 0;
		foreach($stmt->fetchAll() as $row) {
			$userpl[$cont] = $row["customerNumber"];
			$cont++;
		}
		return $userpl;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

function clvpl(){
	/*SELECTs - mysql PDO*/

	try {
		global $conn;
								
		$stmt = $conn->prepare("SELECT contactLastName FROM customers");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$clvpl = [];
		$cont = 0;
		foreach($stmt->fetchAll() as $row) {
			$clvpl[$cont] = ($row["contactLastName"]);
			$cont++;
		}
		return $clvpl;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

?>