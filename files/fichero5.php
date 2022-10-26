<HTML>
<HEAD>
<TITLE> UT3: Fichero5 </TITLE>
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
							<input type="text" name="fic" value="" required />
							<span class="error">*</span>
							<br><br>
							<label for="op">Operaciones: </label>
							<span class="error">*</span> <br>
							<input type="radio" name="op" value="todo" required> Mostrar Fichero <br>
							<input type="radio" name="op" value="line" required>
							<label for="num1">Mostrar linea </label>
							<input type="text" name="num1" value="" size="3" /> fichero <br>
							<input type="radio" name="op" value="prim" required>
							<label for="num2">Mostrar</label>
							<input type="text" name="num2" value="" size="3" /> primeras lineas
							<br><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 
						
						//Creo fichero para el ejemplo:
						
						$myfile = fopen("quijote.txt", "w") or die("No se puede crear");
							$txt = "En un lugar de la Mancha, de cuyo nombre no quiero acordarme, no ha mucho tiempo que vivía un hidalgo de los de lanza en astillero, adarga antigua, rocín flaco y galgo corredor.\n";
							fwrite($myfile, $txt);
							$txt = "Una olla de algo más vaca que carnero, salpicón las más noches, duelos y quebrantos los sábados, lantejas los viernes, algún palomino de añadidura los domingos, consumían las tres partes de su hacienda.\n";
							fwrite($myfile, $txt);
							$txt = "El resto della concluían sayo de velarte, calzas de velludo para las fiestas, con sus pantuflos de lo mesmo, y los días de entresemana se honraba con su vellorí de lo más fino.\n";
							fwrite($myfile, $txt);
							$txt = "Tenía en su casa una ama que pasaba de los cuarenta, y una sobrina que no llegaba a los veinte, y un mozo de campo y plaza, que así ensillaba el rocín como tomaba la podadera.\n";
							fwrite($myfile, $txt);
							$txt = "Frisaba la edad de nuestro hidalgo con los cincuenta años; era de complexión recia, seco de carnes, enjuto de rostro, gran madrugador y amigo de la caza.\n";
							fwrite($myfile, $txt);
							$txt = "Quieren decir que tenía el sobrenombre de Quijada, o Quesada, que en esto hay alguna diferencia en los autores que deste caso escriben; aunque por conjeturas verosímiles se deja entender que se llamaba Quijana. Pero esto importa poco a nuestro cuento: basta que en la narración dél no se salga un punto de la verdad.";
							fwrite($myfile, $txt);
							fclose($myfile);

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables
						
						$fic = "";
						$op = "";
						$num1 = "";
						$num2 = "";

						//Recojo las variables del formulario

						$fic = $_POST["fic"];
						$op = $_POST["op"];
						$num1 = $_POST["num1"];
						$num2 = $_POST["num2"];
						
						//limpiamos las variables
						
						$fic = test_input($_POST["fic"]);
						$op = test_input($_POST["op"]);
						$num1 = test_input($_POST["num1"]);
						$num2 = test_input($_POST["num2"]);
						  
						 //Lamamos a la función indicada.
						 
						if ($op == "todo") {
						files1($fic);
						}
						
						if ($op == "line") {
						files2($fic,$num1);
						}
						
						if ($op == "prim") {
						files3($fic,$num2);
						}
						
						}
						//BIEN
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
						}
						
						//Mostrar fichero.
						function files1($n1) {
							
							echo "<h1>Operaciones Ficheros</h1>"."<br>";
							
							$myfile=fopen($n1,"r") or die("No se puede mostrar");
							
							echo fread($myfile,filesize($n1)); 

							fclose($myfile);
							
							 return;
						
						}
						
						//Mostrar linea.
						function files2($n1,$n2) {						
							
							echo "<h1>Operaciones Ficheros</h1>"."<br>";
							
							$myfile=fopen($n1,"r") or die("No se puede mostrar");
							
								$cont=1;
								for($i=0;$i<=$n2;$i++){
        
									if($cont==$n2){
        
										echo fgets($myfile);
                            
									}else{
										fgets($myfile);
									}
									$cont++;
								}
						
							fclose($myfile);
							
							 return;
						
						}
						
						//Mostrar primeras lineas.
						function files3($n1,$n2) {
							
							echo "<h1>Operaciones Ficheros</h1>"."<br>";
							
							$myfile=fopen($n1,"r") or die("No se puede mostrar");

								for($i=1;$i<=$n2;$i++){
									echo fgets($myfile);
								}
							
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
