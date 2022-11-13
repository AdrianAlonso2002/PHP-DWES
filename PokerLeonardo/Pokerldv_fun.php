<?php

//Limpia las variables.
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//Crea las cartas:
function crearCartas($cartas,$cartxjug,$cartasrep,$contr){
	$cartasnuevas=array(); //Creamos este array que almacena las cartas nuevas mostradas a un jugador.
	$i=0; //Inicializamos $i;
	$reps = ""; //Es un string donde se recogerá el número de posición de una carta en el array $cartas.
	if ($contr!=0){ //Al principio este if no pasará pero al pasar el segundo jugador, sí.
		for($i=0;$i<count($cartasrep);$i++){ //Pasa por todo el array $cartasrep.
			$reps = array_search($cartasrep[$i], $cartas); //Busca el valor de posición del array de las cartas ya mostradas anteriormente .
			$cartas[$reps]="rep"; //Y a esas cartas les cambia el valor a "rep".
		}
	}
	$i=0; //Para el nuevo for, cambiamos el valor a $i;
	while($i<$cartxjug){  //Para que mustre las 4 cartas al jugador.
		$nueva=rand(0,(count($cartas)-1)); //Crea una nueva carta.
		if($cartas[$nueva]!="rep"){ //Si esa carta no está repetida...
			$cartasnuevas[$i]=$cartas[$nueva]; //La añadimos al array $cartasnuevas.
			$cartas[$nueva]="rep"; //Y esa carta pasa a cambiar su valor a "rep".
			$i++; //Al hacer esto, pasamos a la siguiente carta añadiendo un sumatorio a $i.
		}
	}
	return $cartasnuevas; //Devolvemos el array con las cartas nuevas mostradas y creadas.
}

//Mostrar los jugadores y sus cartas.
function mostrarCartas($jug,$cartxjug){
	foreach($jug as $nomb) { //$nomb ahora es el array $jug.
		foreach($nomb as $nombre => $cart) { //y el valor de $nombre es $cart.
			echo "<tr>"; //Creamos fila de la tabla.
			echo "<td>"; //Creamos columna de la tabla.
			echo "<p>$nombre</p>";
			echo "</td>"; //Cerramos columna de la tabla.
			for($i=0;$i<$cartxjug;$i++){ //Para que pase por las 4 cartas de cada jugador.
				echo "<td>"; //Creamos columna de la tabla.
				echo "<a href='./images/$cart[$i].PNG'><img src='./images/$cart[$i].PNG' width='70px' ></a>"; //Dentro de la tabla se añadira la imagen de la respectiva varta, y ademas en enlace a la carta, lo que hará que al darle clic, nos llevará a otra página la cuál nos muestra la carta más grande.
				echo "</td>"; //Cerramos columna de la tabla.
			}
			echo "</tr>"; //Cerramos fila de la tabla.
			echo "<br>"; //Salto de línea.
		}
	}
}

//Comparar las cartas y mostrar a los ganadores:
function compararCartas($jug,$cartxjug,$premio){
	$gan = ""; //Inicializamos $gan como un string.
	$var = false; //$var es un boolean que sirve para indicar si hay un ganador o varios ganadores.
	$contg = 0; //Un contador que cuenta el total de gandores.
	$may=0; //Indica la mayor puntuación posible.
	foreach($jug as $nomb) {  //$nomb ahora es el array $jug.
		foreach($nomb as $nombre => $cart) { //y el valor de $nombre es $cart.
			sort($cart); //Ordenamos las posiciones del array y sus valores.
			$c=cartasContadas($cart,$cartxjug); //Llamamos a está función.
			if($c==$may){ //Si lo que devuelve la función es igual que la mayor puntuación...
				$gan=$gan." - ".$nombre; //Guarda los nombres de los gandores.
				$var = true; //Indica que hay más de un ganador.
				$contg++; //Suma el número de ganadores.
			}
			if($c>$may){ //Si lo que devuelve la función es mayor que la mayor puntuación...
				$may=$c; //El mayor es lo devuelto.
				$gan=$nombre; //Recoge el nombre del ganadpr.
				$var = false; //Indica que solo hay un ganador
				$contg = 1; //Y indica que solo hay un ganador.
			}
		}
	}
	switch($may){ //Recoge la mayor puntuación:
				case 4: //Si $may es 4 es Poker.
				if ($var == false){ //Para mostrar si es un ganador o varios.
					echo "Ha ganado $gan con un Poker cobrandose $premio €!"; //Mostramos el ganador.
				}else {
					$premio=$premio/$contg;
					echo "Han ganado $gan con un Poker cobrandose cada uno $premio €!"; //Mostramos los ganadores.
				}
				break;
				
				case 3: //Si $may es 3 es Trío.
				$premio=$premio*0.7;
				if ($var == false){ //Para mostrar si es un ganador o varios.
					echo "Ha ganado $gan con un Trío cobrandose $premio €!"; //Mostramos el ganador.
				}else {
					$premio=$premio/$contg;
					round($premio, 2);
					echo "Han ganado $gan con un Trío cobrandose cada uno $premio €!"; //Mostramos los ganadores.
				}
				break;
				
				case 2: //Si $may es 2 es Doble Pareja.
				$premio=$premio*0.5;
				if ($var == false){ //Para mostrar si es un ganador o varios.
					echo "Ha ganado $gan con una Doble Pareja cobrandose $premio €!"; //Mostramos el ganador.
				}else {
					$premio=$premio/$contg;
					round($premio, 2);
					echo "Han ganado $gan con una Doble Pareja cobrandose cada uno $premio €!"; //Mostramos los ganadores.
				}
				break;
				
				case 1: //Si $may es 1 es pareja.
				if ($var == false){ //Para mostrar si es un ganador o varios.
					echo "Ha ganado $gan con un Pareja!"."<br>"; //Mostramos el ganador.
					echo "Por lo que nadie se lleva el bote.";
				}else {
					echo "Han ganado $gan con una Pareja!"."<br>"; //Mostramos los ganadores.
					echo "Por lo que nadie se lleva el bote.";
				}
				break;
				
				case 0: //Ningún jugador gano nada.
				echo "La banca se lleva todo el bote al no haber ningún ganador."; //Mostramos el mensaje de la banca.
				
			}
	
}

//VER EL RESULTADO DE DICHO JUGADOR
function cartasContadas($cart,$cartxjug){
	$letras=array("1","K","Q","J"); //Array con las letras de las cartas.
	
	for($i=0;$i<count($letras);$i++){ //Para cuando sea mayor o igual a las 4 letras del array.
		$c=comparacion($cart,$cartxjug,$letras[$i]); //Va hacia otra función, que devuelve un número que representa el número de cartas con las misma letra.
		if($c==4){ //Si el valor es 4...
			return 4; //Devuelve 4.
		}else
		if($c==3){ //Si el valor es 3...
			return 3; //Devuelve 3.
		}else
		if(substr($cart[0],0,1)==substr($cart[1],0,1) && substr($cart[2],0,1)==substr($cart[3],0,1)){ //Si las cartas dela posición 0 y 1 del array y las cartas dela posición 2 y 3 del array son las mismas...
			return 2; //Devuelve 1.
		}else
		if($c==2){ //Si el valor es 2...
			return 1; //Devuelve 1.
		}
	}
}

//COMPARAR CARTAS SEPARADAS
function comparacion($cart,$cartxjug,$letras){
	$cont=0; //Inizializamos el contador a 0.
	for($i=0;$i<$cartxjug;$i++){ //Pasa por las 4 cartas del jugador.
		if(substr($cart[$i],0,1)==$letras){ //Si la letra de la carta que es el primer carácter de su nombre, está entre la letra, se sumara el contador.
			$cont++; //Suma 1 al contador.
		}
	}
	return $cont; //Devuelve el contador.
}

//VOLEVER AL HTML SI HAY ALGÚN FALLO:
function refrescar(){
	header( "refresh:5; url=pokerldv.html" );  //Si se añaden menos de jugadores de los mínimos requeridos o un bote inexistente o no válido, el html volverá como al principio en 5seg.
}

?>