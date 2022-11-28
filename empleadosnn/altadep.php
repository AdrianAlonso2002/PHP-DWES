<HTML>
<HEAD>
<title>Alta departamento</title>
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
					<h1>ALTA DEP</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="cod">Código Departamento: </label>
							<input type="text" name="cod" value=""><br>
							<label for="nomb">Nombre Departamento: </label>
							<input type="text" name="nomb" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
									
						require "empleadosnn_fun.php";
												 
						// defino variables
						
						$cod = "";
						$nomb = "";

						//Recojo las variables del formulario

						$cod = $_POST["cod"];
						$nomb = $_POST["nomb"];
						
						//limpiamos las variables
						
						$cod = $_POST["cod"];
						$nomb = test_input($_POST["nomb"]);
						
						$error = errores($cod,$nomb);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else
						  
						//Lamamos a la función indicada.
						 
						mysqlad($cod,$nomb);
						
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
