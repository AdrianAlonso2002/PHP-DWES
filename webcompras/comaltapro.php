<HTML>
<HEAD>
<title>Alta de Productos</title>
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
					<h1>Alta de Productos</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<select name="idcat">
							<?php
								mostraridcat();
							?>
							</select><br>
							<label for="nomb">Nombre: </label>
							<input type="text" name="nomb" value=""><br>
							<label for="pre">Precio: </label>
							<input type="text" name="pre" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$idcat = "";
						$nomb = "";
						$pre = "";
						$idpro = "";

						//Recojo las variables del formulario

						$idcat = $_POST["idcat"];
						$nomb = $_POST["nomb"];
						$pre = $_POST["pre"];
						
						//limpiamos las variables
						
						$idcat = test_input($_POST["idcat"]);
						$nomb = test_input($_POST["nomb"]);
						$pre = test_input($_POST["pre"]);
						
						$idpro = idproap();
						$error = errorap($idpro,$nomb,$pre);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else
						  
						//Lamamos a la función indicada.
						 
						mysqladp($idpro,$nomb,$pre,$idcat);
						
						}
						
						//Funciones
						
						function test_input($data) {							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
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
							
							$testpre1 = "/^[0-9]+[0-9]$/";
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
								echo "El salario es erroneo, no está bien escrito."."<br>";
								$error = true;
							}
							
							return $error;
							
						}
						
						function mysqladp($idpro,$nomb,$pre,$idcat) {
													
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
								$stmt = $conn->prepare("INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES (:id_producto,:nombre,:precio,:id_categoria)");
								$stmt->bindParam(':id_producto', $id_producto);
								$stmt->bindParam(':nombre', $nombre);
								$stmt->bindParam(':precio', $precio);
								$stmt->bindParam(':id_categoria', $id_categoria);
  
								// insert a row
								$id_producto = $idpro;
								$nombre = $nomb;
								$precio = $pre;
								$id_categoria = $idcat;
								$stmt->execute();

								echo "Alta deproducto creado satisfactoriamente";
							}
							catch(PDOException $e)
							{
								echo "Error: " . $e->getMessage();
							}
							$conn = null;	
						}
						
						function nombap(){
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

						function idproap(){
							
							/*SELECTs - mysql PDO*/

							$servername = "localhost";
							$username = "root";
							$password = "rootroot";
							$dbname = "comprasweb";

							try {
								$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
						
						function mostraridcat(){
							/*SELECTs - mysql PDO*/

							$servername = "localhost";
							$username = "root";
							$password = "rootroot";
							$dbname = "comprasweb";

							try {
								$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$stmt = $conn->prepare("SELECT id_categoria FROM categoria");
								$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								foreach($stmt->fetchAll() as $row) {
									echo "<option>".$row["id_categoria"]."</option>"."<br>";
								}
							}
							catch(PDOException $e) {
								echo "Error: " . $e->getMessage();
							}
							$conn = null;
							
						}
						
						function errorap($idpro,$nomb,$pre){
	
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
							
							$testpre1 = "/^[0-9]+[0-9]$/";
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
								echo "El salario es erroneo, no está bien escrito."."<br>";
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
