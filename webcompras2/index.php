<HTML>
<HEAD>
<title>Index</title>
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
					<h1>Index</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="sel">¿Qué vista quieres tener?: </label> <br><br>
							<input type="radio" name="sel" value="adm"> Administrador <br>
							<input type="radio" name="sel" value="cli"> Cliente<br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						require "funciones.php";
						
						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
							// defino variables

							$sel = "";

							//Recojo las variables del formulario

							$sel = $_POST["sel"];
						
							//limpiamos las variables
						
							$sel = test_input($_POST["sel"]);
						  
							//Lamamos a la función indicada.
						 
							if ($sel == "adm") {
								header('Location: '."webcompras.php");
							}
							if ($sel == "cli") {
								header('Location: '."webcomprascliente.php");
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