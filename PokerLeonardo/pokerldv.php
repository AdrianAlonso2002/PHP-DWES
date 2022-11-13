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
//He dado estilo a los textos dentro del body como de la tabla.
//También estilo a la propia tabla.
//Por último que al pasar el cursor por una carta se agranda un poco más.

//El primer if es para coger la información del formulario html.
//El cuál se dirige a este archivo php.
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	require "Pokerldv_fun.php"; //Recoje las funciones del otro php.
	//Si no lo encuentra, aparecerá un error diciendo que no se ha
	//podido abrir el archivo, y no ejecutará nada más.
	
	//TÍTULO:
	
	echo "<h1>RESULTADO POKER LEONARDO</h1>";
	
	//INICIALIZANDO VARIABLES:
	
	$jmax=8; //Jugadores máximos que se pueden añadir.
	$jmin=4; //Jugadores mínimos para jugar una partida.
	$contj=0; //Contador de los jugaadores.
	$cartxjug=4; //Número de cartas que se muestran.
	$jug=array(); //Nombre de cada uno de los jugadores.
	$ref = false; //Es para devolverte al html de inicio en 5 seg,
	//si no hay jugadores suficientes o un bote no válido.

	//Array con el nombre de las imagenes de cada carta.
	$cartas=array("1C1","1C2","1D1","1D2","1P1","1P2","1T1","1T2",
				  "JC1","JC2","JD1","JD2","JP1","JP2","JT1","JT2",
				  "QC1","QC2","QD1","QD2","QP1","QP2","QT1","QT2",
				  "KC1","KC2","KD1","KD2","KP1","KP2","KT1","KT2");
				
	//COMPROBAMOS QUE EXISTA UN BOTE Y SEA NÚMERICO:
	$bote=$_POST["bote"]; //Recoge el bote del formulario con POST.
	$compbote = true; //Comprueba si es un bote válido.
	$contbot = strlen($bote); //Recoge el número de carácteres del bote.
	for ($i=0; $i <= $contbot-1; $i++){ //Pasa por cada carácter de bote.
		$nbote = substr($bote, $i, 1); //Muestra el valor del carácter con la $i que pasa por el for.. 
		if ($nbote >= 1 && $nbote <= 9 || $nbote == 0) { //Si la variable es un número, no pasa nada.
		}else { //Pero si no es un número...
			$compbote = false;	//EL comprobador pasa a ser false.
		}
	}
	if ($compbote == false || empty($bote)){ //Si el bote no es un número o no hay bote.
		echo "Tienes que añadir una cantidad de bote númerico entero y válido."; //Muestra este mensaje.
		refrescar(); //Y se inicia la función que hace que devuelva todo al principio a los 5 seg.
	}else{ //Ya comprobado que el bote es correcto, vamos a los jugadores.
	
	//CONTAMOS EL NUMERO DE JUGADORES:
	$cartasrep= array(); //Array que recoje las cartas que se repiten.
	$contr = 0; //Un contador que actúa como boolean para la función crearCartas.
	for($i=1;$i<=$jmax;$i++){ //Un for que pasa desde el primer jugador al último.
		if(!empty($_POST["nombre$i"])){ //Si el jugador nombre$i no existe...
			$contj++; //sumamos 1 a este contador.
			$cartasnuevas=crearCartas($cartas,$cartxjug,$cartasrep,$contr); //Creamos cartas random, enviamos las cartas, el número de cartas para cada jugador, las cartas repetidas y un contador inicial de las cartas repetidas.
			$cartasrep=array_merge($cartasrep,$cartasnuevas); //Las cartas repetidas se unen a las nuevas cartas añadidas a un jugador.
			$contr = 1; //Cambiamos el contador para que ahora si, revise si están repetidas las cartas en la función crearCartas.
			$nomb=[test_input($_POST["nombre$i"]) => $cartasnuevas]; //El jugador con sus cartas generadas pasa a la variable $nb;
			$jug[$contj]=$nomb; //Si el jugador existe lo metemos en su respectivo array.
		}
	}
	
	if($contj<$jmin){ //Si el mínimo de jugadores es mayor que el contador de los jugadores que están jugando...
		echo "<h3>No hay suficientes jugadores para empezar</h3>"; //Se muestra este mensaje
		refrescar();  //Y se inicia la función que hace que devuelva todo al principio a los 5 seg.
	}else{ //sino es el caso...
		//VEMOS JUGADORES Y SUS CARTAS:
		echo "<table>"; //Crear la tabla.
		mostrarCartas($jug,$cartxjug); //Muestra las cartas de cada jugador.
		echo "</table>"; //Cierra la tabla.

		echo "<br>"; //Un salto de linea.

		//MOSTRAMOS LOS RESULTADOS:
		compararCartas($jug,$cartxjug,$bote); //Comparar las cartas de cada kugador para determinar el ganador.
	}
	//Enlace para volver al html como el principio.
	echo "<br><br>"; //Salto de línea.
	echo "<a href='pokerldv.html'>NUEVA TIRADA</a>"; //Enlace hacia el html al principio.
	}		
}

?>
</body>
</html>