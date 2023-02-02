<HTML>
<HEAD>
<title>Consulta de Compras</title>
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
					<h1>Consulta de Compras</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="nif">NIF/DNI: </label>
							<select id="nif" name="nif">
							<?php
								require "funciones.php";
								mostrarnif();
							?>
							</select><br>
							<label for="feci">Fecha inicio: </label>
							<input type="date"  name="feci" value="2022-06-29"  />
							<label for="fecf">Fecha final: </label>
							<input type="date"  name="fecf" value="2023-01-17"  /><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$nif = "";
						$feci = "";
						$fecf = "";

						//Recojo las variables del formulario

						$nif = $_POST["nif"];
						$feci = $_POST["feci"];
						$fecf = $_POST["fecf"];
					
						//Limpiamos el valor del nif.
						
						$nif = test_input($_POST["nif"]);
						
						
						//Lamamos a la función indicada.
						 
						mysqlcdc($nif,$feci,$fecf);
						
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
