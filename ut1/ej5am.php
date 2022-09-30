<HTML>
<HEAD><TITLE> EJ5AM – Definir una matriz de 5x3 tal que en cada posición contenga el número
que resulta de sumar el número que identifica la columna con el número que identifica
 la fila del mismo  </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej5

#Creamos los array multidimensionales:
$matriz = array (array("","","","",""), array("","","","",""), array("","","","",""));

echo "Matriz sumando filas y columnas:"."<br><br>";

#El contador de posiciones de los array:

$arrlength=count($matriz);
$arrlength2=count($matriz[0]);

#Hacemos que el resultado de la matriz sea la suma de $fila y $col:
for ($fila = 0; $fila < $arrlength; $fila++) {
  for ($col = 0; $col < $arrlength2; $col++) {
	$matriz[$fila][$col] = $fila + $col;
}
}

#Creamos la tabla con 2 for y mostramos la matriz:

for ($fila = 0; $fila < $arrlength; $fila++) {
  for ($col = 0; $col < $arrlength2; $col++) {
	//$matriz[$fila][$col] = $fila + $col;
    echo "(".$matriz[$fila][$col].")";
	if ($matriz[$fila][$col] < $matriz[$fila][$arrlength2-1]) {
		echo "- ";
}else {
	echo "<br>";
}
}
}

?>
</BODY>
</HTML>
