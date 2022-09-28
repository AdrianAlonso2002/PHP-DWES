<HTML>
<HEAD><TITLE> EJ3A – Definir un array y almacenar los 20 primeros números binarios </TITLE></HEAD>
<style>
table,tr,td{
	border:1px solid black;
	border-collapse:collapse;
	text-align:center;
}
</style>
<BODY>
<?php

#Ej3

#Creamos el array.
$binario[0] = "0,0";

#Al ser un array indexado, vamos a contar todas las variables que hay dentro.
$arrlength = count($binario);

#Creamos la tabla, pasando por las primeras 20 posiciones con for, y metiendo en ella:
#El indice y su binario y octal.

echo "<table>";
echo "<tr>";
  echo "<td>"."Indice"."</td>";
  echo "<td>"."Binario"."</td>";
  echo "<td>"."Octal"."</td>";
  echo "</tr>";
for($i = 0; $i < 20; $i++) {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$binario[$i]=decbin($i)."</td>";
  echo "<td>".$binario[$i]=decoct($i)."</td>";
  echo "</tr>";
}
echo "</table>"."<br>";

?>
</BODY>
</HTML>
