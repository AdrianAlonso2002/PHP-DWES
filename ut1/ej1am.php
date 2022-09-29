<HTML>
<HEAD><TITLE> EJ1AM – Crear una matriz de 3x3 con los sucesivos múltiplos de 2 </TITLE></HEAD>
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

#Ej1

#Creamos los array multidimensionales:
$matriz = array (array(2,4,6), array(8,10,12), array(14,16,18));

echo "Matriz:"."<br><br>";

#El contador de posiciones del array:

$arrlength=count($matriz);

#Creamos la tabla con 2 for:

echo "<table>";
for ($fila = 0; $fila < $arrlength; $fila++) {
  echo "<tr>";
  for ($col = 0; $col < 3; $col++) {
    echo "<td>".$matriz[$fila][$col]."</td>";
  }
  echo "</tr>";
}
echo "</table>";

?>
</BODY>
</HTML>
