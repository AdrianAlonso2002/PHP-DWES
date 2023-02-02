<HTML>
<HEAD>
<title>Aprovisionar Productos</title>
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
					<h1>Aprovisionar Productos</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="canpro">Cantidad de productos(número): </label>
							<input type="text" name="canpro" value=""><br>
							<select id="nompro" name="nompro">
							<?php
								require "funciones.php";
								mostrarnompro();
							?>
							</select>
							<select id="loc" name="loc">
							<?php
								mostrarloc();
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
						
						$canpro = "";
						$nompro = "";
						$numalm = "";
						$idpro = "";
						$loc = "";

						//Recojo las variables del formulario

						$canpro = $_POST["canpro"];
						$nompro = $_POST["nompro"];
						$loc  = $_POST["loc"];
						
						//limpiamos las variables
						
						$canpro = test_input($_POST["canpro"]);
						
						$numalm = numaprloc($loc);
						
						$error = errorap($canpro,$nompro,$numalm);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else
						
						$idpro = idproap($nompro);
					
						//Lamamos a la función indicada.
						 
						mysqlap($canpro,$idpro,$numalm);
						
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
