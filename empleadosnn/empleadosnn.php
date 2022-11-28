<HTML>
<HEAD>
<title>Empleados n:n</title>
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
					<h1>EMPLEADOS N:N</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="sel">Seleccione una opción: </label> <br>
							<input type="radio" name="sel" value="adep"> ALTA DPTO <br>
							<input type="radio" name="sel" value="aemp"> ALTA EMPLEADOS <br>
							<input type="radio" name="sel" value="cdep"> CAMBIO DPTO <br>
							<input type="radio" name="sel" value="msal"> MODIFICAR SALARIO <br>
							<input type="radio" name="sel" value="lemp"> LISTADO EMPLEADOS
							<br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables

						$sel = "";

						//Recojo las variables del formulario

						$sel = $_POST["sel"];
						
						//limpiamos las variables
						
						$sel = test_input($_POST["sel"]);
						  
						 //Lamamos a la función indicada.
						 
						if ($sel == "adep") {
							header('Location: '."altadep.php");
						}
						if ($sel == "aemp") {
							header('Location: '."altaemple.php");
						}
						if ($sel == "cdep") {
							header('Location: '."cambdep.php");
						}
						if ($sel == "msal") {
							header('Location: '."modsal.php");
						}
						if ($sel == "lemp") {
							header('Location: '."listemp.php");
						}
						
						}
		
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
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
