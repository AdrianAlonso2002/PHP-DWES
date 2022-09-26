<HTML>
<HEAD><TITLE> EJ6B – Factorial </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej6

$num="4";
$cont=$num;
$res="1";
  
#El while va pasando por cada cont y lo va multiplicando para dar el seultado en el $res.

echo "$num!=";
while($cont!="0"){
	echo "$cont";
	$res=$res*$cont;
	$cont--;
	if($cont!="0"){
		echo"x";
	}
}
echo "=$res";

?>
</BODY>
</HTML>
