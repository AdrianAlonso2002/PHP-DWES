<HTML>
<HEAD><TITLE> EJ3-Direccion Red - Broadcast y Rango</TITLE></HEAD>
<BODY>
<?php

#Ej3

$ip2="192.168.16.100/16";
$ip3="192.168.16.100/21";
$ip4="10.33.15.100/8";



//Mostramos la ip:

echo  ("IP $ip2")."<br>";

//Mostrar la máscara de la ip:

#Buscamos el caracter en el cual se encuentre "/".

$pm1=strpos ($ip2,"/",0); //14

#Mostramos la máscara que son los caracteres a la derecha del "/".

$mascara1 = substr($ip2, ($pm1)+1, ($pm1)); //16

echo "Mascara ","$mascara1"."<br>";

//Dirección red de la ip:

#Con strpos encontramos el carácter ".".

$punto1=strpos ($ip2,".",0); //3

$punto2=strpos ($ip2,".",($punto1+1)); //7

$punto3=strpos ($ip2,".",($punto2+1)); //10

#convertimos cada parte de la ip en binario.

$bin1 = decbin(substr($ip2,0,$punto1));

$bin2 = decbin(substr($ip2, ($punto1)+1, ($punto2-$punto1)));

$bin3 = decbin(substr($ip2, ($punto2)+1, ($punto3-$punto2)));

$bin4 = decbin(substr($ip2, ($punto3)+1, ($punto3)));

#Y la obligamos a que tenga 8 carácteres 0.

$bin1 = substr("00000000",0,8 - strlen($bin1)) . $bin1;
$bin2 = substr("00000000",0,8 - strlen($bin2)) . $bin2;
$bin3 = substr("00000000",0,8 - strlen($bin3)) . $bin3;
$bin4 = substr("00000000",0,8 - strlen($bin4)) . $bin4;

#Lo juntamos todo(si lo hiciesemos todo junto de primeras no funcionaria).

$bin = $bin1.".".$bin2.".".$bin3.".".$bin4; //11000000.10101000.00010000.01100100

#El if cambia el número de la máscara para que se seleccionen bien los byts de la ip.

if ($mascara1 > 0 && $mascara1 <= 8) {
	$normas = 8;
	$normas2 = 9;
} elseif ($mascara1 > 8 && $mascara1 <= 16) {
	$normas = 17;
	$normas2 = 18;
} else if ($mascara1 > 16 && $mascara1 < 24) {
	$normas = 26;
	$normas2 = 27;
} else if ($mascara1 > 24) {
	$normas = 35;
	$normas2 = 38;
}

#Dejamos la parte de la ip que no se convierte en 0.

$nor1=substr($bin,0,$normas); //11000000.10101000

#Y esta es la otra parte que vamos a convertir.

$dif1=substr($bin,$normas2,strlen($bin)); //00010000.01100100

#Ahora remplazamos por 0.

$camb1= str_replace(1,0,$dif1); //00000000.00000000

#Y juntamos las dos partes.

$ip_red1="$nor1.$camb1"; //11000000.10101000.00000000.00000000

#La pasamos a decimal.

$dr1=bindec(substr($ip_red1,0,8)).".".
bindec(substr($ip_red1,9,8)).".".
bindec(substr($ip_red1,18,8)).".".
bindec(substr($ip_red1,27,8));

echo "Direccion Red: ","$dr1"."<br>";

//Dirección Broadcast: 

#Convertimos la parte de la ip de la máscara en 1.

$camb2= str_replace(0,1,$dif1); //11111111.11111111

#Juntamos la op.

$ip_bro1="$nor1.$camb2"; //11000000.10101000.11111111.11111111

#Y la pasamos a decimal.

$db1=bindec(substr($ip_bro1,0,8)).".".
bindec(substr($ip_bro1,9,8)).".".
bindec(substr($ip_bro1,18,8)).".".
bindec(substr($ip_bro1,27,8));

echo "Direccion Broadcast: "."$db1"."<br>";

//Rango:

#Convertimos la ip de dirección de radio sumando un 1.

$rar1=bindec(substr($ip_red1,0,8)).".".
bindec(substr($ip_red1,9,8)).".".
bindec(substr($ip_red1,18,8)).".".
(bindec(substr($ip_red1,27,8))+1);

#Convertimos la ip de dirección broadcast restando un 1.

$rab1=bindec(substr($ip_bro1,0,8)).".".
bindec(substr($ip_bro1,9,8)).".".
bindec(substr($ip_bro1,18,8)).".".
(bindec(substr($ip_bro1,27,8))-1);

echo "Rango: "."$rar1"." a "."$rab1"."<br>";

echo "<br><br>";

//IP3:

//Mostramos la ip:

echo  ("IP $ip3")."<br>";

#Mostramos la máscara que son los caracteres a la derecha del "/".

$pm2=strpos ($ip3,"/",0); //14

$mascara2 = substr($ip3, ($pm2)+1, ($pm2)); //21

echo "Mascara ","$mascara2"."<br>";

//Dirección red de la ip:

#Con strpos encontramos el carácter ".".

$punto1=strpos ($ip3,".",0); //3

$punto2=strpos ($ip3,".",($punto1+1)); //7

$punto3=strpos ($ip3,".",($punto2+1)); //10

#convertimos cada parte de la ip en binario.

$bin1 = decbin(substr($ip3,0,$punto1));

$bin2 = decbin(substr($ip3, ($punto1)+1, ($punto2-$punto1)));

$bin3 = decbin(substr($ip3, ($punto2)+1, ($punto3-$punto2)));

$bin4 = decbin(substr($ip3, ($punto3)+1, ($punto3)));

#Y la obligamos a que tenga 8 carácteres 0.

$bin1 = substr("00000000",0,8 - strlen($bin1)) . $bin1;
$bin2 = substr("00000000",0,8 - strlen($bin2)) . $bin2;
$bin3 = substr("00000000",0,8 - strlen($bin3)) . $bin3;
$bin4 = substr("00000000",0,8 - strlen($bin4)) . $bin4;

#Lo juntamos todo(si lo hiciesemos todo junto de primeras no funcionaria).

$bin = $bin1.".".$bin2.".".$bin3.".".$bin4; //11000000.10101000.00010000.01100100

#Dejamos la parte de la ip que no se convierte en 0.

if ($mascara2 > 0 && $mascara2 <= 8) {
	$normas = 8;
	$normas2 = 9;
} elseif ($mascara2 > 8 && $mascara2 <= 16) {
	$normas = 17;
	$normas2 = 18;
} else if ($mascara2 > 16 && $mascara2 < 24) {
	$normas = 26;
	$normas2 = 27;
} else if ($mascara2 > 24) {
	$normas = 35;
	$normas2 = 38;
}

$nor2=substr($bin,0,$normas); //11000000.10101000.00010000

#Y esta es la otra parte que vamos a convertir.

$dif2=substr($bin,$normas2,strlen($bin)); //01100100

#Ahora remplazamos por 0.

$camb3= str_replace(1,0,$dif2); //00000000

#Y juntamos las dos partes.

$ip_red2="$nor2.$camb3"; //11000000.10101000.00010000.00000000

#La pasamos a decimal.

$dr2=bindec(substr($ip_red2,0,8)).".".
bindec(substr($ip_red2,9,8)).".".
bindec(substr($ip_red2,18,8)).".".
bindec(substr($ip_red2,27,8));

echo "Direccion Red: ","$dr2"."<br>";

//Dirección Broadcast: 

#Convertimos la parte de la ip de la máscara en 1.

$camb4= str_replace(0,1,$dif2); //11111111.11111111

#Juntamos la op.

$ip_bro2="$nor2.$camb4"; //11000000.10101000.11111111.11111111

#Y la pasamos a decimal.

$db2=bindec(substr($ip_bro2,0,8)).".".
bindec(substr($ip_bro2,9,8)).".".
bindec(substr($ip_bro2,18,8)).".".
bindec(substr($ip_bro2,27,8));

echo "Direccion Broadcast: "."$db2"."<br>";

//Rango:

#Convertimos la ip de dirección de radio sumando un 1.

$rar2=bindec(substr($ip_red2,0,8)).".".
bindec(substr($ip_red2,9,8)).".".
bindec(substr($ip_red2,18,8)).".".
(bindec(substr($ip_red2,27,8))+1);

#Convertimos la ip de dirección broadcast restando un 1.

$rab2=bindec(substr($ip_bro2,0,8)).".".
bindec(substr($ip_bro2,9,8)).".".
bindec(substr($ip_bro2,18,8)).".".
(bindec(substr($ip_bro2,27,8))-1);

echo "Rango: "."$rar2"." a "."$rab2"."<br>";

echo "<br><br>";

//IP4:

//Mostramos la ip:

echo  ("IP $ip4")."<br>";

#Mostramos la máscara que son los caracteres a la derecha del "/".

$pm3=strpos ($ip4,"/",0); //14

$mascara3 = substr($ip4, ($pm3)+1, ($pm3)); //8

echo "Mascara ","$mascara3"."<br>";

//Dirección red de la ip:

#Con strpos encontramos el carácter ".".

$punto1=strpos ($ip4,".",0); //2

$punto2=strpos ($ip4,".",($punto1+1)); //5

$punto3=strpos ($ip4,".",($punto2+1)); //8

#convertimos cada parte de la ip en binario.

$bin1 = decbin(substr($ip4,0,$punto1));

$bin2 = decbin(substr($ip4, ($punto1)+1, ($punto2-$punto1)));

$bin3 = decbin(substr($ip4, ($punto2)+1, ($punto3-$punto2)));

$bin4 = decbin(substr($ip4, ($punto3)+1, ($punto3)));

#Y la obligamos a que tenga 8 carácteres 0.

$bin1 = substr("00000000",0,8 - strlen($bin1)) . $bin1;
$bin2 = substr("00000000",0,8 - strlen($bin2)) . $bin2;
$bin3 = substr("00000000",0,8 - strlen($bin3)) . $bin3;
$bin4 = substr("00000000",0,8 - strlen($bin4)) . $bin4;

#Lo juntamos todo(si lo hiciesemos todo junto de primeras no funcionaria).

$bin = $bin1.".".$bin2.".".$bin3.".".$bin4; //00001010.00100001.00001111.01100100

#Dejamos la parte de la ip que no se convierte en 0.

if ($mascara3 > 0 && $mascara3 <= 8) {
	$normas = 8;
	$normas2 = 9;
} elseif ($mascara3 > 8 && $mascara3 <= 16) {
	$normas = 17;
	$normas2 = 18;
} else if ($mascara3 > 16 && $mascara3 < 24) {
	$normas = 26;
	$normas2 = 27;
} else if ($mascara3 > 24) {
	$normas = 35;
	$normas2 = 38;
}

$nor2=substr($bin,0,$normas); //00001010

#Y esta es la otra parte que vamos a convertir.

$dif2=substr($bin,$normas2,strlen($bin)); //00100001.00001111.01100100

#Ahora remplazamos por 0.

$camb3= str_replace(1,0,$dif2); //00000000.00000000.00000000

#Y juntamos las dos partes.

$ip_red2="$nor2.$camb3"; //00001010.00000000.00000000.00000000

#La pasamos a decimal.

$dr2=bindec(substr($ip_red2,0,8)).".".
bindec(substr($ip_red2,9,8)).".".
bindec(substr($ip_red2,18,8)).".".
bindec(substr($ip_red2,27,8));

echo "Direccion Red: ","$dr2"."<br>";

//Dirección Broadcast: 

#Convertimos la parte de la ip de la máscara en 1.

$camb4= str_replace(0,1,$dif2); //11111111.11111111.11111111

#Juntamos la op.

$ip_bro2="$nor2.$camb4"; //00001010.11111111.11111111.11111111

#Y la pasamos a decimal.

$db2=bindec(substr($ip_bro2,0,8)).".".
bindec(substr($ip_bro2,9,8)).".".
bindec(substr($ip_bro2,18,8)).".".
bindec(substr($ip_bro2,27,8));

echo "Direccion Broadcast: "."$db2"."<br>";

//Rango:

#Convertimos la ip de dirección de radio sumando un 1.

$rar2=bindec(substr($ip_red2,0,8)).".".
bindec(substr($ip_red2,9,8)).".".
bindec(substr($ip_red2,18,8)).".".
(bindec(substr($ip_red2,27,8))+1);

#Convertimos la ip de dirección broadcast restando un 1.

$rab2=bindec(substr($ip_bro2,0,8)).".".
bindec(substr($ip_bro2,9,8)).".".
bindec(substr($ip_bro2,18,8)).".".
(bindec(substr($ip_bro2,27,8))-1);

echo "Rango: "."$rar2"." a "."$rab2"."<br>";

?>
</BODY>
</HTML>
