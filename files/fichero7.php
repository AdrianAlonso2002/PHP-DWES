<HTML>
<HEAD>
<TITLE> UT3: Fichero7 </TITLE>
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
					<h1>Operaciones Sistemas Ficheros</h1>
					<p><span class="error">* obligatorio</span></p>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="ori">Fichero Origen(Path/nombre): </label>
							<input type="text" name="ori" value="" size="28" required />
							<span class="error">*</span>
							<br><br>
							<label for="des">Fichero Destino(Path/nombre): </label>
							<input type="text" name="des" value="" size="28" required />
							<span class="error">*</span>
							<br><br>
							<label for="op">Operaciones: </label>
							<span class="error">*</span> <br>
							<input type="radio" name="op" value="cop" required> Copiar Fichero <br>
							<input type="radio" name="op" value="ren" required> Renombrar Fichero <br>
							<input type="radio" name="op" value="bor" required> Borrar Fichero
							<br><br>
							<button id="env" type="submit">Ejecutar Operación</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 
						
						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables
						
						$ori = "";
						$des = "";
						$op = "";
						
						//Recojo las variables del formulario

						$ori = $_POST["ori"];
						$des = $_POST["des"];
						$op = $_POST["op"];
						  
						 //Lamamos a la función indicada.
						
						if ($op == "cop") {
						files1($ori,$des);
						}
						
						if ($op == "ren") {
						files2($ori,$des);
						}
						
						if ($op == "bor") {
						files3($ori,$des);
						}
						
						}
						//BIEN
						//Funciones
	
						
						//Copiar fichero.
						function files1($n1,$n2) {
							
							echo "<h1>Operaciones Sistemas Ficheros</h1>"."<br>";
							
							if(is_file($n1)){
								echo "El directorio ".$n1." existe<br>";
								}else{
								echo "El directorio ".$n1."  no existe<br>";
								$myfile = fopen($n1, "w") or die("No se puede crear");
								$txt = "Fichero $n1 creado";
								fwrite($myfile, $txt);
								fclose($myfile);
								echo "Se ha creado el directorio ".$n1."<br>";
							} 	
						 
						
							if(is_file($n2)){
								echo "El directorio ".$n2." existe<br>";
								}else{
								echo "El directorio ".$n2."  no existe<br>";
							} 	
							
							copy($n1, $n2);
							
							echo "Se ha copiado con exito el fichero $n1 a $n2";
							
							 return;
						
						}
						
						//Renombrar fichero.
						function files2($n1,$n2) {
							
							echo "<h1>Operaciones Sistemas Ficheros</h1>"."<br>";
							
							if(is_file($n1)){
								echo "El directorio ".$n1." existe<br>";
								}else{
								echo "El directorio ".$n1."  no existe<br>";
								$myfile = fopen($n1, "w") or die("No se puede crear");
								$txt = "Fichero $n1 creado";
								fwrite($myfile, $txt);
								fclose($myfile);
								echo "Se ha creado el directorio ".$n1."<br>";
							} 	
						 
						
							if(is_file($n2)){
								echo "El directorio ".$n2." existe<br>";
								}else{
								echo "El directorio ".$n2."  no existe<br>";
							} 	
							
							echo "Se ha renombrado con exito el fichero $n1 a $n2";
							
							rename($n1, $n2);
							
							 return;
						
						}
						
						//Borrar fichero.
						function files3($n1,$n2) {
							
							echo "<h1>Operaciones Sistemas Ficheros</h1>"."<br>";
							
							//Lo que intente aquí es que el usuario seleccionare a través de un formulario que directorio borrar
							/*echo "<form>";
							echo "<label for='op2'>¿Cuál quieres borrar? </label>";
							echo "<input type='radio' name='op2' value='ori2' required> Origen = $n1";
							echo "<input type='radio' name='op2' value='des2' required> Destino = $n2";
							echo "<br><br>";
							echo "</form>";	
							*/
							
							if(is_file($n1)){
								echo "El directorio ".$n1." existe<br>";
								}else{
								echo "El directorio ".$n1."  no existe<br>";
								$myfile = fopen($n1, "w") or die("No se puede crear");
								$txt = "Fichero $n1 creado";
								fwrite($myfile, $txt);
								fclose($myfile);
								echo "Se ha creado el directorio ".$n1."<br>";
							} 	
						 
						
							if(is_file($n2)){
								echo "El directorio ".$n2." existe<br>";
								echo "Se ha borrado con exito el fichero $n2";
								unlink($n2);
								}else{
								echo "El directorio ".$n2."  no existe<br>";
								echo "No hay nada que borrar";
							} 	
							
							//$op2 = "des2";
							
							/*if ($op2 == "ori2") {
							echo "Se ha borrado con exito el fichero $n1";
							  unlink($n1);
							}*/
						
							/*if ($op2 == "des2") {
							echo "Se ha borrado con exito el fichero $n2";
							unlink($n2);
							}*/
							
							
							
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
