<HTML>
<HEAD><TITLE> EJ1A – Definir un array y almacenar los 20 primeros números impares. </TITLE></HEAD>
<style>
table,tr,td{
	border:1px solid black;
	border-collapse:collapse;
	text-align:center;
}
</style>
<BODY>
<?php

#Ej1

#Creamos el array.
$impares= array(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39);

#Al ser un array indexado, vamos a contar todas las variables que hay dentro.
$arrlength = count($impares);
$suma=0;

#Ahora creamos una tabla en la cual dentro de ella está un for que irá pasando por el array.
#Mostrando su indice, los números impares y la suma de los dos.
echo "<table>";
echo "<tr>";
  echo "<td>"."Indice"."</td>";
  echo "<td>"."Valor"."</td>";
  echo "<td>"."Suma"."</td>";
  echo "</tr>";
for($i = 0; $i < $arrlength; $i++) {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$impares[$i]."</td>";
  echo "<td>".$suma=$impares[$i]+$i."</td>";
  echo "</tr>";
}
echo "</table>";

?>
</BODY>
</HTML>
