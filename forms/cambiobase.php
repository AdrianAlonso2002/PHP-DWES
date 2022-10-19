<HTML>
<HEAD>
<TITLE> UT3: Cambiobase </TITLE>
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
					<h1>CONVERSOR NUMERICO</h1>
					<p><span class="error">* obligatorio</span></p>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="dec">Número Decimal: </label>
							<input type="text" name="dec" value="" />
							<span class="error">*</span>
							<br><br>
							<label for="sel">Convertir a: </label>
							<span class="error">*</span> <br>
							<input type="radio" name="sel" value="binar"> Binario <br>
							<input type="radio" name="sel" value="octal"> Octal <br>
							<input type="radio" name="sel" value="hexad"> Hexadecimal <br>
							<input type="radio" name="sel" value="todos"> Todos sistemas 
							<br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables
						
						$dec = 0;
						$sel = "";

						//Recojo las variables del formulario

						$dec = $_POST["dec"];
						$sel = $_POST["sel"];
						
						//limpiamos las variables
						
						$dec = test_input($_POST["dec"]);
						$sel = test_input($_POST["sel"]);
						  
						 //Lamamos a la función indicada.
						 
						if ($sel == "binar") {
							echo "<table>";
							binario($dec);
							echo "</table>";
						}
						if ($sel == "octal") {
							echo "<table>";
							foctal($dec);
							echo "</table>";
						}
						if ($sel == "hexad") {
							echo "<table>";
							hexadecimal($dec);
							echo "</table>";
						}
						if ($sel == "todos") {
							echo "<table>";
							binario($dec);
							foctal($dec);
							hexadecimal($dec);
							echo "</table>";
						}
						
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

							echo "<tr>";
							echo "<td> Binario </td>";
							echo "<td> $bin </td>";
							echo "</tr>";	

							$bin=0;
							
							 return;
						}
						
						function foctal($n1) {
							$bin = decoct($n1);
							
							echo "<tr>";
							echo "<td> Octal </td>";
							echo "<td> $bin </td>";
							echo "</tr>";	
							
							$bin=0;
							
							 return;
						}
						
						function hexadecimal($n1) {
							$bin = dechex($n1);
							
							echo "<tr>";
							echo "<td> Hexadecimal </td>";
							echo "<td> $bin </td>";
							echo "</tr>";	

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
