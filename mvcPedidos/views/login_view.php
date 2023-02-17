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
						session_start();
						if(isset($_SESSION['nombre'])){
							echo "<p>Has iniciado sesion: " . $_SESSION['nombre'] . "";
							echo "<p><a href='cerrarsesion.php'>Cerrar Sesion</a></p>";
							echo "<p><a href='../index.php'>Volver a inicio</a></p>";
							
						}
						else {
							
							$_SESSION['nombre']=$clv;
							echo "Has iniciado sesión."."<br>";
							echo "Cargando...";
							header( "refresh:2; url=views/login_view.php" );

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
