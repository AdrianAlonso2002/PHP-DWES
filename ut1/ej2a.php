<HTML>
<HEAD><TITLE> EJ2A – Calcular media pares e impares.. </TITLE></HEAD>
<style>
table,tr,td{
	border:1px solid black;
	border-collapse:collapse;
	text-align:center;
}
</style>
<BODY>
<?php

#Ej2

#Creamos el array.
$impares= array(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39);

#Al ser un array indexado, vamos a contar todas las variables que hay dentro.
$arrlength = count($impares);
$sumapar=0;
$sumaimp=0;
$mediapar=0;
$mediaimp=0;
$contpar=0;
$contimp=0;

#Ahora creamos una tabla en la cual dentro de ella está un for que irá pasando por el array.
#Mostrando su indice, los números impares y la suma de los pares e impares.
#Además de un if que los diferencia.
echo "<table>";
echo "<tr>";
  echo "<td>"."Indice"."</td>";
  echo "<td>"."Valor"."</td>";
  echo "<td>"."Suma Par"."</td>";
  echo "<td>"."Suma Impar"."</td>";
  echo "</tr>";
for($i = 0; $i < $arrlength; $i++) {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$impares[$i]."</td>";
  if ($i%2==0) {
  $sumapar=$impares[$i];
  $contpar++;
  }else {
	 $sumaimp=$impares[$i];
     $contimp++;
  }
  echo "<td>".$sumapar."</td>";
  echo "<td>".$sumaimp."</td>";
  echo "</tr>";
}
echo "</table>"."<br>";

#Mostramos la media:
 echo "La media de las posiciones pares es: ".$mediapar=$sumapar/$contpar."<br>";
 echo "La media de las posiciones pares es: ".$mediaimp=$sumaimp/$contimp."<br>";

?>
</BODY>
</HTML>
