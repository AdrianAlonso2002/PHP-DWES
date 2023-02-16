<?php
session_start();
?>
<HTML>
<HEAD>
<title>Login</title>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="estilo.css">
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
					<h1>Login</h1>
					<div>
						<?php

						if(isset($_SESSION['nombre'])){
							echo "<p>Has iniciado sesion: " . $_SESSION['nombre'] . "";
							echo "<p><a href='cerrarsesion.php'>Cerrar Sesion</a></p>";
						}
						else {
						?>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							Login:<br>
							<label for="usu">Usuario: </label>
							<input type="text" name="usu" value=""><br>
							<label for="clv">Clave: </label>
							<input type="text" name="clv" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						
						
						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$usu = "";
						$clv = "";

						//Recojo las variables del formulario

						$usu = $_POST["usu"];
						$clv = $_POST["clv"];
					
						//Limpiamos el valor del nif.
						
						$usu = test_input($_POST["usu"]);
						$clv = test_input($_POST["clv"]);
						
						//Miramos los errores:
						
						$error = errorrdc($usu,$clv);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else {
						  
						//Lamamos a la función indicada.
						
						sesionl($clv);
						
						}	
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
