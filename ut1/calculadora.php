<HTML>
<HEAD>
<TITLE> UT3: Calculadora </TITLE>
<meta charset="utf-8" />
<meta name="author" content="Adrian" />
</HEAD>
<style>
.error {color: #FF0000;}
</style>
<BODY>
		<header>
		</header>
		<nav>
		</nav>
		<main>
			<section>
				<article>
					<h1>CALCULADORA</h1>
					<p><span class="error">* obligatorio</span></p>
					<div>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<label for="op1">Operando1: </label>
							<input type="text" name="op1" value="" />
							<span class="error">*</span>
							<br><br>
							<label for="op2">Operando2: </label>
							<input type="text" name="op2" value="" />
							<span class="error">*</span>
							<br><br>
							<label for="sel">Selecciona operación: </label>
							<span class="error">*</span> <br>
							<input type="radio" name="sel" value="suma"> Suma <br>
							<input type="radio" name="sel" value="rest"> Resta <br>
							<input type="radio" name="sel" value="prod"> Producto <br>
							<input type="radio" name="sel" value="div"> División 
							<br>
							<button id="env" type="submit">Enviar</button>
							<button id="borr" type="reset">Borrar</button>
							<br><br>
						</form>	
						
						<?php 

						//Siempre hay que poner este if para que el php entienda de donde vienen las variables

						 if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
						// defino variables
						$op1 = 0;
						$op2 = 0;
						$sel = "";

						//Recojo las variables del formulario

						$op1 = $_POST["op1"];
						$op2 = $_POST["op2"];
						$sel = $_POST["sel"];
						
						
						//limpiamos las variables
						
						  $op1 = test_input($_POST["op1"]);
						  $op2 = test_input($_POST["op2"]);
						  $sel = test_input($_POST["sel"]);
						
						//Depende de la elección del usuario se producira un formulario o otro.

						if ($sel == "suma") {
							suma($op1,$op2);
						}
						if ($sel == "rest") {
							rest($op1,$op2);
						}
						if ($sel == "prod") {
							prod($op1,$op2);
						}
						if ($sel == "div") {
							div($op1,$op2);
						}

						}
				
						//Funciones
	
						function test_input($data) {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
						}

						function suma($n1,$n2) {
							$suma = $n1 + $n2;
							echo "Resultado operación: "."$n1 + $n2 = $suma";
							 return;
						}

						function rest($n1,$n2) {
							$rest = $n1 - $n2;
							echo "Resultado operación: "."$n1 - $n2 = $rest";
							 return;
						}

						function prod($n1,$n2) {
							$prod = $n1 * $n2;
							echo  "Resultado operación: "."$n1 * $n2 = $prod";
							 return;
						}

						function div($n1,$n2) {
							if ($n2 == 0){
								echo  "Resultado operación: "."$n1 / $n2 = Infinito";
							}else {
 							$div = $n1 / $n2;
							echo  "Resultado operación: "."$n1 / $n2 = $div";
							}
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
