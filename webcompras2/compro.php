<HTML>
<HEAD>
<title>Compra de Productos</title>
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
					<h1>Compra de Productos</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							Introduzca su NIF para proceder a la compra:<br>
							<label for="nif">NIF/DNI: </label>
							<select id="nif" name="nif">
							<?php
								require "funciones.php";
								mostrarnif();
							?>
							</select><br>
							Compra:<br>
							<label for="prod">Productos: </label>
							<select id="prod" name="prod">
							<?php
								mostrarnompro();
							?>
							</select><br>
							<label for="cant">Unidades: </label>
							<input type="text" name="cant" value=""><br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$nif = "";
						$prod = "";
						$cant = "";

						//Recojo las variables del formulario

						$nif = $_POST["nif"];
						$prod = $_POST["prod"];
						$cant = $_POST["cant"];
					
						//Limpiamos el valor del nif.
						
						$cant = test_input($_POST["cant"]);
						
						//Miramos los errores:
						
						$error = errorcpro($cant);
							 
						if ($error == true) {
							echo "Corrige los errores.";
						}else {
						  
						//Lamamos a la función indicada.
						
						$disp = compprocant($prod,$cant);

						if ($disp == 0){
							echo("No hay esa cantidad de unidades disponibles");
						}
						
						if ($disp == 1){
							echo("No hay stock");
						}
						 
						if ($disp == 2){

							$nprod = idproap($prod);

							$numalm = cnumalm($prod,$cant);
;
							mysqlcpro($nif,$nprod,$cant,$numalm);
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
