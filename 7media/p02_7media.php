<html>
<head></head>
<style>
table,tr,td{
	border:5px solid black;
	border-collapse:collapse;
	text-align:center;
	margin: 0 auto;
	background-color: darkred;
}
td {padding: 5px}
body {
	background-color: lightgreen;
}
body, p{
	font-weight:  bolder;
	font-family: Arial;
	text-align:center;
	}
p {padding: 10px}
img:hover {
		-webkit-transform:scale(1.1);
		transform:scale(1.1);
		transition: .3s;
		}
</style>
<body>
<?php
  /* Nombre Alumno: Adrián Alonso Sánchez */
	
//He dado estilo a los textos dentro del body como de la tabla.
//También estilo a la propia tabla.
//Por último que al pasar el cursor por una carta se agranda un poco más.

//El primer if es para coger la información del formulario html.
//El cuál se dirige a este archivo php.
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	require "p02_7media_fun.php"; //Recoje las funciones del otro php.
	//Si no lo encuentra, aparecerá un error diciendo que no se ha
	//podido abrir el archivo, y no ejecutará nada más.
	
	//TÍTULO:
	
	echo "<h1>RESULTADO 7MEDIA</h1>";
	
	//INICIALIZANDO VARIABLES:
	
	$jmax=4; //Jugadores máximos que se pueden añadir.
	$contj=0; //Contador de los jugaadores.
	$jug=array(); //Nombre de cada uno de los jugadores.
	$maxcartas = 40; //El máximo de cartas que hay.

	//Array con el nombre de las imagenes de cada carta.
	$cartas=array("1B","1C","1E","1O","2B","2C","2E","2O",
				  "3B","3C","3E","3O","4B","4C","4E","4O",
				  "5B","5C","5E","5O","6B","6C","6E","6O",
				  "7B","7C","7E","7O","CB","CC","CE","CO",
				  "RB","RC","RE","RO","SB","SC","SE","SO",);
				
	//COMPROBAMOS QUE EXISTA UNA APUESTA Y SEA NÚMERICA:
	$apuesta=$_POST["apuesta"]; //Recoge la apuesta del formulario con POST.
	$compapu = true; //Comprueba si la apuesta es válida.
	$contapu = strlen($apuesta); //Recoge el número de carácteres de la apuesta.
	for ($i=0; $i <= $contapu-1; $i++){ //Pasa por cada carácter de la apuesta.
		$napu = substr($apuesta, $i, 1); //Muestra el valor del carácter con la $i que pasa por el for.. 
		if ($napu >= 1 && $napu <= 9 || $napu == 0) { //Si la variable es un número, no pasa nada.
		}else { //Pero si no es un número...
			$compapu = false;	//El comprobador pasa a ser false.
		}
	}
	if ($compapu == false || empty($apuesta)){ //Si la apuesta no es un número o no hay apuesta...
		echo "Tienes que añadir una cantidad númerica entera y válida en la apuesta."; //Muestra este mensaje.
	}else{ //Ya comprobado que la apuesta es correcta, vamosa comprobar el número de cartas.
	$apuesta=test_input($_POST["apuesta"]);
	//COMPROBAMOS EL NÚMERO DE CARTAS:
	$numcartas=$_POST["numcartas"];
	$compcart = true; //Comprueba si las cartas son validas.
	$contcart = strlen($numcartas); //Recoge el número de carácteres del número de cartas.
	for ($i=0; $i <= $contcart-1; $i++){ //Pasa por cada carácter del número de cartas;
		$ncart = substr($numcartas, $i, 1); //Muestra el valor del carácter con la $i que pasa por el for.. 
		if ($ncart >= 1 && $ncart <= 9 || $ncart == 0) { //Si la variable es un número, no pasa nada.
		}else { //Pero si no es un número...
			$compapu = false;	//El comprobador pasa a ser false.
		}
	}
	if ($compapu == false || empty($apuesta)){ //Si el número de cartas no es un número o no hay bote.
		echo "Tienes que añadir una número entero y válido en el número de cartas."; //Muestra este mensaje.
	}else{ //Ya comprobado que la apuesta es correcto, vamos a comprobar que hay suficientes cartas.
		$numcartas=test_input($_POST["numcartas"]);
	
	//AHORA COMPROBAMOS QUE HAY SUFICIENTES CARTAS PARA LOS JUGADORES:
	for($i=1;$i<=$jmax;$i++){ //Un for que pasa desde el primer jugador al último.
		if(!empty($_POST["nombre$i"])){ //Si el jugador nombre$i no existe...
			$contj++; //sumamos 1 a este contador.
		}
	}
	if ($contj * $numcartas > $maxcartas){
		echo "Al habes únicamente 40 cartas para  $contj jugadores con cada uno $numcartas cartas."."<br><br>";
		echo "En total suman ".$contj * $numcartas." cartas, lo que sobrepasa a las 40, reduce el número de jugadores o cartas para que no supere el máximo de cartas.";
	}else{
	
	//CONTAMOS EL NUMERO DE JUGADORES:
	$contj = 0;  //Contador de los jugaadores.
	$cartasrep= array(); //Array que recoje las cartas que se repiten.
	$contr = 0; //Un contador que actúa como boolean para la función crearCartas
	for($i=1;$i<=$jmax;$i++){ //Un for que pasa desde el primer jugador al último.
		if(!empty($_POST["nombre$i"])){ //Si el jugador nombre$i no existe...
			$contj++; //sumamos 1 a este contador.
			$cartasnuevas=crearCartas($cartas,$numcartas,$cartasrep,$contr); //Creamos cartas random, enviamos las cartas, el número de cartas para cada jugador, las cartas repetidas y un contador inicial de las cartas repetidas.
			$cartasrep=array_merge($cartasrep,$cartasnuevas); //Las cartas repetidas se unen a las nuevas cartas añadidas a un jugador.
			$contr = 1; //Cambiamos el contador para que ahora si, revise si están repetidas las cartas en la función crearCartas.
			$nomb=[test_input($_POST["nombre$i"]) => $cartasnuevas]; //El jugador con sus cartas generadas pasa a la variable $nb;
			$jug[$contj]=$nomb; //Si el jugador existe lo metemos en su respectivo array.
		}
	}
	
		//VEMOS JUGADORES Y SUS CARTAS:
		echo "<table>"; //Crear la tabla.
		mostrarCartas($jug,$numcartas); //Muestra las cartas de cada jugador.
		echo "</table>"; //Cierra la tabla.

		echo "<br>"; //Un salto de linea.

		//MOSTRAMOS LOS RESULTADOS:
		compararCartas($jug,$numcartas,$apuesta); //Comparar las cartas de cada kugador para determinar el ganador.
		
	//Enlace para volver al html como el principio.
	echo "<br><br>"; //Salto de línea.
	echo "<a href='p02_7media.html'>NUEVA TIRADA</a>"; //Enlace hacia el html al principio.
	}
	}
	}	
}

?>
				

</body>
</html>