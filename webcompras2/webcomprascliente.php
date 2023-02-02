<HTML>
<HEAD>
<title>WebCompras</title>
<link rel="stylesheet" href="webcomprascliente.css">
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
							<input type="radio" name="sel" value="rdc"> Registrarse <br>
							<input type="radio" name="sel" value="l"> Inicia sesión <br>
							<input type="radio" name="sel" value="cdpc"> Comprar productos<br>
							<input type="radio" name="sel" value="cdpcf"> Cesta de la compra<br>
							<input type="radio" name="sel" value="cdcc"> Consulta de Compras <br><br>
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
						 
							if ($sel == "rdc") {
								header('Location: '."comregcli.php");
							}
							if ($sel == "l") {
								header('Location: '."comlogincli.php");
							}
							if ($sel == "cdpc") {
								header('Location: '."comprocli.php");
							}
							if ($sel == "cdpcf") {
								header('Location: '."comproclifin.php");
							}
							if ($sel == "cdcc") {
								header('Location: '."comconscli.php");
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