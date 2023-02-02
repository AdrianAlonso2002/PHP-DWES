<HTML>
<HEAD>
<title>Alta de Clientes</title>
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
					<h1>Alta de Clientes</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							Date de alta:<br>
							<label for="nif">NIF: </label>
							<input type="text" name="nif" value=""><br>
							<label for="nomb">Nombre: </label>
							<input type="text" name="nomb" value=""><br>
							<label for="ape">Apellido: </label>
							<input type="text" name="ape" value=""><br>
							<label for="cp">Código Postal: </label>
							<input type="text" name="cp" value=""><br>
							<label for="dir">Dirección: </label>
							<input type="text" name="dir" value=""><br>
							<label for="ciu">Ciudad: </label>
							<input type="text" name="ciu" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						require "funciones.php";

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$nif = "";
						$nomb = "";
						$ape = "";
						$cp = "";
						$dir = "";
						$ciu = "";

						//Recojo las variables del formulario

						$nif = $_POST["nif"];
						$nomb = $_POST["nomb"];
						$ape = $_POST["ape"];
						$cp = $_POST["cp"];
						$dir = $_POST["dir"];
						$ciu = $_POST["ciu"];
					
						//Limpiamos el valor del nif.
						
						$nif = test_input($_POST["nif"]);
						$nomb = test_input($_POST["nomb"]);
						$ape = test_input($_POST["ape"]);
						$cp = test_input($_POST["cp"]);
						$dir = test_input($_POST["dir"]);
						$ciu = test_input($_POST["ciu"]);
						
						//Miramos los errores:
						
						$error = erroracli($nif,$nomb,$ape,$cp,$dir,$ciu);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else {
						  
						//Lamamos a la función indicada.
						 
						mysqlacli($nif,$nomb,$ape,$cp,$dir,$ciu);
						
						}	
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
