<HEAD>
<TITLE> UT3: Fichero6 </TITLE>
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
					<h1>Operaciones Ficheros</h1>
					<p><span class="error">* obligatorio</span></p>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="fic">Fichero (Path/nombre): </label>
							<input type="text" name="fic" value="" size="28" required />
							<span class="error">*</span>
							<br><br>
							<button id="env" type="submit">Ver Datos Fichero</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 
						
						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables
						
						$fic = "";
						
						//Recojo las variables del formulario

						$fic = $_POST["fic"];
						
						 //Lamamos a la función indicada.
						 
						if(file_exists($fic)){
							echo"El directorio ".$fic." existe<br>";
							files1($fic);
							}else{
							echo"El directorio ".$fic."  no existe<br>";
						} 

						}
						//BIEN
						//Funciones
	
						
						
						//Mostrar fichero.
						function files1($n1) {
							
							echo "<h1>Operaciones Ficheros</h1>"."<br>";
								
							$myfile = fopen("$n1", "r") or die("No se puede crear");

							$nom=basename($n1);
							$tam=filesize($n1)."Kb";
							$fec=date("j/n/o i:H", filemtime($n1));
							$dir=realpath($n1);
							$dir=str_replace($nom,"",$dir);
							
							fclose($myfile);
                
							echo "<b>Nombre del fichero:</b> ".$nom."<br>";
							echo "<b>Directorio:</b> ".$dir."<br>";
							echo "<b>Tamaño del fichero</b> ".$tam."<br>";
							echo "<b>Fecha ultima modificacion:</b> ".$fec;
							
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
