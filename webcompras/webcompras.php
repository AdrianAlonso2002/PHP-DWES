<HTML>
<HEAD>
<title>WebCompras</title>
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
					<h1>WebCompras</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="sel">Seleccione una opción: </label> <br><br>
							Gestión Interna General <br>
							<input type="radio" name="sel" value="adc"> Alta de Categorías <br>
							<input type="radio" name="sel" value="adp"> Alta de Productos <br>
							<input type="radio" name="sel" value="ada"> Alta de Almacenes <br>
							<input type="radio" name="sel" value="ap"> Aprovisionar Productos <br>
							<input type="radio" name="sel" value="cds"> Consulta de Stock <br>
							<input type="radio" name="sel" value="cda"> Consulta de Almacenes <br>
							<input type="radio" name="sel" value="cdc"> Consulta de Compras <br><br>
							Gestión Interna Clientes <br>
							<input type="radio" name="sel" value="adcl"> Alta de Clientes <br>
							<input type="radio" name="sel" value="cdp"> Compra de Productos <br><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables

						$sel = "";

						//Recojo las variables del formulario

						$sel = $_POST["sel"];
						
						//limpiamos las variables
						
						$sel = test_input($_POST["sel"]);
						  
						 //Lamamos a la función indicada.
						 
						if ($sel == "adc") {
							header('Location: '."comaltacat.php");
						}
						if ($sel == "adp") {
							header('Location: '."comaltapro.php");
						}
						if ($sel == "ada") {
							header('Location: '."comaltaalm.php");
						}
						if ($sel == "ap") {
							header('Location: '."comaprpro.php");
						}
						if ($sel == "cds") {
							header('Location: '."comconstock.php");
						}
						if ($sel == "cda") {
							header('Location: '."comconsalm.php");
						}
						if ($sel == "cdc") {
							header('Location: '."comconscom.php");
						}
						if ($sel == "adcl") {
							header('Location: '."comaltacli.php");
						}
						if ($sel == "cdp") {
							header('Location: '."compro.php");
						}
						
						}
		
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
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
