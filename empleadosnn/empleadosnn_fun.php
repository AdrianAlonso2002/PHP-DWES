<?php
  /* Nombre Alumno: Adrián Alonso Sánchez */
	
//Limpia las variables.
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//Alta DEP

function mysqlad($cod,$nomb) {
													
	/*Inserción en tabla Prepared Statement- mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO dep (cod_dep,nombre) VALUES (:cod_dep,:nombre)");
		$stmt->bindParam(':cod_dep', $cod_dep);
		$stmt->bindParam(':nombre', $nombre);
  
		// insert a row
		$cod_dep = $cod;
		$nombre = $nomb;
		$stmt->execute();

		echo "Creado el departamento satisfactoriamente";
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
	$conn = null;	
}

function errores($cod,$nomb){
	
	$error = false;
	$cCod = 0;
							
	if ($cod == "") {
		echo "Tienes que añadir un código de departamento."."<br>";
		$error = true;
	}else {
		$cCod=strlen($cod);
		if ($cCod > 4 || $cCod < 0) {
			echo "La longitud de carácteres del código de departamento es incorrecto."."<br>";
			$error = true;
		}else{
			$depad = depad();
			for ($i=0; $i <= count($depad)-1; $i++){
				if ($cod == $depad[$i]){
					echo "El código de departamento ya existe."."<br>";
					$error = true;
				}
			}
		}
	}
	
	$c1 = substr($cod,0,1);
	$c2 = substr($cod,1,1);
	$c3 = substr($cod,2,1);
	$c4 = substr($cod,3,1);
	$c = false;
	
	if ($c1 != "D"){
		$c = true;
		$error = true;
	}
	
	if ($c2 >= '0' && $c2 <= '9') {
	}else {
		$c = true;
		$error = true;
	}
	if ($c3 >= '0' && $c3 <= '9'){
	}else {
		$c = true;
		$error = true;
	}
	if ($c4 >= '0' && $c4 <= '9'){
	}else {
		$c = true;
		$error = true;
	}
	
	if ($c == true){
		echo "El código de departamento después de la D tienen que ser números."."<br>";
	}
	
	if ($nomb == "") {
		echo "Tienes que añadir un nombre de departamento."."<br>";
		$error = true;
	}else{
			$nombad = nombad();
			for ($i=0; $i <= count($nombad)-1; $i++){
				if ($nomb == $nombad[$i]){
					echo "El nombre de departamento ya existe."."<br>";
					$error = true;
				}
			}
	}

	return $error;
							
}

function depad(){
	/*SELECTs - mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT cod_dep FROM dep");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$depad = [];
		$cont = 0;
		foreach($stmt->fetchAll() as $row) {
			$depad[$cont] = $row["cod_dep"];
			$cont++;
		}
		return $depad;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

function nombad(){
	/*SELECTs - mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT nombre FROM dep");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$nombad = [];
		$cont = 0;
		foreach($stmt->fetchAll() as $row) {
			$nombad[$cont] = $row["nombre"];
			$cont++;
		}
		return $nombad;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}


						



?>
