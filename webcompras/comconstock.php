<HTML>
<HEAD>
<title>Consulta de Stock</title>
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
					<h1>Consulta de Stock</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="canpro">Productos: </label>
							<select id="nompro" name="nompro">
							<?php
								require "funciones.php";
								mostrarnompro();
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
						
						$nompro = "";		

						//Recojo las variables del formulario

						$nompro = $_POST["nompro"];
						
						
						$idpro = idproap($nompro);
					
						//Lamamos a la función indicada.
						 
						mysqlcds($idpro,$nompro);
						
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
