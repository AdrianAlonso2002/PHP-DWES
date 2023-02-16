<?php
session_start();
session_unset();
session_destroy();
//setcookie("PHPSESSID","borrar", time() - (60), "/");
?>
<HTML>
<HEAD>
<title>Cerrar Sesion</title>
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
					<h1>Cerrar Sesion</h1>
					<div>

					<p>Has Cerrado Sesion</p>

					<br /><a href="../index.php">Volver a Login</a>
						
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
