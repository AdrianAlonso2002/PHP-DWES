<HTML>
<HEAD>
<TITLE> UT3: Fichero2 </TITLE>
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
					<h1>FICHERO 2</h1>
					<p><span class="error">* obligatorio</span></p>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="nom">Nombre: </label>
							<input type="text" name="nom" value="" required />
							<span class="error">*</span>
							<br><br>
							<label for="ap1">Apellido1: </label>
							<input type="text" name="ap1" value="" required/>
							<br><br>
							<label for="ap2">Apellido2: </label>
							<input type="text" name="ap2" value="" required/>
							<br><br>
							<label for="fec">Fecha Nacimiento: </label>
							<input type="text" name="fec" value="" required />
							<span class="error">*</span>
							<br><br>
							<label for="loc">Localidad: </label>
							<input type="text" name="loc" value="" size="40" required />
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
						$fec = "";
						$loc = "";

						//Recojo las variables del formulario

						$nom = $_POST["nom"];
						$ap1 = $_POST["ap1"];
						$ap2 = $_POST["ap2"];
						$fec = $_POST["fec"];
						$loc = $_POST["loc"];
						
						//limpiamos las variables
						
						$nom = test_input($_POST["nom"]);
						$ap1 = test_input($_POST["ap1"]);
						$ap2 = test_input($_POST["ap2"]);
						$fec = test_input($_POST["fec"]);
						$loc = test_input($_POST["loc"]);
						  
						 //Lamamos a la función indicada.
						 
						files($nom,$ap1,$ap2,$fec,$loc);
						
						}
						//BIEN
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
						}
						
						function files($n1,$n2,$n3,$n4,$n5) {
							
							$myfile = fopen("alumnos2.txt", "w") or die("No se puede crear");
							$lon1=strlen($n1)+2;
							$lon2=strlen($n2)+2;
							$lon3=strlen($n3)+2;
							$lon4=strlen($n4)+2;
							$lon5=strlen($n5);
							$txt = str_pad($n1,$lon1,"#",STR_PAD_RIGHT);
							fwrite($myfile, $txt);
							$txt = str_pad($n2,$lon2,"#",STR_PAD_RIGHT);
							fwrite($myfile, $txt);
							$txt = str_pad($n3,$lon3,"#",STR_PAD_RIGHT);
							fwrite($myfile, $txt);
							$txt = str_pad($n4,$lon4,"#",STR_PAD_RIGHT);
							fwrite($myfile, $txt);
							$txt = str_pad($n5,$lon5,"#",STR_PAD_RIGHT);
							fwrite($myfile, $txt);
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
