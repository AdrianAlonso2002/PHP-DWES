<HTML>
<HEAD>
<TITLE> UT3: Datos </TITLE>
<meta charset="utf-8" />
<meta name="author" content="Adrian" />
</HEAD>
<style>
.error {color: #FF0000;}
table,tr,td{
	border:1px solid black;
	border-collapse:collapse;
	text-align:center;
}
td {padding: 5px}
</style>
<BODY>
		<header>
		</header>
		<nav>
		</nav>
		<main>
			<section>
				<article>
					<h1>DATOS ALUMNOS</h1>
					<p><span class="error">* obligatorio</span></p>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="nom">Nombre: </label>
							<input type="text" name="nom" value="" required />
							<span class="error">*</span>
							<br><br>
							<label for="ap1">Apellido1: </label>
							<input type="text" name="ap1" value="" />
							<br><br>
							<label for="ap2">Apellido2: </label>
							<input type="text" name="ap2" value="" />
							<br><br>
							<label for="ema">Email: </label>
							<input type="text" name="ema" value="" size="40" required />
							<span class="error">*</span>
							<br><br>
							<label for="sex">Sexo: </label>
							<input type="radio" name="sex" value="H" required> Hombre
							<input type="radio" name="sex" value="M" required> Mujer
							<input type="radio" name="sex" value="NB" required> No binario
							<span class="error">*</span>
							<br><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables
						
						$nom = "";
						$ap1 = "";
						$ap2 = "";
						$ema = "";
						$sex = "";

						//Recojo las variables del formulario

						$nom = $_POST["nom"];
						$ap1 = $_POST["ap1"];
						$ap2 = $_POST["ap2"];
						$ema = $_POST["ema"];
						$sex = $_POST["sex"];
						
						//limpiamos las variables
						
						$nom = test_input($_POST["nom"]);
						$ap1 = test_input($_POST["ap1"]);
						$ap2 = test_input($_POST["ap2"]);
						$ema = test_input($_POST["ema"]);
						$sex = test_input($_POST["sex"]);
						  
						 //Lamamos a la función indicada.
						 
							datos($nom,$ap1,$ap2,$ema,$sex);
							files($nom,$ap1,$ap2,$ema,$sex);
							
						}

						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
						}

						function datos($n1,$n2,$n3,$n4,$n5) {
							
							echo "<table>";
							echo "<tr>";
							echo "<td> Nombre </td>";
							echo "<td> Apellidos </td>";
							echo "<td> Email </td>";
							echo "<td> Sexo </td>";
							echo "</tr>";	
							echo "<tr>";
							echo "<td> $n1 </td>";
							echo "<td> $n2 $n3 </td>";
							echo "<td> $n4 </td>";
							echo "<td> $n5 </td>";
							echo "</tr>";
							echo "</table>";
							
							 return;
						}
						
						function files($n1,$n2,$n3,$n4,$n5) {
							
							$myfile = fopen("datos.txt", "w") or die("No se puede crear");
							$txt = "Nombre: $n1 Apellidos: $n2 $n3 Email: $n4 Sexo: $n5";
							fwrite($myfile, $txt);;
	                        fclose($myfile);
							
							 return;
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
