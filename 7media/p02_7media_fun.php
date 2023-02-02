<?php
  /* Nombre Alumno: Adrián Alonso Sánchez */
	
//Limpia las variables.
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//Crea las cartas:
function crearCartas($cartas,$numcartas,$cartasrep,$contr){
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
	while($i<$numcartas){  //Para que muestre todas lass cartas del jugador.
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
function mostrarCartas($jug,$numcartas){
	foreach($jug as $nomb) { //$nomb ahora es el array $jug.
		foreach($nomb as $nombre => $cart) { //y el valor de $nombre es $cart.
			echo "<tr>"; //Creamos fila de la tabla.
			echo "<td>"; //Creamos columna de la tabla.
			echo "<p>$nombre</p>";
			echo "</td>"; //Cerramos columna de la tabla.
			for($i=0;$i<$numcartas;$i++){ //Para que pase por todas las cartas de cada jugador.
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
function compararCartas($jug,$numcartas,$premio){
	$gan = ""; //Inicializamos $gan como un string.
	$var = false; //$var es un boolean que sirve para indicar si hay un ganador o varios ganadores.
	$contg = 0; //Un contador que cuenta el total de gandores.
	$may=0; //Indica la mayor puntuación posible.
	
	foreach($jug as $nomb) {  //$nomb ahora es el array $jug.
		foreach($nomb as $nombre => $cart) { //y el valor de $nombre es $cart.
			$suma=cartasSumadas($cart,$numcartas); //Llamamos a está función, que devuelve la suma de las cartas.
			echo $nombre.": ".$suma."<br>"; //Muestra el nombre de un jugador y la suma de sus cartas.
			files($nombre,$suma,$premio); //Función que crea/ edita un fichero.
			if ($suma<=7.5){ //Si la suma es menor o igual a 7.5...
				if($suma==$may){ //Si lo que devuelve la función es igual que la mayor puntuación...
					$gan=$gan." - ".$nombre; //Guarda los nombres de los gandores.
					$var = true; //Indica que hay más de un ganador.
					$contg++; //Suma el número de ganadores.
				}
				if($suma>$may){ //Si lo que devuelve la función es mayor que la mayor puntuación...
					$may=$suma; //El mayor es lo devuelto.
					$gan=$nombre; //Recoge el nombre del ganador.
					$var = false; //Indica que solo hay un ganador
					$contg = 1; //Y indica que solo hay un ganador.
				}
			}
		}
	}
	switch($may){ //Recoge la mayor puntuación:

				case 0: //Ningún jugador gano nada.
				$premio = 0; //Premio es 0.
				echo "La banca se lleva todo el bote al no haber ningún ganador."; //Mostramos el mensaje de la banca.
				break;
				
				case ($may > 0 && $may < 7.5): //Si hay pountos y no sobrepasan la 7media.
				$premio=$premio*0.5; //El premio es un 50% en este caso.
				if ($var == false){ //Para mostrar si es un ganador o varios.
					echo "Ha ganado $gan con una puntuación de $may cobrandose $premio €!"; //Mostramos el ganador.
				}else {
					$premio=$premio/$contg; //El premio se divide entre los ganadores.
					round($premio, 2); //Y se redondea a 2 décimas.
					echo "Han ganado $gan con una puntuación de $may cobrandose cada uno $premio €!"; //Mostramos los ganadores.
				}
				break;
				
				case ($may == 7.5): //Si $may es 7.5.
				if ($var == false){ //Para mostrar si es un ganador o varios.
					echo "Ha ganado $gan con una puntuación de $may cobrandose $premio €!"; //Mostramos el ganador.
				}else {
					$premio=$premio/$contg; //El premio se divide entre los ganadores.
					round($premio, 2); //Y se redondea a 2 décimas.
					echo "Han ganado $gan con una puntuación de $may cobrandose cada uno $premio €!"; //Mostramos los ganadores.
				}
				
			}
			
	
	
}

//VER EL RESULTADO DE DICHO JUGADOR
function cartasSumadas($cart,$numcartas){
	$valor=array("1","2","3","4","5","6","7","C","R","S"); //Array con el valor de las cartas.
	$suma=0; //Inizializamos la suma a 0.
	for($i=0;$i<count($valor);$i++){ //Va a pasar por cada valor del array valor.
		for($j=0;$j<$numcartas;$j++){ //Y esté pasa por cada carta de un jugador.
			if(substr($cart[$j],0,1)==$valor[$i]){ 	//Si el primer carácter de una carta coincide con un valor del array valor...
				if ($valor[$i] == "C" || $valor[$i] == "R" || $valor[$i] == "S"){ //En el caso de que sea sota, cabaalo o rey se sumará 0.5 a la variable suma.
					$suma = $suma + 0.5;
				}else{	//Y si no pues directamente se suma el valor.
					$suma = $suma + $valor[$i];
				}
			}
		}
	}
	return $suma; //Devolvemos la suma.
}

//Crear fichero.
function files($jug,$puntos,$premio) { //Aparece el nombre y la suma de puntos de los jugadores, pero no he conseguido que muestre el premio de cada uno.

	$myfile = fopen("apuestas.txt", "a") or die("No se puede crear/editar"); //Abre el archivo "apuestas.txt", de modo que si no existe lo intenta crear y cada vez que se llame a la función añadirá más lineas.
	$lon1=strlen($jug)+3;	//Se coge la longitud que va a utilizar cada variable.
	$lon2=strlen($puntos)+3;	//En este caso la longitud la calcula con strlen, y es los caracteres de puntos y 3 más.
	$lon3=strlen($premio);	//Este al ser el último no hace falta añadirel más carácteres.
	$txt = str_pad($jug,$lon1,"*",STR_PAD_RIGHT);	//Y ahora con str_pad, poniendo el valor que queremos mostrar con su longitud, le diremos que rellene con "*" y que sea para la derecha.
	fwrite($myfile, $txt);	//Lo escribe en el fichero.
	$txt = str_pad($puntos,$lon2,"*",STR_PAD_RIGHT); //Y así con los dos retantes.
	fwrite($myfile, $txt);
	$txt = str_pad($premio,$lon3,"*",STR_PAD_RIGHT)."\n"; //\n para hacer un salto de línea".
	fwrite($myfile, $txt);
	fclose($myfile); //Cerramos el fichero.
						
}
		
				








?>