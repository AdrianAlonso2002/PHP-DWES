<HTML>
<HEAD>
<title>Alta de Almacenes</title>
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
					<h1>Alta de Almacenes</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="loc">Localidad: </label>
							<input type="text" name="loc" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 
						
						require "funciones.php";

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$loc = "";
						$numalm = "";

						//Recojo las variables del formulario

						$loc = $_POST["loc"];
						
						//limpiamos las variables
						
						$loc = test_input($_POST["loc"]);
						
						//Miramos los errores:
						
						$error = errorada($loc);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else {
						  
						//Lamamos a la función indicada.
						
						$numalm = numalmada();
						 
						mysqlada($loc,$numalm);
						
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
