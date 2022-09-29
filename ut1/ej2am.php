<HTML>
<HEAD><TITLE> EJ2AM – Modificar el ejercicio anterior para mostrar la suma de los elementos por filas y por
columnas </TITLE></HEAD>
<style>
table,tr,td{
	border:1px solid black;
	border-collapse:collapse;
	text-align:center;
	padding: 5px;
}
</style>
<BODY>
<?php

#Ej2

#Creamos los array multidimensionales:
$matriz = array (array(2,4,6), array(8,10,12), array(14,16,18));

echo "Matriz:"."<br><br>";

#El contador de posiciones del array:

$arrlength=count($matriz);

#Creamos la tabla con 2 for y mostramos la suma de la columna:

echo "Suma por filas: "."<br><br>";

$suma=0;

echo "<table>";
for ($fila = 0; $fila < $arrlength; $fila++) {
  echo "<tr>";
  for ($col = 0; $col < 1; $col++) {
	$suma=$suma+(($matriz[$fila][$col]+$matriz[$fila][$col+1]+$matriz[$fila][$col+2]));
    echo "<td>".$suma."</td>";
	$suma=0;
  }
  echo "</tr>";
}
echo "</table>";

#Creamos otra tabla con 2 for y mostramos la suma de la fila:

echo "<br><br>"."Suma por columnas: "."<br><br>";

$suma=0;

echo "<table>";
for ($fila = 0; $fila < 1; $fila++) {
  echo "<tr>";
  for ($col = 0; $col < $arrlength; $col++) {
	$suma=$suma+(($matriz[$fila][$col]+$matriz[$fila+1][$col]+$matriz[$fila+2][$col]));
    echo "<td>".$suma."</td>";
	$suma=0;
  }
  echo "</tr>";
}
echo "</table>";


?>
</BODY>
</HTML>
