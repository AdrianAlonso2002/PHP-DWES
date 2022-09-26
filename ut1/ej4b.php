<HTML>
<HEAD><TITLE>  EJ4B – Tabla Multiplicar </TITLE></HEAD>
<BODY>
<?php

#Ej4

$num="8";
$res="";

#Con un for, va multiplicando cada $i con el número y lo va mostrando en la pantalla dentro del bucle.

for ($i=1;$i<=10;$i++){
	$res=$num*$i;
	echo "$num x $i = $res"."<br>";
}

?>
</BODY>
</HTML>
