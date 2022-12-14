<HTML>
<HEAD>
<title>Aprovisionar Productos</title>
<link rel="stylesheet" href="bootstrap.min.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="author" content="Adrian" />
</HEAD>
<style>
</style>
<BODY>
		<header>
		</header>
		<nav>
		</nav>
		<main>
			<section>
				<article>
					<h1>Aprovisionar Productos</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="canpro">Cantidad de productos(número): </label>
							<input type="text" name="canpro" value=""><br>
							<select id="nompro" name="nompro">
							<?php
								mostrarnompro();
							?>
							</select><br>
							<select id="numalm" name="numalm">
							<?php
								mostrarnumalm();
							?>
							</select><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$canpro = "";
						$nompro = "";
						$numalm = "";
						$idpro = "";

						//Recojo las variables del formulario

						$canpro = $_POST["canpro"];
						$nompro = $_POST["nompro"];
						$numalm  = $_POST["numalm"];
						
						//limpiamos las variables
						
						$canpro = test_input($_POST["canpro"]);
						
						$error = errorap($canpro,$nompro,$numalm);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else
						
						$idpro = idproap($nompro);
					
						//Lamamos a la función indicada.
						 
						mysqlap($canpro,$idpro,$numalm);
						
						}
						
						//Funciones
						
						function test_input($data) {							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
						}
						
						function mysqlap($canpro,$idpro,$numalm) {
													
							/*Inserción en tabla Prepared Statement- mysql PDO*/
	
							$servername = "localhost";
							$username = "root";
							$password = "rootroot";
							$dbname = "comprasweb";

							try {
								$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								// set the PDO error mode to exception
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

								// prepare sql and bind parameters
								$stmt = $conn->prepare("INSERT INTO almacena (cantidad,id_producto,num_almacen) VALUES (:cantidad,:id_producto,:num_almacen)");
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
							catch(PDOException $e)
							{
								echo "Error: " . $e->getMessage();
							}
							$conn = null;	
						}
						
						function mostrarnompro(){
							/*SELECTs - mysql PDO*/

							$servername = "localhost";
							$username = "root";
							$password = "rootroot";
							$dbname = "comprasweb";

							try {
								$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

							$servername = "localhost";
							$username = "root";
							$password = "rootroot";
							$dbname = "comprasweb";

							try {
								$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

							$servername = "localhost";
							$username = "root";
							$password = "rootroot";
							$dbname = "comprasweb";

							try {
								$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$stmt = $conn->prepare("SELECT id_producto FROM producto WHERE nombre = '$nompro' ");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								$idpro = $result;
									
								return $idpro;
									
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
						}
						
						function errorap($canpro,$nompro,$numalm){
	
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
						
						?>
						
					</div>
				</article>
			</section>
		</main>
		<footer>
		</footer>
		<aside>
		</aside>
</BODY>
</HTML>
