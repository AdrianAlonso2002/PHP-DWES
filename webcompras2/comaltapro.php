<HTML>
<HEAD>
<title>Alta de Productos</title>
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
					<h1>Alta de Productos</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<select name="nomcat">
							<?php
								require "funciones.php";
								mostrarnomcat();
							?>
							</select><br>
							<label for="nompro">Nombre: </label>
							<input type="text" name="nompro" value=""><br>
							<label for="pre">Precio: </label>
							<input type="text" name="pre" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$nomcat = "";
						$nompro = "";
						$pre = "";
						$idpro = "";

						//Recojo las variables del formulario

						$nomcat = $_POST["nomcat"];
						$nompro = $_POST["nompro"];
						$pre = $_POST["pre"];
						
						//limpiamos las variables
						
						$nomcat  = test_input($_POST["nomcat"]);
						$nompro = test_input($_POST["nompro"]);
						$pre = test_input($_POST["pre"]);
						
						$idpro = idproadp();
						$idcat = idcatadp($nomcat);
						$error = erroradp($nomcat,$nompro,$pre);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else
						  
						//Lamamos a la función indicada.
						 
						mysqladp($idpro,$nompro,$pre,$idcat);
						
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
