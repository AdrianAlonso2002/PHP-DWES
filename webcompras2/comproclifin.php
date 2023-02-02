<?php
session_start();
if (empty($_SESSION['nombre'])) {
	echo "No has iniciado sesión";
}else{
?>
<HTML>
<HEAD>
<title>Finalizar Compra</title>
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
					<h1>Finalizar Compra</h1>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							
							<?php
							require "funciones.php";
							if(isset($_SESSION['nombre'])) {
							?>
							Usuario:
							<?php
								
								echo $usu = $_SESSION['nombre'];
								echo "<br>";
								$cestavac = false;
									
							?>
							Cesta:<br><br>
							<?php
								$cookie_name = "cesta_".$usu;
								if(isset($_SESSION[$cookie_name][0])) {
									mostrarcesta($usu);
								}else {
									echo "La cesta está vacía.";
									$cestavac = true;
								}
								if ($cestavac == false) {
									echo "<button id='env' type='submit'>Comprar</button>";
									echo "<br><br>";
								}
							}else {
								echo "Inicia Sesión para ver su cesta"."<br><br>";
							}
							?>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
						// defino variables
						
						$arrcmpcesta = array();
						$arrcmpcesta[0] = "vacio";
						
						for ($i=0; $i<=9999; $i++) { 
							
							if(isset($_POST["P000".$i])) {
								if ($arrcmpcesta[0] == "vacio") {
								$arrcmpcesta[0] = $_POST["P000".$i];
								}else {
								$arrcmpcesta[$i] = $_POST["P000".$i];
								}
							}else if (isset($_POST["P00".$i])){
								if ($arrcmpcesta[0] == "vacio") {
								$arrcmpcesta[0] = $_POST["P00".$i];
								}else {
								$arrcmpcesta[$i] = $_POST["P00".$i];
								}
							}else if (isset($_POST["P0".$i])){
								if ($arrcmpcesta[0] == "vacio") {
								$arrcmpcesta[0] = $_POST["P0".$i];
								}else {
								$arrcmpcesta[$i] = $_POST["P0".$i];
								}
							}else if (isset($_POST["P".$i])){
								if ($arrcmpcesta[0] == "vacio") {
								$arrcmpcesta[0] = $_POST["P".$i];
								}else {
								$arrcmpcesta[$i] = $_POST["P".$i];
								}
							}
						}
						
						array_multisort($arrcmpcesta);
						if ($arrcmpcesta[0] == "vacio"){
							echo "No has seleccionado ningún producto";
						}else{
							
						
						
						$cookie_name = "cesta_".$usu;
						$cesta = $_SESSION[$cookie_name];
						
						//var_dump($cesta);
						for($i=0; $i<=count($cesta)-1; $i++)
						{ for($j=0; $j<=count($arrcmpcesta)-1; $j++) {
							if ($cesta[$i][0] == $arrcmpcesta[$j]) {
 
								$cookie_name = "cesta_".$usu;
								$prod = $cesta[$i][2];
								$cant = $cesta[$i][1];
								$nprod = $cesta[$i][0];
								$numalm = cnumalm($prod,$cant);
								eliminarprod($nprod,$cant,$numalm);
								$nif=darnif($usu);
								agregarcompra($nif,$nprod,$cant);
								// anular el conjunto de una variable de sesión
								unset($_SESSION[$cookie_name][$i]);
								array_multisort($_SESSION[$cookie_name]);
								echo "Productos seleccionados comprados";
							}
						}	
						}
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
