<HTML>
<HEAD>
<title>Alta de Almacenes</title>
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
					<h1>Alta de Almacenes</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="nomb">Elige una provincia: </label>
							<select id="prov" name="prov">
								<option value="Álava">Álava/Araba</option>
								<option value="Albacete">Albacete</option>
								<option value="Alicante">Alicante</option>
								<option value="Almería">Almería</option>
								<option value="Asturias">Asturias</option>
								<option value="Ávila">Ávila</option>
								<option value="Badajoz">Badajoz</option>
								<option value="Baleares">Baleares</option>
								<option value="Barcelona">Barcelona</option>
								<option value="Burgos">Burgos</option>
								<option value="Cáceres">Cáceres</option>
								<option value="Cádiz">Cádiz</option>
								<option value="Cantabria">Cantabria</option>
								<option value="Castellón">Castellón</option>
								<option value="Ceuta">Ceuta</option>
								<option value="Ciudad Real">Ciudad Real</option>
								<option value="Córdoba">Córdoba</option>
								<option value="Cuenca">Cuenca</option>
								<option value="Girona">Gerona/Girona</option>
								<option value="Granada">Granada</option>
								<option value="Guadalajara">Guadalajara</option>
								<option value="Guipúzcoa">Guipúzcoa/Gipuzkoa</option>
								<option value="Huelva">Huelva</option>
								<option value="Huesca">Huesca</option>
								<option value="Jaén">Jaén</option>
								<option value="A Coruña">La Coruña/A Coruña</option>
								<option value="La Rioja">La Rioja</option>
								<option value="Las Palmas">Las Palmas</option>
								<option value="León">León</option>
								<option value="Lérida/Lleida">Lérida/Lleida</option>
								<option value="Lugo">Lugo</option>
								<option value="Madrid">Madrid</option>
								<option value="Málaga">Málaga</option>
								<option value="Melilla">Melilla</option>
								<option value="Murcia">Murcia</option>
								<option value="Navarra">Navarra</option>
								<option value="Orense">Orense/Ourense</option>
								<option value="Palencia">Palencia</option>
								<option value="Pontevedra">Pontevedra</option>
								<option value="Salamanca">Salamanca</option>
								<option value="Segovia">Segovia</option>
								<option value="Sevilla">Sevilla</option>
								<option value="Soria">Soria</option>
								<option value="Tarragona">Tarragona</option>
								<option value="Tenerife">Tenerife</option>
								<option value="Teruel">Teruel</option>
								<option value="Toledo">Toledo</option>
								<option value="Valencia">Valencia</option>
								<option value="Valladolid">Valladolid</option>
								<option value="Vizcaya">Vizcaya/Bizkaia</option>
								<option value="Zamora">Zamora</option>
								<option value="Zaragoza">Zaragoza</option>
							</select><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$prov = "";
						$numalm = "";

						//Recojo las variables del formulario

						$prov = $_POST["prov"];
						
						//limpiamos las variables
						
						$prov = test_input($_POST["prov"]);
						  
						//Lamamos a la función indicada.
						
						$numalm = numalmada();
						 
						mysqlada($prov,$numalm);
						
						}
						
						//Funciones
						
						function test_input($data) {							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
						}
						
						
						
						function mysqlada($prov,$numalm) {
													
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
								$stmt = $conn->prepare("INSERT INTO almacen (localidad,num_almacen) VALUES (:localidad,:num_almacen)");
								$stmt->bindParam(':localidad', $localidad);
								$stmt->bindParam(':num_almacen', $num_almacen);
  
								// insert a row
								$localidad = $prov;
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
