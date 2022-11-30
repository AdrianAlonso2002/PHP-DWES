<HTML>
<HEAD>
<title>Modificar Salario</title>
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
					<h1>MODIFICAR SALARIO</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="dni">DNI: </label>
							<select name="dni">
							<?php
								require "empleadosnn_fun.php";
								mostrardnims();
							?>
							</select><br>
							<label for="sa">SAL_ACTUAL: </label>
							<input type="text" name="sa" value=""><br>
							<label for="sn">SAL_NUEVO: </label>
							<input type="text" name="sn" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables

						$dni = "";
						$sa = "";
						$sn = "";

						//Recojo las variables del formulario

						$dni = $_POST["dni"];
						$sa = $_POST["sa"];
						$sn = $_POST["sn"];
						
						//limpiamos las variables
						
						$dni = test_input($_POST["dni"]);
						$sa = test_input($_POST["sa"]);
						$sn = test_input($_POST["sn"]);
						
						$error = errorms($dni,$sa,$sn);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else
						  
						//Lamamos a la función indicada.
						 
						mysqlms($dni,$sa,$sn);
						
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
