<HTML>
<HEAD><TITLE> EJ6AM – Definir una matriz de 3x3 con números aleatorios.  </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej6

#Creamos los array multidimensionales:
$matriz = array (array("","",""), array("","",""), array("","",""));

echo "Matriz con números aleatorios:"."<br><br>";

#El contador de posiciones de los array:

$arrlength=count($matriz);
$arrlength2=count($matriz[0]);

#Creo un cont para ordenar la matriz.
$cont=1;

#Creamos la tabla con 2 for y mostramos la matriz:
#La matriz tendrá números aleatorios gracias a rand():


for ($fila = 0; $fila < $arrlength; $fila++) {
  for ($col = 0; $col < $arrlength2; $col++) {
	$matriz[$fila][$col] = rand(1,10);
    echo "(".$matriz[$fila][$col].")";
	if ($cont!=3) {
		echo "- ";
		$cont++;
}else {
	echo "<br>";
	$cont=1;
}
}
}

#Inicializamos el max de la matriz y la media:

$maxmat=array("","","");
$media=array("","","");

#Para el valor máximo de la fila vamos comparando los números y sacando el mayor de cada una.
$max=0;
for($fila=0;$fila<count($matriz);$fila++){
	for($col=0;$col<count($matriz[$fila]);$col++){
		if($max<$matriz[$fila][$col]){
			$max=$matriz[$fila][$col];
		}
	}
	$maxmat[$fila]=$max;
	$max=0;
}

#Sacamos la media diviendo la suma de la fila entre cuantos números son:
$med=0;
for($fila=0;$fila<count($matriz);$fila++){
	for($col=0;$col<count($matriz[$fila]);$col++){
		$med=$med+$matriz[$fila][$col];
	}
	$med=$med/count($matriz);
	$media[$fila]=round($med);
	$med=0;
}

#Mostramos los números máximos:
echo "<br>Máximo: <br><br>";
for($i=0;$i<count($maxmat);$i++){
		$cont=$maxmat[$i];
		echo " ($cont) ";
}

#Mostramos la media:
echo "<br><br>Media: <br><br>";
for($i=0;$i<count($media);$i++){
		$cont=$media[$i];
		echo " ($cont) ";
}

?>
</BODY>
</HTML>
