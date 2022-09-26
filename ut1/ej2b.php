<HTML>
<HEAD><TITLE> EJ2B – Conversor Decimal a base n </TITLE></HEAD>
<BODY>
<?php

#Ej2

$num="48";
$base="6";

$bin="";
$res="";
$div=$num;

#Con el while ira poniendo en $bin.
#En este caso para cambiar la base la pondremos en la operación de resto y divisor.

while ($div > $res) {
		$res=($div%$base);
		$div=(int)($div/$base);
		$bin="$res$bin";
}

#Este es el último número que se agrega al binario si es distinto de 0 el último.

if($div!=0){
	$bin="$div$bin";
}

#Este if es para que si el binario es menor a 1010, que no le agrege los 0 (>10).

if ($bin > 1010) {
$bin = substr("00000000",0,8 - strlen($bin)) . $bin;
}

echo "Número $num en base $base es: $bin"."<br>";


?>
</BODY>
</HTML>
