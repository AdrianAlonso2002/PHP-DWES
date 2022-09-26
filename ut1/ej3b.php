<HTML>
<HEAD><TITLE>  EJ3B – Conversor Decimal a base 16 </TITLE></HEAD>
<BODY>
<?php

#Ej2

$num="222";
$base="16";

$bin="";
$res="";
$div=$num;

#Con el while ira poniendo en $bin.
#En este caso para cambiar la base la pondremos en la operación de resto y divisor.
#Agregamos un switch para que cuando el resto sea de 10 a 15, ponga una letra.

while ($div > $res) {
		$res=($div%$base);
		
		switch ($res){
		case 10:
			$res="A";
			break;
		
		case 11:
			$res="B";
			break;
		
		case 12:
			$res="C";
			break;
		
		case 13:
			$res="D";
			break;
		
		case 14:
			$res="E";
			break;
		
		case 15:
			$res="F";
			break;
	}
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
