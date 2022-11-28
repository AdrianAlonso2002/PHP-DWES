<HTML>
<HEAD>
<title>Cambio Departamento</title>
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
					<h1>CAMBIO DEP</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="dni">DNI: </label>
							<select name="dni">
							<?php
								dni();
							?>
							</select><br>
							<label for="da">DEP_ACTUAL: </label>
							<input type="text" name="da" value="">
							<label for="dn">DEP_NUEVO: </label>
							<select name="dn">
							<?php
								dep();
							?>
							</select>
							<label for="fec">FECHA: </label>
							<input type="text" name="fec" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables

						$dni = "";
						$da = "";
						$dn = "";
						$fec = "";

						//Recojo las variables del formulario

						$dni = $_POST["dni"];
						$da = $_POST["da"];
						$dn = $_POST["dn"];
						$fec = $_POST["fec"];
						
						//limpiamos las variables
						
						$dni = test_input($_POST["dni"]);
						$da = test_input($_POST["da"]);
						$dn = test_input($_POST["dn"]);
						$fec = test_input($_POST["fec"]);
						  
						//Lamamos a la función indicada.
						 
						mysql($dni,$da,$dn,$fec);
						
						}
		
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
						}
						
						function dni(){
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
						
						function dep(){
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
						
						function mysql($d,$da,$dn,$fec) {

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
