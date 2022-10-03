<HTML>
<HEAD><TITLE> EJ9AM –  definir una matrices de 3x4: Matriz traspuesta </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej9

#Creamos los dos arrays multidimensionales:
$matriz = array (array("","","",""), array("","","",""), array("","","",""));

echo "Matricz: "."<br><br>";

#El contador de posiciones del array:

$arrlength=count($matriz);
$arrlength2=count($matriz[0]);

#Creo un cont para ordenar la matriz.
$contc=1;

#Creamos la tabla con 2 for y mostramos la matriz:
#La matriz tendrá números aleatorios gracias a rand():


for ($fila = 0; $fila < $arrlength; $fila++) {
  for ($col = 0; $col < $arrlength2; $col++) {
	$matriz[$fila][$col] = rand(0,10);
    echo "(".$matriz[$fila][$col].")";
	if ($contc!=4) {
		echo " - ";
		$contc++;
}else {
	echo "<br>";
	$contc=1;
}
}
}

echo "<br>";

#Matriz transpuesta:

echo "Matriz transpuesta:"."<br><br>";

$trans= array (array("","",""), array("","",""), array("","",""),array("","",""));

#El contador de posiciones del nuevo array:

$arrlength3=count($trans);
$arrlength4=count($trans[0]);

#La matriz transpuesta es igual que si cambiamos la matriz el orden de filas y columnas de la matriz principal:

for ($fila = 0; $fila < $arrlength3; $fila++) {
	for ($col = 0; $col < $arrlength4; $col++) {
	$trans[$fila][$col] = $matriz[$col][$fila];
    echo "(".$trans[$fila][$col].")";
	if ($contc!=3) {
		echo " - ";
		$contc++;
}else {
	echo "<br>";
	$contc=1;
}
}
}

?>
</BODY>
</HTML>
