<HTML>
<HEAD><TITLE>  EJ5B – Tabla multiplicar con TD </TITLE></HEAD>
<style>
#Le damos css a la tabla.
table,tr,td{
	border:1px solid black;
	border-collapse:collapse;
}
</style>
<BODY>
<?php

#Ej5

$num="8";
$res="";

#Con un for, va multiplicando cada $i con el número y lo va mostrando en la pantalla dentro del bucle.
#Se va creando la tabla con echo.
	
echo "<table>";
for ($i=1;$i<=10;$i++){
	$res=$num*$i;
	echo "<tr>";
	echo "<td> "."$num x $i"."</td>";
	echo "<td> "."$res"."</td>";
	echo "</tr>";
}
echo "</table>";
?>
</BODY>
</HTML>
