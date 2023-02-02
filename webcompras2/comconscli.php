<?php
session_start();
if (empty($_SESSION['nombre'])) {
	echo "No has iniciado sesión";
}else{
?>
<HTML>
<HEAD>
<title>Consulta de Compras(Cliente)</title>
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
					<h1>Consulta de Compras(Cliente)</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							Usuario:
							<?php
								require "funciones.php";
								echo $_SESSION['nombre']."<br>";
							?>
							<label for="feci">Fecha inicio: </label>
							<input type="date"  name="feci" value="2022-06-29"  />
							<label for="fecf">Fecha final: </label>
							<input type="date"  name="fecf" value="2023-01-17"  /><br>
							<button id="env" type="submit">Consultar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$usu = $_SESSION['nombre'];
						$feci = "";
						$fecf = "";

						//Recojo las variables del formulario

						$feci = $_POST["feci"];
						$fecf = $_POST["fecf"];
					
						//Lamamos a la función indicada.
						 
						$nif = darnif($usu);
						 
						mysqlcdc($nif,$feci,$fecf);
							
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
