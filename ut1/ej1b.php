<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario </TITLE></HEAD>
<BODY>
<?php

#Ej1

$num="10";

$bin="";
$res="";
$div=$num;

#Con el while ira poniendo en $bin todos los números binarios.

while ($div > $res) {
		$res=($div%2);
		$div=(int)($div/2);
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

echo "Número $num en binario es: $bin"."<br>";


?>
</BODY>
</HTML>
