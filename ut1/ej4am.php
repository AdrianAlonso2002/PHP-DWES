<HTML>
<HEAD><TITLE> EJ4AM – Mostrar la fila y columna del elemento mayor  </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej4

#Creamos los array multidimensionales:
$matriz = array (array(1.1,1.2,1.3,1.4,1.5), array(2.1,2.2,2.3,2.4,2.5), array(3.1,3.2,3.3,3.4,3.5));

echo "Matriz:"."<br><br>";

#El contador de posiciones de los array:

$arrlength=count($matriz);
$arrlength2=count($matriz[0]);

#Creamos la tabla con 2 for y mostramos la matriz:
#con $mayor compararemos cual es el mayor por todo el array.

$mayor="";

for ($fila = 0; $fila < $arrlength; $fila++) {
  for ($col = 0; $col < $arrlength2; $col++) {
    echo "(".$matriz[$fila][$col].")= (elemento pos ".$matriz[$fila][$col].") ";
	if ($matriz[$fila][$col] > $mayor) {
		$mayor= $matriz[$fila][$col]." Fila ".$fila." y columna ".$col;
	}
	if ($matriz[$fila][$col] < $matriz[$fila][$arrlength2-1]) {
		echo "- ";
}else {
	echo "<br>";
}
}
}

echo "<br>"."El elemento mayor es : ".$mayor;

?>
</BODY>
</HTML>
