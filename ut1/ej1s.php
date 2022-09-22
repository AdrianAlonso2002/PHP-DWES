<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

#Ej1

$ip="192.18.16.204";

#Con strpos encontramos el carácter ".".

$punto1=strpos ($ip,".",0); //3

$punto2=strpos ($ip,".",($punto1+1)); //6

$punto3=strpos ($ip,".",($punto2+1)); //9

#Con substr va cogiendo cada parte de la ip, sin añadir los puntos.
#Con %08b, mostramos 8 caracteres binarios.

printf("IP $ip en binario es: %08b . %08b . %08b. %08b<br>",(substr($ip,0,$punto1)),
(substr($ip, ($punto1)+1, ($punto2-$punto1))),
(substr($ip, ($punto2)+1, ($punto3-$punto2))),
(substr($ip, ($punto3)+1, ($punto3))));

//11000000 . 00010010 . 00010000. 11001100

?>
</BODY>
</HTML>
