<HTML>
<HEAD><TITLE> EJ2-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

$ip="192.18.16.204";

$punto1=strpos ($ip,".",0); //3

$punto2=strpos ($ip,".",($punto1+1)); //6

$punto3=strpos ($ip,".",($punto2+1)); //9

echo "<br>";

#Ej2

#convertimos cada parte de la ip en binario.

$bin1 = decbin(substr($ip,0,$punto1));

$bin2 = decbin(substr($ip, ($punto1)+1, ($punto2-$punto1)));

$bin3 = decbin(substr($ip, ($punto2)+1, ($punto3-$punto2)));

$bin4 = decbin(substr($ip, ($punto3)+1, ($punto3)));

#Y la obligamos a que tenga 8 carácteres 0.

$bin1 = substr("00000000",0,8 - strlen($bin1)) . $bin1;
$bin2 = substr("00000000",0,8 - strlen($bin2)) . $bin2;
$bin3 = substr("00000000",0,8 - strlen($bin3)) . $bin3;
$bin4 = substr("00000000",0,8 - strlen($bin4)) . $bin4;

#Lo juntamos todo(si lo hiciesemos todo junto de primeras no funcionaria).

$bin = $bin1.".".$bin2.".".$bin3.".".$bin4;

echo ("IP $ip en binario es: ".$bin); //11000000.00010010.00010000.11001100

?>
</BODY>
</HTML>
