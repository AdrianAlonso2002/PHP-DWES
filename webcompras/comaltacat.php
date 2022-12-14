<HTML>
<HEAD>
<title>>Alta de Categorías</title>
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
					<h1>Alta de Categorías</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="nomb">Nombre: </label>
							<input type="text" name="nomb" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$nomb = "";
						$id = "";

						//Recojo las variables del formulario

						$nomb = $_POST["nomb"];
						
						//limpiamos las variables
						
						$nomb = test_input($_POST["nomb"]);
						
						$id = idadc();
						$error = erroradc($id,$nomb);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else
						  
						//Lamamos a la función indicada.
						 
						mysqladc($id,$nomb);
						
						}
						
						//Funciones
						
						function test_input($data) {							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
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
						
						function mysqladc($id,$nomb) {
													
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
						
						function nombadc(){
							/*SELECTs - mysql PDO*/

							$servername = "localhost";
							$username = "root";
							$password = "rootroot";
							$dbname = "comprasweb";

							try {
								$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
