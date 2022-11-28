<HTML>
<HEAD>
<title>Modificar Salario</title>
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
					<h1>MODIFICAR SALARIO</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="dni">DNI: </label>
							<select name="dni">
							<?php
								dni();
							?>
							</select><br>
							<label for="sa">SAL_ACTUAL: </label>
							<input type="text" name="sa" value=""><br>
							<label for="sn">SAL_NUEVO: </label>
							<input type="text" name="sn" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables

						$dni = "";
						$sa = "";
						$sn = "";

						//Recojo las variables del formulario

						$dni = $_POST["dni"];
						$sa = $_POST["sa"];
						$sn = $_POST["sn"];
						
						//limpiamos las variables
						
						$dni = test_input($_POST["dni"]);
						$sa = test_input($_POST["sa"]);
						$sn = test_input($_POST["sn"]);
						  
						//Lamamos a la función indicada.
						 
						mysql($dni,$sa,$sn);
						
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
						
						
						function mysql($d,$sa,$sn) {

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
