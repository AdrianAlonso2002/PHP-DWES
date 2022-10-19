<HTML>
<HEAD>
<TITLE> UT3: Binario </TITLE>
<meta charset="utf-8" />
<meta name="author" content="Adrian" />
</HEAD>
<style>
.error {color: #FF0000;}
</style>
<BODY>
		<header>
		</header>
		<nav>
		</nav>
		<main>
			<section>
				<article>
					<h1>CONVERSOR BINARIO</h1>
					<p><span class="error">* obligatorio</span></p>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="dec">Número Decimal: </label>
							<input type="text" name="dec" value="" />
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
						
						$dec = 0;

						//Recojo las variables del formulario

						$dec = $_POST["dec"];
						
						//limpiamos las variables
						
						$dec = test_input($_POST["dec"]);
						  
						 //Lamamos a la función
						 
						binario($dec);
						
						}
		
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
						}

						function binario($n1) {
							$bin = decbin($n1);
							if ($bin <= 11111111) {
							$bin = substr("00000000",0,8 - strlen($bin)). $bin;
							}
							echo "<form>";
							echo "<label>Número Binario: </label>";
							echo "<input type='text' value='$bin' />";
							echo "</form>";
							
							$bin=0;
							
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
