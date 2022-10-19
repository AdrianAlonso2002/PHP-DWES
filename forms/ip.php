<HTML>
<HEAD>
<TITLE> UT3: IP </TITLE>
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
					<h1>IPs</h1>
					<p><span class="error">* obligatorio</span></p>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="ip">IP notación decimal: </label>
							<input type="text" name="ip" value="" />
							<span class="error">*</span>
							<br><br>
							<button id="env" type="submit">Notacion Binaria</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables
						
						$ip = 0;

						//Recojo las variables del formulario

						$ip = $_POST["ip"];
						
						//limpiamos las variables
						
						$ip = test_input($_POST["ip"]);
						  
						 //Lamamos a la función.
						 
						ipb($ip);
						}
		
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data); 
						  return $data;
						}

						function ipb($n1) {
							
						  $punto1=strpos ($n1,".",0); 

						  $punto2=strpos ($n1,".",($punto1+1));

	                      $punto3=strpos ($n1,".",($punto2+1));
							
						  $ipbin1 = decbin(substr($n1,0,$punto1));
							if ($ipbin1 <= 11111111) {
							$ipbin1 = substr("00000000",0,8 - strlen($ipbin1)). $ipbin1;
							}
						   $ipbin2 = decbin(substr($n1, ($punto1)+1, ($punto2-$punto1)));
							if ($ipbin2 <= 11111111) {
							$ipbin2 = substr("00000000",0,8 - strlen($ipbin2)). $ipbin2;
							}
						   $ipbin3 = decbin(substr($n1, ($punto2)+1, ($punto3-$punto2)));
							if ($ipbin3 <= 11111111) {
							$ipbin3 = substr("00000000",0,8 - strlen($ipbin3)). $ipbin3;
							}
						   $ipbin4 = decbin(substr($n1, ($punto3)+1, ($punto3)));
							if ($ipbin4 <= 11111111) {
							$ipbin4 = substr("00000000",0,8 - strlen($ipbin4)). $ipbin4;
							}
							
							$ipbin= "$ipbin1.$ipbin2.$ipbin3.$ipbin4";
						
							echo "<form>";
							echo "<label>IP Binario: </label>";
							echo "<input type='text' value='$ipbin' size='50' />";
							echo "</form>";
							
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
