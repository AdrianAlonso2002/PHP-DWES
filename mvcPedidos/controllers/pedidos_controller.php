<?php
session_start();

require_once("models/login_model.php");

if(isset($_SESSION['nombre'])){
	echo "<p>Has iniciado sesion: " . $_SESSION['nombre'] . "";
	?>
	<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<label for="sel">Seleccione una opción: </label> <br><br>
		<input type="radio" name="sel" value="cs"> Cerrar Sesión<br>
		<input type="radio" name="sel" value="mp"> Mostrar Pedidos <br><br>
		<input type="radio" name="sel" value="rp"> Realizar Pedido <br><br>
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
						 
			if ($sel == "mp") {
			require_once("models/productos_model.php");


			$productos=obtenerProductos();

			//Llamada a la vista -- Intermediario entre vista y modelo !!!
			require_once("views/productos_view.php");
			}
			if ($sel == "cs") {
			session_destroy();
			require_once("views/cerrarsesion.php");
			}
			if ($sel == "rp") {
			session_destroy();
			require_once("models/realizarpedido_model.php");
			require_once("views/realizarpedido_view.php");
			}
		}
}else{
?>
	<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		Login:<br>
		<label for="usu">Usuario: </label>
		<input type="text" name="usu" value=""><br>
		<label for="clv">Clave: </label>
		<input type="text" name="clv" value=""><br>
		<button id="env" type="submit">Enviar</button>
		<button id="borr" type="reset">Borrar</button>
		<br><br>
	</form>
							
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
												 
		// defino variables
						
		$usu = "";
		$clv = "";

		//Recojo las variables del formulario

		$usu = $_POST["usu"];
		$clv = $_POST["clv"];
					
		//Limpiamos el valor del nif.
						
		$usu = test_input($_POST["usu"]);
		$clv = test_input($_POST["clv"]);
						
		//Miramos los errores:
						
		$error = errorrdc($usu,$clv);
							 
		if ($error == true) {
			echo "Corrige los errores.";
		}else{
			session_destroy();
			require_once("views/login_view.php");
		}			
	}
}

?>
