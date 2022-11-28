<HTML>
<HEAD>
<title>Alta empleado</title>
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
					<h1>ALTA EMPLE</h1>
					<div>	
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="dni">DNI: </label>
							<input type="text" name="dni" value=""><br>
							<label for="nomb">NOMBRE: </label>
							<input type="text" name="nomb" value=""><br>
							<label for="sal">SALARIO: </label>
							<input type="text" name="sal" value=""><br>
							<label for="fec">FECHA DE NACIMIENTO: </label>
							<input type="text" name="fec" value=""><br>
							<label for="dep">CÓDIGO DE DEPARTAMENTO: </label>
							<select name="dep">
							<?php
								dep();
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

						$dni = "";
						$nomb = "";
						$sal = "";
						$fec = "";
						$dep = "";

						//Recojo las variables del formulario

						$dni = $_POST["dni"];
						$nomb = $_POST["nomb"];
						$sal = $_POST["sal"];
						$fec = $_POST["fec"];
						$dep = $_POST["dep"];
						
						
						//limpiamos las variables
						
						$dni = test_input($_POST["dni"]);
						$nomb = test_input($_POST["nomb"]);
						$sal = test_input($_POST["sal"]);
						$fec = test_input($_POST["fec"]);
						$dep = test_input($_POST["dep"]);
						  
						//Lamamos a la función indicada.
						 
						mysql($dni,$nomb,$sal,$fec,$dep);
						
						}
		
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
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
						
						function mysql($d,$nomb,$sal,$fec,$dep) {
							
							
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
