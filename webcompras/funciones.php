<?php
		
//Optimizar código:
		
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}	
				
//Returns a new PDO connection
function connecttoDB(){
	
	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "comprasweb";
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}				
			
//comaltacat
function mysqladc($id,$nomb) {
													
	/*Inserción en tabla Prepared Statement- mysql PDO*/

	try {
		$conn = connecttoDB();

		// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO categoria (id_categoria,nombre) VALUES (:id_categoria,:nombre)");
		$stmt->bindParam(':id_categoria', $id_categoria);
		$stmt->bindParam(':nombre', $nombre);
  
		// insert a row
		$id_categoria = $id;
		$nombre = $nomb;
		$stmt->execute();

		echo "Alta de categoria creada satisfactoriamente";
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
	$conn = null;	
}			

function erroradc($id,$nomb){
	
	$error = false;
	
	if ($nomb == "") {
		echo "Tienes que añadir un nombre de categoría."."<br>";
		$error = true;
	}else{
		$nombadc = nombadc();
		for ($i=0; $i <= count($nombadc)-1; $i++){
			if ($nomb == $nombadc[$i]){
				echo "El nombre de categoría ya existe."."<br>";
				$error = true;
			}
		}
	}
							
	if ($id == "") {
		echo "No se ha añadido correctamente la id"."<br>";
		$error = true;
	}
							
	return $error;
							
}

function nombadc(){
	/*SELECTs - mysql PDO*/

	try {
		$conn = connecttoDB();
								
		$stmt = $conn->prepare("SELECT nombre FROM categoria");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$nombadc = [];
		$cont = 0;
		foreach($stmt->fetchAll() as $row) {
			$nombadc[$cont] = $row["nombre"];
			$cont++;
		}
		return $nombadc;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
						
function idadc(){
	/*SELECTs - mysql PDO*/

	try {
		$conn = connecttoDB();
								
		$stmt = $conn->prepare("SELECT id_categoria FROM categoria");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$idadc = 0;
		$cont = 0;
		$id = "";
		foreach($stmt->fetchAll() as $row) {
			$cont++;
		}
								
		if ($cont>998){
			echo "Se ha superado el número máximo de categorías '999'.";
		}else{
			if ($cont == 0){
				$idadc = 1;
			}else{
				$idadc = $cont+1;
			}	
			$idadc = str_pad($idadc, 3, "0", STR_PAD_LEFT);
			$id = "C-".$idadc;
									
			return $id;
								
		}
									
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
						
//comaltapro

function mysqladp($idpro,$nompro,$pre,$idcat) {
													
	/*Inserción en tabla Prepared Statement- mysql PDO*/

	try {
		$conn = connecttoDB();

		// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES (:id_producto,:nombre,:precio,:id_categoria)");
		$stmt->bindParam(':id_producto', $id_producto);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':precio', $precio);
		$stmt->bindParam(':id_categoria', $id_categoria);
  
		// insert a row
		$id_producto = $idpro;
		$nombre = $nompro;
		$precio = $pre;
		$id_categoria = $idcat;
		$stmt->execute();

		echo "Alta de producto creado satisfactoriamente";
		}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
	$conn = null;	
}

function mostrarnomcat(){
							/*SELECTs - mysql PDO*/

							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT nombre FROM categoria");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								foreach($stmt->fetchAll() as $row) {
									echo "<option>".$row["nombre"]."</option>"."<br>";
								}
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
							
						}
							
function idcatadp($nomcat){
							
							/*SELECTs - mysql PDO*/

							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT id_categoria FROM categoria WHERE nombre = '$nomcat' ");
								$stmt->execute();
  
								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								foreach($stmt->fetchAll() as $row) {
									$idcat = $row["id_categoria"];
								}
								
								return $idcat;
									
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
						}
	
function erroradp($idpro,$nomb,$pre){
	
							$error = false;
							
							if ($idpro == "") {
								echo "No se ha creado el id de producto correctamente."."<br>";
								$error = true;
							}
	
							if ($nomb == "") {
								echo "Tienes que añadir un nombre de categoría."."<br>";
								$error = true;
							}else{
								$nombadp = nombadp();
								for ($i=0; $i <= count($nombadp)-1; $i++){
									if ($nomb == $nombadp[$i]){
										echo "El nombre de categoría ya existe."."<br>";
										$error = true;
									}
								}
							}
							
							$testpre1 = "/^[0-9]*$/";
							$testpre2 = "/^[0-9]+[.]{1}[0-9]{2}$/";
							
							if ($pre == "") {
								echo "Tienes que añadir un precio"."<br>";
								$error = true;
							}else{
								if (preg_match_all($testpre1,$pre)) {
									$valido = true;
								}else {
									if (preg_match_all($testpre2,$pre)) {
										$valido = true;
									}else {
										$valido = false;
									}
								}
							}
		
							if ($valido == false){
								echo "El precio es erroneo, no está bien escrito."."<br>";
								$error = true;
							}
							
							return $error;
							
						}	

function nombadp(){
							/*SELECTs - mysql PDO*/


							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT nombre FROM producto");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								$nombadc = [];
								$cont = 0;
								foreach($stmt->fetchAll() as $row) {
									$nombadc[$cont] = $row["nombre"];
									$cont++;
								}
								return $nombadc;
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
						}

function idproadp(){
							
							/*SELECTs - mysql PDO*/

							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT id_producto FROM producto");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								$idproadp = 0;
								$cont = 0;
								$idpro = "";
								foreach($stmt->fetchAll() as $row) {
									$cont++;
								}
								
								if ($cont>9998){
									echo "Se ha superado el número máximo de categorías '9999'.";
								}else{
									if ($cont == 0){
										$idproadp = 1;
									}else{
										$idproadp = $cont+1;
									}	
									$idproadp = str_pad($idproadp, 4, "0", STR_PAD_LEFT);
									$idpro = "P".$idproadp;
									
								return $idpro;
								
								}
									
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
						}

//comaltaalm

function mysqlada($loc,$numalm) {
	
													
							/*Inserción en tabla Prepared Statement- mysql PDO*/

							try {
								$conn = connecttoDB();

								// prepare sql and bind parameters
								$stmt = $conn->prepare("INSERT INTO almacen (localidad,num_almacen) VALUES (:localidad,:num_almacen)");
								$stmt->bindParam(':localidad', $localidad);
								$stmt->bindParam(':num_almacen', $num_almacen);
  
								// insert a row
								$localidad = $loc;
								$num_almacen = $numalm;
								$stmt->execute();

								echo "Alta de almacenes creado satisfactoriamente";
							}
							catch(PDOException $e)
							{
								echo "Error: " . $e->getMessage();
							}
							$conn = null;	
						}

function numalmada(){
							
							/*SELECTs - mysql PDO*/

							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT num_almacen FROM almacen");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								$numalmada = 0;
								$cont = 0;
								$numalm = "";
								foreach($stmt->fetchAll() as $row) {
									$cont++;
								}
						
								if ($cont == 0){
									$numalm = 1;
								}else{
									$numalm = $cont+1;
								}	
									
								return $numalm;
								
								
									
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
						}
					
function errorada($loc){
	
	$error = false;
							
	if ($loc == "") {
		echo "Tienes que añadir una localidad."."<br>";
		$error = true;
	}else{
		$locada = locada();
		for ($i=0; $i <= count($locada)-1; $i++){
			if ($loc == $locada[$i]){
				echo "La localidad ya existe."."<br>";
				$error = true;
			}
		}
	}
	return $error;
}					

function locada(){
	/*SELECTs - mysql PDO*/

	try {
		$conn = connecttoDB();
		
		$stmt = $conn->prepare("SELECT localidad FROM almacen");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$locada = [];
		$cont = 0;
		foreach($stmt->fetchAll() as $row) {
			$locada[$cont] = $row["localidad"];
			$cont++;
		}
		return $locada;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

//comaprpro	

function mysqlap($canpro,$idpro,$numalm) {
													
							/*Inserción en tabla Prepared Statement- mysql PDO*/
							
							try {
								
								$vacio=true;
								
								$conn = connecttoDB();

								// prepare sql and bind parameters
								
								$stmt = $conn->prepare("SELECT id_producto,num_almacen FROM almacena");
								$stmt->execute();
								
								$res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								$res = $stmt->fetchAll();
								
								foreach($res as $row) {
									if($row["num_almacen"]==$numalm && $row["id_producto"]==$idpro){
										$stmt = $conn->prepare("UPDATE almacena SET cantidad = cantidad+'$canpro' WHERE
										id_producto = '$idpro' AND num_almacen = '$numalm';");
										
										$stmt->bindParam(':canpro', $cantidad);
										$stmt->bindParam(':idpro', $id_producto);
										$stmt->bindParam(':numalm', $num_almacen);
										$stmt->execute();
								
										$vacio=false;
										
										echo "Aprovisionamiento de los productos creado satisfactoriamente";
									}
								}
								
								if ($vacio==true){
									$stmt = $conn->prepare("INSERT INTO almacena (cantidad,id_producto,num_almacen)
									VALUES (:cantidad,:id_producto,:num_almacen)");
									$stmt->bindParam(':cantidad', $cantidad);
									$stmt->bindParam(':id_producto', $id_producto);
									$stmt->bindParam(':num_almacen', $num_almacen);
								
									// insert a row
									$cantidad = $canpro;
									$id_producto = $idpro;
									$num_almacen = $numalm;
									$stmt->execute();
								
									echo "Aprovisionamiento de los productos creado satisfactoriamente";
								}
								
								
								
							}
							catch(PDOException $e)
							{
								echo "Error: " . $e->getMessage();
							}
							$conn = null;	
						}				

function mostrarnompro(){
							/*SELECTs - mysql PDO*/

							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT nombre FROM producto");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								foreach($stmt->fetchAll() as $row) {
									echo "<option>".$row["nombre"]."</option>"."<br>";
								}
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
							
						}

function mostrarnumalm(){
							/*SELECTs - mysql PDO*/

							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT num_almacen FROM almacen");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								foreach($stmt->fetchAll() as $row) {
									echo "<option>".$row["num_almacen"]."</option>"."<br>";
								}
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
							
						}
						
function idproap($nompro){
							
							/*SELECTs - mysql PDO*/

							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT id_producto FROM producto WHERE nombre = '$nompro' ");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								foreach($stmt->fetchAll() as $row) {
									$idpro = $row["id_producto"];
								}
					
								return $idpro;
									
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
						}

function errorap($canpro,$nompro,$numalm){
							
							$valido = true;
							$error = false;
							
							$testcanpro = "/^[0-9]*$/";
							
							if ($canpro == "") {
								echo "No se ha añadido una cantidad."."<br>";
								$error = true;
							}else{
								if (preg_match_all($testcanpro,$canpro)) {
									$valido = true;
								}else {
									$valido = false;
								}
							}
							
							if ($valido == false){
								echo "La cantidad da error, no está bien escrito."."<br>";
								$error = true;
							}
	
							if ($numalm == "") {
								echo "No se ha añadido el nombre de el almacén correctamente."."<br>";
								$error = true;
							}
							
							if ($nompro == "") {
								echo "No se ha añadido el número de producto correctamente."."<br>";
								$error = true;
							}
							
							return $error;
							
						}

function mostrarloc(){
							/*SELECTs - mysql PDO*/

							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT localidad FROM almacen");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								foreach($stmt->fetchAll() as $row) {
									echo "<option>".$row["localidad"]."</option>"."<br>";
								}
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
							
						}

function numaprloc($loc){
							
	/*SELECTs - mysql PDO*/

	try {
	$conn = connecttoDB();
								
	$stmt = $conn->prepare("SELECT num_almacen FROM almacen WHERE localidad = '$loc' ");
	$stmt->execute();
  
	$res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	foreach($stmt->fetchAll() as $row) {
		$numalm = $row["num_almacen"];
	}
								
	return $numalm;
									
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}					

//comconstock

function mysqlcds($id,$nomb) {											

	/*Inserción en tabla Prepared Statement- mysql PDO*/

	try {

		$conn = connecttoDB();

		// prepare sql and bind parameters

		$stmt = $conn->prepare("SELECT cantidad,localidad FROM almacen,almacena
		WHERE almacen.num_almacen=almacena.num_almacen AND id_producto = '$id' ");

		$stmt->bindParam(':id_categoria', $id_categoria);

		$stmt->execute();

		$res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$res = $stmt->fetchAll();
		if(empty($res)){
			echo "Este producto no tiene stock en ningún almacén"."<br>";
		}
		else{
			echo "El producto ".$nomb." con id ".$id.  " está en: "."</br>";
			foreach($res as $dat){
				echo "Almacen localizado en " .$dat["localidad"]. " con una catindad de ".$dat["cantidad"]. " unidades. "."<br>";
			}
		}

		echo "Consulta de Stock hecha satisfactoriamente.";

	}

	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}

	$conn = null;	

}		

//comconsalm

function mysqlcda($loc) {											

	/*Inserción en tabla Prepared Statement- mysql PDO*/

	try {
		
		$numalm = numaprloc($loc);
		
		$conn = connecttoDB();
		// prepare sql and bind parameters

		$stmt = $conn->prepare("SELECT nombre, cantidad FROM producto, almacena WHERE producto.id_producto = almacena.id_producto AND num_almacen = $numalm");
		$stmt->execute();
		
		$res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$res = $stmt->fetchAll();
		if(empty($res)){
			echo "Este almacén no tiene ningún producto almacenado"."<br>";
		}
		else{
			echo "El almacen localizado en ".$loc." contiene: "."</br>";
			foreach($res as $dat){
				echo "Producto ".$dat["nombre"]." con una catindad de ".$dat["cantidad"]. " unidades. "."<br>";
			}
		}

		echo "Consulta de Almacen hecha satisfactoriamente.";

	}

	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}

	$conn = null;	

}		
							
//comconscom
					
function mysqlcdc($nif,$feci,$fecf ) {											

	/*Inserción en tabla Prepared Statement- mysql PDO*/

	try {
		
		$conn = connecttoDB();
		// prepare sql and bind parameters
		
		$stmt = $conn->prepare("SELECT nombre, precio, unidades FROM compra, producto
			WHERE producto.id_producto=compra.id_producto
			AND compra.nif='$nif' AND fecha_compra <= '$fecf'
			AND fecha_compra >= '$feci' ");
		
		$stmt->execute();
		
		$res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$res = $stmt->fetchAll();
		if(empty($res)){
			echo "Esta persona no ha comprado nada en esas fechas"."<br>";
		}
		else{
			echo "El cliente con NIF: ".$nif." ha comprado estos productos: "."</br>";
			foreach($res as $dat){
				$precio = $dat["precio"];
				$unidades = $dat["unidades"];
				$total = $precio*$unidades;
				echo "Ha comprado ".$dat["unidades"]." unidades de ".$dat["nombre"]." con un precio cada uno de  ".$dat["precio"]. "€ y un total de ".$total."€<br>";
			}
		}

		echo "Consulta de Compras hecha satisfactoriamente.";

	}

	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}

	$conn = null;	

}		
					
function mostrarnif(){
							/*SELECTs - mysql PDO*/

							try {
								$conn = connecttoDB();
								
								$stmt = $conn->prepare("SELECT nif FROM cliente");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								foreach($stmt->fetchAll() as $row) {
									echo "<option>".$row["nif"]."</option>"."<br>";
								}
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
							
						}		
		
//comaltacli

function mysqlacli($nif,$nomb,$ape,$cp,$dir,$ciu) {
													
	/*Inserción en tabla Prepared Statement- mysql PDO*/

	try {
		$conn = connecttoDB();

		// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO cliente (NIF,nombre,apellido,CP,direccion,ciudad) VALUES (:NIF,:nombre,:apellido,:CP,:direccion,:ciudad)");
		$stmt->bindParam(':NIF', $dni);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':apellido', $apellido);
		$stmt->bindParam(':CP', $cpostal);
		$stmt->bindParam(':direccion', $direccion);
		$stmt->bindParam(':ciudad', $ciudad);
  
		// insert a row
		$dni = $nif;
		$nombre = $nomb;
		$apellido = $ape;
		$cpostal = $cp;
		$direccion = $dir;
		$ciudad = $ciu;
		$stmt->execute();

		echo "Alta de cliente creado satisfactoriamente";
		}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
	$conn = null;	
}

function erroracli($nif,$nomb,$ape,$cp,$dir,$ciu){
	
	$error = false;
	$valido = true;
							
	$testnif1 = "/^([0-9]{8})+[A-Z]{1}$/";
	$testnif2 = "/^[XYZLKM]{1}[0-9]{7}A-Z]{1}$/";
							
	if ($nif == "") {
		echo "Tienes que añadir un NIF"."<br>";
		$error = true;
	}else{
		if (preg_match_all($testnif1,$nif)) {
			$valido = true;
		}else {
			if (preg_match_all($testnif2,$nif)) {
				$valido = true;
			}else {
				$valido = false;
			}
		}
	}
	
	if ($valido == false){
		echo "El NIF es erróneo."."<br>";
		$error = true;
	}else{
		$compnif = compnif();
		for ($i=0; $i <= count($compnif)-1; $i++){
			if ($nif == $compnif[$i]){
				echo "El NIF ya ha sido de alta."."<br>";
				$error = true;
			}
		}
	}
	
	if ($nomb == "") {
		echo "Tienes que añadir un nombre."."<br>";
		$error = true;
	}
	
	if ($ape == "") {
		echo "Tienes que añadir un apellido."."<br>";
		$error = true;
	}
	
	if ($cp == "") {
		echo "Tienes que añadir un código postal."."<br>";
		$error = true;
	}
	
	if ($dir == "") {
		echo "Tienes que añadir una direccion."."<br>";
		$error = true;
	}
	
	if ($ciu == "") {
		echo "Tienes que añadir una ciudad."."<br>";
		$error = true;
	}
							
							
	return $error;
							
}	

function compnif(){
	/*SELECTs - mysql PDO*/

	try {
		$conn = connecttoDB();
								
		$stmt = $conn->prepare("SELECT NIF FROM cliente");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$compnif = [];
		$cont = 0;
		foreach($stmt->fetchAll() as $row) {
			$compnif[$cont] = $row["NIF"];
			$cont++;
		}
		return $compnif;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
		$conn = null;
	}

//compro

function mysqlcpro($nif,$prod,$cant,$numalm) {
													
	/*Inserción en tabla Prepared Statement- mysql PDO*/
	
	try {
		$conn = connecttoDB();

		// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO compra (NIF,id_producto,fecha_compra,unidades) VALUES (:NIF,:id_producto,:fecha_compra,:unidades)");
		$stmt->bindParam(':NIF', $dni);
		$stmt->bindParam(':id_producto', $id);
		$stmt->bindParam(':fecha_compra', $fecc);
		$stmt->bindParam(':unidades', $ud);
  
		//Para saber la fecha de la compra
		$fec = date('y/m/d') ;
  
		// insert a row
		$dni = $nif;
		$id = $prod;
		$fecc = $fec;
		$ud = $cant;
		$stmt->execute();
		
		$stmt = $conn->prepare("UPDATE almacena SET cantidad = cantidad-'$cant' WHERE
			id_producto = '$prod' AND num_almacen = '$numalm' ");
										
		$stmt->bindParam('$cant', $cantidad);
		$stmt->bindParam('$prod', $id_producto);
		$stmt->bindParam('$numalm', $num_almacen);
		$stmt->execute();

		echo "Los productos han sido comprados correctamente.";
		}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
	$conn = null;	
}

function errorcpro($cant){
	
	$error = false;
	$valido = true;
							
	$testcant = "/^[0-9]*$/";
							
	if ($cant == "") {
		echo "Tienes que añadir cuantos unidades del producto quieres"."<br>";
		$error = true;
	}else{
		if (preg_match_all($testcant,$cant)) {
			$valido = true;
		}else{
			$valido = false;
		}
	}

	if ($valido == false){
		echo "Las unidades de un producto tienen que ser un número entero."."<br>";
		$error = true;
	}
			
	return $error;
							
}	

function compprocant($prod,$cant){
	/*SELECTs - mysql PDO*/

	$disp = 0;

	try {
		$conn = connecttoDB();
								
		$stmt = $conn->prepare("SELECT cantidad FROM producto, almacena WHERE nombre = '$prod' 
			AND almacena.id_producto=producto.id_producto");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$res = $stmt->fetchAll();
		
		foreach($res as $dat){
		$uddisp = $dat["cantidad"];
		}
		
		if ($uddisp == 0){
			$disp = 1;
		}else{
			if ($uddisp >= $cant) {
			$disp = 2;
			}
		}
		return $disp;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
		$conn = null;
}

function cnumalm($prod,$cant) {
	/*SELECTs - mysql PDO*/

	$disp = 0;
	$numalm = "";

	try {
		$conn = connecttoDB();
								
		$stmt = $conn->prepare("SELECT num_almacen FROM producto, almacena WHERE nombre = '$prod' 
			AND almacena.id_producto=producto.id_producto 
			AND cantidad >= '$cant' ");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$res = $stmt->fetchAll();
		
		$cont = 0;
		foreach($res as $row) {
			if ($cont == 0) {
			$numalm = $row["numalm"];
			$cont++;
			}
		}
		
		return $numalm;
		
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
		$conn = null;
	}

?>