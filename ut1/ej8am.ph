<HTML>
<HEAD><TITLE> EJ8AM –  definir dos matrices de 3x3 y obtener: Suma y Producto </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej8

#Creamos los dos arrays multidimensionales:
$matriz = array (array("","",""), array("","",""), array("","",""));

$matriz2 = array (array("","",""), array("","",""), array("","",""));

echo "Matrices: "."<br><br>";

#El contador de posiciones de cada array:

$arrlength=count($matriz);
$arrlength2=count($matriz[0]);
$arrlength3=count($matriz2);
$arrlength4=count($matriz2[0]);

#Creo un cont para ordenar la matriz.
$contc=1;

#Creamos la tabla con 2 for y mostramos la matriz:
#La matriz tendrá números aleatorios gracias a rand():


for ($fila = 0; $fila < $arrlength; $fila++) {
  for ($col = 0; $col < $arrlength2; $col++) {
	$matriz[$fila][$col] = rand(0,10);
    echo "(".$matriz[$fila][$col].")";
	if ($contc!=3) {
		echo "- ";
		$contc++;
}else {
	echo "<br>";
	$contc=1;
}
}
}

echo "<br><br>";

#Ahora lo mismo con la 2 matriz:


for ($fila = 0; $fila < $arrlength3; $fila++) {
  for ($col = 0; $col < $arrlength4; $col++) {
	$matriz2[$fila][$col] = rand(0,10);
    echo "(".$matriz2[$fila][$col].")";
	if ($contc!=3) {
		echo "- ";
		$contc++;
}else {
	echo "<br>";
	$contc=1;
}
}
}

echo "<br><br>";

#Suma de las matrices:

echo "Suma de las matrices: "."<br><br>";

$suma=0;
$sumaf = array (array("","",""), array("","",""), array("","",""));

for ($fila = 0; $fila < $arrlength; $fila++) {
	for ($col = 0; $col < $arrlength2; $col++) {
		for ($fila = 0; $fila < $arrlength3; $fila++) {
			for ($col = 0; $col < $arrlength4; $col++) {
			
			$suma=$matriz[$fila][$col]+$matriz2[$fila][$col];
			
			$sumaf[$fila][$col] = $suma;
			echo "(".$sumaf[$fila][$col].")";
			if ($contc!=3) {
				echo "- ";
				$contc++;
			}else {
				echo "<br>";
				$contc=1;
			}
			$suma=0;
}
}
}
}

#Producto de las matrices:

echo "Producto de las matrices: "."<br><br>";

$prod=1;
$prodf = array (array("","",""), array("","",""), array("","",""));

/*for ($fila = 0; $fila < $arrlength; $fila++) {
	for ($col = 0; $col < $arrlength2; $col++) {
		for ($fila = 0; $fila < $arrlength3; $fila++) {
			for ($col = 0; $col < $arrlength4; $col++) {
			
			$prod=$matriz[$fila][$col]*$matriz2[$fila][$col];
			
			$prodf[$fila][$col] = $prod;
			echo "(".$prodf[$fila][$col].")";
			if ($contc!=3) {
				echo "- ";
				$contc++;
			}else {
				echo "<br>";
				$contc=1;
			}
			$prod=1;
}
}
}
}*/

for ($fila = 0; $fila < $arrlength; $fila++) {
	for ($col = 0; $col < $arrlength2; $col++) {
			for ($col = 0; $col < $arrlength4; $col++) {
			
			$prod=((($matriz[$fila][$col]*$matriz2[$fila][$col])+($matriz[$fila][$col+1]*$matriz2[$fila+1][$col]))+($matriz[$fila][$col+2]*$matriz2[$fila+1][$col]));
			
			$prodf[$fila][$col] = $prod;
			echo "(".$prodf[$fila][$col].")";
			if ($contc!=3) {
				echo "- ";
				$contc++;
			}else {
				echo "<br>";
				$contc=1;
			}
			$prod=1;
}
}
}



?>
</BODY>
</HTML>
