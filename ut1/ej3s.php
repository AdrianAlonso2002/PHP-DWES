<HTML>
<HEAD><TITLE> EJ3-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

#Ej3

$ip2="192.168.16.100/16";
$ip3="192.168.16.100/21";
$ip4="10.33.15.100/8";

echo  ("IP $ip2")."<br>";

#Buscamos el caracter en el cual se encuentre "/".

$pm=strpos ($ip2,"/",0); //14

#Mostramos la máscara que son los caracteres a la derecha del "/".

$mascara1 = substr($ip2, ($pm)+1, ($pm)); //16

echo "Mascara ","$mascara1"."<br>";

//echo "Direccion Red: ","$dr1"."<br>";
//echo "Direccion Broadcast: ","$db1"."<br>";
//echo "Rango: ","$rn1"."<br>";

echo "<br><br>";

echo  ("IP $ip3")."<br>";

#Mostramos la máscara que son los caracteres a la derecha del "/".

$mascara2 = substr($ip3, ($pm)+1, ($pm)); //21

echo "Mascara ","$mascara2"."<br>";

//echo "Direccion Red: ","$dr2"."<br>";
//echo "Direccion Broadcast: ","$db2"."<br>";
//echo "Rango: ","$rn2"."<br>";

echo "<br><br>";

echo  ("IP $ip4")."<br>";

#Mostramos la máscara que son los caracteres a la derecha del "/".

$mascara2 = substr($ip4, ($pm)+1, ($pm)); //8

echo "Mascara ","$mascara2"."<br>";

//echo "Direccion Red: ","$dr3"."<br>";
//echo "Direccion Broadcast: ","$db3"."<br>";
//echo "Rango: ","$rn3"."<br>";

?>
</BODY>
</HTML>
