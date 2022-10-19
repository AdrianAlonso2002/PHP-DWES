<HTML>
<HEAD>
<TITLE> UT3: Basen </TITLE>
<meta charset="utf-8" />
<meta name="author" content="Adrian" />
</HEAD>
<style>
.error {color: #FF0000;}
table,tr,td{
	border:1px solid black;
	border-collapse:collapse;
	text-align:center;
}
td {padding: 5px}
</style>
<BODY>
		<header>
		</header>
		<nav>
		</nav>
		<main>
			<section>
				<article>
					<h1>CAMBIO DE BASE</h1>
					<p><span class="error">* obligatorio</span></p>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="num">Número: </label>
							<input type="text" name="num" value="" />
							<span class="error">*</span>
							<br><br>
							<label for="bas">Nueva Base: </label>
							<input type="text" name="bas" value="" />
							<span class="error">*</span>
							<br><br>
							<button id="env" type="submit">Cambio Base</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables
						
						$num = 0;
						$bas = 0;

						//Recojo las variables del formulario

						$num = $_POST["num"];
						$bas = $_POST["bas"];
						
						//limpiamos las variables
						
						$num = test_input($_POST["num"]);
						$bas = test_input($_POST["bas"]);
						  
						 //Lamamos a la función.
						 
						base($num,$bas);
						
						}
		
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data); 
						  return $data;
						}

						function base($n1,$n2) {
							
							$barra=strpos ($n1,"/",0); 

							$num=(substr($n1,0,$barra));
							$b1=(substr($n1, ($barra)+1));

							$cmb=base_convert($num, $b1, $n2);
							
							echo "Número $num en base $b1 = $cmb en base $n2";	
							
							return;
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
