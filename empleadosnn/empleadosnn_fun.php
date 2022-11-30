<?php
  /* Nombre Alumno: Adrián Alonso Sánchez */
	
//Limpia las variables.
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//ALTA DEPARTAMENTO

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

function errorad($cod,$nomb){
	
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

//ALTA EMPLEADO

function mostrardepae(){
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
		foreach($stmt->fetchAll() as $row) {
			echo "<option>".$row["cod_dep"]."</option>"."<br>";
		}
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
						
function mysqlae($d,$nomb,$sal,$fec,$dep) {
								
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
		$stmt = $conn->prepare("INSERT INTO emple (dni,nombre,salario,fec_nac,cod_dep) VALUES (:dni,:nombre,:salario,:fec_nac,:cod_dep)");
		$stmt->bindParam(':dni', $dni);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':salario', $salario);
		$stmt->bindParam(':fec_nac', $fec_nac);
		$stmt->bindParam(':cod_dep', $cod_dep);
  
		// insert a row
		$dni = $d;
		$nombre = $nomb;
		$salario = $sal;
		$fec_nac = $fec;
		$cod_dep = $dep;
		$stmt->execute();

		// insert another row

		echo "Creado el empleado satisfactoriamente";
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
	$conn = null;	
}

function errorae($dni,$nomb,$sal,$fec,$dep){
	
	$error = false;
	$cDni = 0;
	$testdni = "/^[0-9]+[A-Z]{1}/";
					
	//dni
						
	if ($dni == "") {
		echo "Tienes que añadir un dni de empleado."."<br>";
		$error = true;
	}else {
		$cDni=strlen($dni);
		if ($cDni != 9) {
			echo "La longitud de carácteres del dni del empleado es incorrecto."."<br>";
			$error = true;
		}else{
			$dniae = dniae();
			for ($i=0; $i <= count($dniae)-1; $i++){
				if ($dni == $dniae[$i]){
					echo "El dni de empleado ya existe."."<br>";
					$error = true;
				}
			}
		}
	}
	 
    if (preg_match_all($testdni,$dni)) {
        $valido = true;
        }else {
            $valido = false;
    }
		
	if ($valido == false){
		echo "El dni es erroneo, no está bien escrito."."<br>";
		$error = true;
	}
	
	if ($nomb == "") {
		echo "Tienes que añadir un nombre de empleado."."<br>";
		$error = true;
	}else{
			$nombae = nombae();
			for ($i=0; $i <= count($nombae)-1; $i++){
				if ($nomb == $nombae[$i]){
					echo "El nombre de empleado ya existe."."<br>";
					$error = true;
				}
			}
	}
	
	$testsal1 = "/^[0-9]+[0-9]/";
	$testsal2 = "/^0-9]+[.0-9]{1}[0-9]{2}/";
	
	if ($sal == "") {
		echo "Tienes que añadir un salario."."<br>";
		$error = true;
	}else{
		if (preg_match_all($testsal1,$sal)) {
        $valido = true;
        }else {
			if (preg_match_all($testsal2,$sal)) {
				$valido = true;
			}else {
				$valido = false;
			}
		}
	}
		
	if ($valido == false){
		echo "El salario es erroneo, no está bien escrito."."<br>";
		$error = true;
	}
		
	$testfec = "/^[0-9]{4}[-]{1}[0-9]{2}[-]{1}[0-9]{2}/";
	
	if ($fec == "") {
		echo "Tienes que añadir una fecha."."<br>";
		$error = true;
	}else{
		if (preg_match_all($testfec,$fec)) {
        $valido = true;
        }else {
			$valido = false;
		}
	}
	
	if ($valido == false){
		echo "La fecha es erronea, se tiene que escribir asi: XXXX-XX-XX"."<br>";
		$error = true;
	}
	
	$a1 = substr($fec,0,1);
	$a2 = substr($fec,1,1);
	$a3 = substr($fec,2,1);
	$a4 = substr($fec,3,1);
	
	$m1 = substr($fec,5,1);
	$m2 = substr($fec,6,1);
	
	$d1 = substr($fec,8,1);
	$d2 = substr($fec,9,1);
	
	$f = false;
	
	$a = "$a1"."$a2"."$a3"."$a4";
	$m = "$m1"."$m2";
	$d = "$d1"."$d2";
	
	if ($a > "2100" || $a < "1930"){
		echo "El año de la fecha es incorrecto."."<br>";
		$f = true;
	}
	if ($m > "12" || $m < "1"){
		echo "El mes de la fecha es incorrecto."."<br>";
		$f = true;
	}
	
	if ($m == "01" || $m == "03" || $m == "05" || $m == "07" || $m == "08" || $m == "10" || $m == "12") {
		if ($d > "31" || $d < "1"){
			echo "El día de la fecha es incorrecto."."<br>";
			$f = true;
		}
	}else {
		if ($m == "04" || $m == "06" || $m == "09" || $m == "11") {
			if ($d > "30" || $d < "1"){
				echo "El día de la fecha es incorrecto."."<br>";
				$f = true;
			}
		}else{
			if ($m == "02") {
				if ($d > "29" || $d < "1"){
					echo "El día de la fecha es incorrecto."."<br>";
					$f = true;
				}else {
					if ($d == "29") {
						if ($a % "400" == "0" || ($a % "4" == "0") != ($a % "100" == "0")){
						}else {
							echo "El día de la fecha es incorrecto porque no es un año bisiesto."."<br>";
							$f = true;
						}
					}
				}
			}
		}
	}
	
	if ($f == true){
		$error = true;
	}
	
	if ($dep == "") {
		echo "No hay un departamento seleccionado."."<br>";
		$error = true;
	}
	
	return $error;
							
}

function dniae(){
	/*SELECTs - mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT dni FROM emple");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$depad = [];
		$cont = 0;
		foreach($stmt->fetchAll() as $row) {
			$depad[$cont] = $row["dni"];
			$cont++;
		}
		return $depad;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

function nombae(){
	/*SELECTs - mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT nombre FROM emple");
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

//CAMBIO DEPARTAMENTO

function mostrardnicd(){
	/*SELECTs - mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT dni FROM emple");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		foreach($stmt->fetchAll() as $row) {
			echo "<option>".$row["dni"]."</option>"."<br>";
		}
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
						
function mostrardepcd(){
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
		foreach($stmt->fetchAll() as $row) {
			echo "<option>".$row["cod_dep"]."</option>"."<br>";
		}
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

function mysqlcd($d,$da,$dn,$fec) {

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE emple SET cod_dep = '$dn',fec_nac = '$fec' WHERE dni = '$d'and cod_dep = '$da';");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								
								
		echo "Actualizado $d, de el departamento $da, a el departamento $dn a fecha $fec";

	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;	
}

function errorcd($dni,$da,$dn,$fec){
	
	$error = false;
	$testdep = "/^[D][0-9]{3}/";
	$valido = true;
	$val = false;
					
	//dni
						
	if ($da == "") {
		echo "Tienes que añadir el departamento actual del empleado."."<br>";
		$error = true;
	}else {
		$depcd = depcd($dni);
			if ($da == $depcd){
				$val = true;
			}
	}
	
	if ($val == false){
		echo "El departamento actual no es el del dni del empleado."."<br>";
		$error = true;
	}
	
	 
    if (preg_match_all($testdep,$da)) {
        $valido = true;
        }else {
            $valido = false;
		}
	
		
	if ($valido == false){
		echo "El departamento actual está mal escrito."."<br>";
		$error = true;
	}
		
	$testfec = "/^[0-9]{4}[-]{1}[0-9]{2}[-]{1}[0-9]{2}/";
	
	if ($fec == "") {
		echo "Tienes que añadir una fecha."."<br>";
		$error = true;
	}else{
		if (preg_match_all($testfec,$fec)) {
        $valido = true;
        }else {
			$valido = false;
		}
	}
	
	if ($valido == false){
		echo "La fecha es erronea, se tiene que escribir asi: XXXX-XX-XX"."<br>";
		$error = true;
	}
	
	$a1 = substr($fec,0,1);
	$a2 = substr($fec,1,1);
	$a3 = substr($fec,2,1);
	$a4 = substr($fec,3,1);
	
	$m1 = substr($fec,5,1);
	$m2 = substr($fec,6,1);
	
	$d1 = substr($fec,8,1);
	$d2 = substr($fec,9,1);
	
	$f = false;
	
	$a = "$a1"."$a2"."$a3"."$a4";
	$m = "$m1"."$m2";
	$d = "$d1"."$d2";
	
	if ($a > "2100" || $a < "1930"){
		echo "El año de la fecha es incorrecto."."<br>";
		$f = true;
	}
	if ($m > "12" || $m < "1"){
		echo "El mes de la fecha es incorrecto."."<br>";
		$f = true;
	}
	
	if ($m == "01" || $m == "03" || $m == "05" || $m == "07" || $m == "08" || $m == "10" || $m == "12") {
		if ($d > "31" || $d < "1"){
			echo "El día de la fecha es incorrecto."."<br>";
			$f = true;
		}
	}else {
		if ($m == "04" || $m == "06" || $m == "09" || $m == "11") {
			if ($d > "30" || $d < "1"){
				echo "El día de la fecha es incorrecto."."<br>";
				$f = true;
			}
		}else{
			if ($m == "02") {
				if ($d > "29" || $d < "1"){
					echo "El día de la fecha es incorrecto."."<br>";
					$f = true;
				}else {
					if ($d == "29") {
						if ($a % "400" == "0" || ($a % "4" == "0") != ($a % "100" == "0")){
						}else {
							echo "El día de la fecha es incorrecto porque no es un año bisiesto."."<br>";
							$f = true;
						}
					}
				}
			}
		}
	}
	
	if ($f == true){
		$error = true;
	}
	
	if ($dni == "") {
		echo "No hay dni seleccionado."."<br>";
		$error = true;
	}
	
	if ($dn == "") {
		echo "No hay departamento nuevo seleccionado."."<br>";
		$error = true;
	}
	
	return $error;
							
}	

function depcd($d){
	/*SELECTs - mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT cod_dep FROM emple WHERE dni = '$d'");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$depad = "";
		foreach($stmt->fetchAll() as $row) {
			$depad = $row["cod_dep"];
		}
		return $depad;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
		
//MOSTRAR SALARIO

function mostrardnims(){
	/*SELECTs - mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT dni FROM emple");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		foreach($stmt->fetchAll() as $row) {
			echo "<option>".$row["dni"]."</option>"."<br>";
		}
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

function mysqlms($d,$sa,$sn) {

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE emple SET salario = '$sn' WHERE dni = '$d'and salario = '$sa';");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								
								
		echo "Actualizado $d, su salrio de $sa a $sn";

	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;	
}
	
function errorms($dni,$sa,$sn){
	
	$error = false;
	$valido = true;
	$val = false;
	
	$testsal1 = "/^[0-9]+[0-9]/";
	$testsal2 = "/^0-9]+[.0-9]{1}[0-9]{2}/";
	
	if ($sa == "") {
		echo "Tienes que añadir un salario actual."."<br>";
		$error = true;
	}else{
		$sams = sams($dni);
			if ($sa == $sams){
				$val = true;
			}
	}
	
	if ($val == false){
		echo "El salario actual no es el del dni del empleado."."<br>";
		$error = true;
	}
	
	if (preg_match_all($testsal1,$sa)) {
		$valido = true;
	}else {
		if (preg_match_all($testsal2,$sa)) {
			$valido = true;
		}else {
			$valido = false;
		}
	}
		
	if ($valido == false){
		echo "El salario actual es erroneo, no está bien escrito."."<br>";
		$error = true;
	}
		
	if ($sn == "") {
		echo "Tienes que añadir un salario nuevo."."<br>";
		$error = true;
	}else{
		if (preg_match_all($testsal1,$sn)) {
		$valido = true;
		}else {
			if (preg_match_all($testsal2,$sn)) {
				$valido = true;
			}else {
				$valido = false;
			}
		}
	}
	
	if ($valido == false){
		echo "El salario nuevo es erroneo, no está bien escrito."."<br>";
		$error = true;
	}
	
	if ($dni == "") {
		echo "No hay un dni seleccionado"."<br>";
		$error = true;
	}
	
	return $error;
							
}	

function sams($d){
	/*SELECTs - mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT salario FROM emple WHERE dni = '$d'");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$depad = "";
		foreach($stmt->fetchAll() as $row) {
			$depad = $row["salario"];
		}
		return $depad;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

//LISTADO EMPLEADOS

function mostrardeple(){
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
		foreach($stmt->fetchAll() as $row) {
			echo "<option>".$row["cod_dep"]."</option>"."<br>";
		}
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
		
function listado($d){
	/*SELECTs - mysql PDO*/

	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT nombre FROM emple WHERE cod_dep = '$d'");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		echo "<h2>Listado</h2>"."<br>";
		echo "<ul>";
		foreach($stmt->fetchAll() as $row) {
			echo "<li>".$row["nombre"]."</li><br>";
		}
		echo "</ul>";
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

function errorle($dep) {
	
	$error = false;
						
	if ($dep == "") {
		echo "No hay un departamento seleccionado."."<br>";
		$error = true;
	}
	
	return $error;
	
}
		
		
?>
