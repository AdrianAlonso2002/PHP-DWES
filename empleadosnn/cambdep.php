<HTML>
<HEAD>
<title>Cambio Departamento</title>
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
					<h1>CAMBIO DEP</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="dni">DNI: </label>
							<select name="dni">
							<?php
								require "empleadosnn_fun.php";
								mostrardnicd();
							?>
							</select><br>
							<label for="da">DEP_ACTUAL: </label>
							<input type="text" name="da" value="">
							<label for="dn">DEP_NUEVO: </label>
							<select name="dn">
							<?php
								mostrardepcd();
							?>
							</select>
							<label for="fec">FECHA: </label>
							<input type="text" name="fec" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables

						$dni = "";
						$da = "";
						$dn = "";
						$fec = "";

						//Recojo las variables del formulario

						$dni = $_POST["dni"];
						$da = $_POST["da"];
						$dn = $_POST["dn"];
						$fec = $_POST["fec"];
						
						//limpiamos las variables
						
						$dni = test_input($_POST["dni"]);
						$da = test_input($_POST["da"]);
						$dn = test_input($_POST["dn"]);
						$fec = test_input($_POST["fec"]);
						
						$error = errorcd($dni,$da,$fec);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else
						  
						//Lamamos a la función indicada.
						 
						mysqlcd($dni,$da,$dn,$fec);
						
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
