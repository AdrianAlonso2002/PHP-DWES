<HTML>
<HEAD>
<title>Alta empleado</title>
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
					<h1>ALTA EMPLE</h1>
					<div>	
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="dni">DNI: </label>
							<input type="text" name="dni" value=""><br>
							<label for="nomb">NOMBRE: </label>
							<input type="text" name="nomb" value=""><br>
							<label for="sal">SALARIO: </label>
							<input type="text" name="sal" value=""><br>
							<label for="fec">FECHA DE NACIMIENTO: </label>
							<input type="text" name="fec" value=""><br>
							<label for="dep">CÓDIGO DE DEPARTAMENTO: </label>
							<select name="dep">
							<?php
							require "empleadosnn_fun.php";
								mostrardepae();
							?>
							</select><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables

						$dni = "";
						$nomb = "";
						$sal = "";
						$fec = "";
						$dep = "";

						//Recojo las variables del formulario

						$dni = $_POST["dni"];
						$nomb = $_POST["nomb"];
						$sal = $_POST["sal"];
						$fec = $_POST["fec"];
						$dep = $_POST["dep"];
						
						
						//limpiamos las variables
						
						$dni = test_input($_POST["dni"]);
						$nomb = test_input($_POST["nomb"]);
						$sal = test_input($_POST["sal"]);
						$fec = test_input($_POST["fec"]);
						$dep = test_input($_POST["dep"]);
						
						$error = errorae($dni,$nomb,$sal,$fec,$dep);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else
						  
						//Lamamos a la función indicada.
						 
						mysqlae($dni,$nomb,$sal,$fec,$dep);
						
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

