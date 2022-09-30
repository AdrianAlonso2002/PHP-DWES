<HTML>
<HEAD><TITLE> EJ7AM – Definir una matriz que permita almacenar la nota de 10 alumnos en 4 asignaturas
diferentes. </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej7

#Creamos los array multidimensionales:
$matriz = array (array("Paco","","","",""), array("Manuel","","","",""), array("Paola","","","",""), array("Javi","","","",""), array("Adri","","","",""),  array("Nico","","","",""),  array("Maria","","","",""),  array("Raquel","","","",""),  array("Sandra","","","",""),  array("Guille","","","",""));

echo "Matriz con notas y alumnos:"."<br><br>";

#El contador de posiciones de los array:

$arrlength=count($matriz);
$arrlength2=count($matriz[0]);

#Creo un cont para ordenar la matriz.
$contc=1;

#Creamos la tabla con 2 for y mostramos la matriz:
#La matriz tendrá números aleatorios gracias a rand():


for ($fila = 0; $fila < $arrlength; $fila++) {
  for ($col = 0; $col < $arrlength2; $col++) {
	$matriz[$fila][$col+1] = rand(0,10);
    echo "(".$matriz[$fila][$col].")";
	if ($contc!=5) {
		echo "- ";
		$contc++;
}else {
	echo "<br>";
	$contc=1;
}
}
}

echo "<br><br>";

#Inicializamos:

$menmat=array("","","","","");
$mediamat=array("","","","","");
$mediaal=array("","","","","");

#Sacamos la nota más alta de la primera asignatura:
echo "La nota más alta de la primera asignatura es: <br>";
$max=0;
$contm=0;
$maxf=0;
$contf1=0;  //Cada uno de los contf sirven para que cuando alla más alumnos con la nota máxima aparezcan todos.
$contf2=0;
$contf3=0;
$contf4=0;
$contf5=0;
$contf6=0;
$contf7=0;
$contf8=0;
$contf9=0;
$contf10=0;
for($fila=0;$fila<count($matriz);$fila++){
	for($col=1;$col<2;$col++){
		if ($contm==0) {
			$max=$matriz[$fila][$col];
			$cont=1;
		}
		if($cont==1 && $max>$maxf){
			$maxf=$max;
			$contf1=$fila;
			$contf2=0;
			$contf3=0;
			$contf4=0;
			$contf5=0;
			$contf6=0;
			$contf7=0;
			$contf8=0;
			$contf9=0;
			$contf10=0;
			$max=0;
		}
		if ($cont==1 && $max==$maxf){
			$maxf=$max;
			if ($contf1==0){
			$contf1=$fila;	
			}
			if ($contf1!=0 && $contf2==0) {
				$contf2=$fila;
			}
			else
				if ($contf2!=0 && $contf3==0) {
				$contf3=$fila;
			}
			else 
				if ($contf3!=0 && $contf4==0) {
				$contf4=$fila;
			}
			else 
				if ($contf4!=0 && $contf5==0) {
				$contf5=$fila;
			}
			else 
				if ($contf5!=0 && $contf6==0) {
				$contf6=$fila;
			}
			else 
				if ($contf6!=0 && $contf7==0) {
				$contf7=$fila;
			}
			else 
				if ($contf7!=0 && $contf8==0) {
				$contf8=$fila;
			}
			else 
				if ($contf8!=0 && $contf9==0) {
				$contf9=$fila;
			}
			else 
				if ($contf9!=0 && $contf10==0) {
				$contf10=$fila;
			}
			
	} 
	$max=0;
	$contm=0;
}
}
echo " Alumno: ".$matriz[$contf1][0]." = ($maxf) ";

	if ($contf2!=0) {
		echo " Alumno: ".$matriz[$contf2][0]." = ($maxf) ";
	}
	if ($contf3!=0) {
		echo " Alumno: ".$matriz[$contf3][0]." = ($maxf) ";
	}
	if ($contf4!=0) {
		echo " Alumno: ".$matriz[$contf4][0]." = ($maxf) ";
	}
	if ($contf5!=0) {
		echo " Alumno: ".$matriz[$contf5][0]." = ($maxf) ";
	}
	if ($contf6!=0) {
		echo " Alumno: ".$matriz[$contf6][0]." = ($maxf) ";
	}
	if ($contf7!=0) {
		echo " Alumno: ".$matriz[$contf7][0]." = ($maxf) ";
	}
	if ($contf8!=0) {
		echo " Alumno: ".$matriz[$contf8][0]." = ($maxf) ";
	}
	if ($contf9!=0) {
		echo " Alumno: ".$matriz[$contf9][0]." = ($maxf) ";
	}
	if ($contf10!=0) {
		echo " Alumno: ".$matriz[$contf10][0]." = ($maxf) ";
	}

echo "<br><br>";

#Sacamos la nota más baja de la primera asignatura:
echo "La nota más baja de la primera asignatura es: <br>";
$men=100;
$contm=0;
$menf=100;
$contf1=0;
$contf2=0;
$contf3=0;
$contf4=0;
$contf5=0;
$contf6=0;
$contf7=0;
$contf8=0;
$contf9=0;
$contf10=0;
for($fila=0;$fila<count($matriz);$fila++){
	for($col=1;$col<2;$col++){
		if ($contm==0) {
			$men=$matriz[$fila][$col];
			$cont=1;
		}
		if($cont==1 && $men<$menf){
			$menf=$men;
			$contf1=$fila;
			$contf2=0;
			$contf3=0;
			$contf4=0;
			$contf5=0;
			$contf6=0;
			$contf7=0;
			$contf8=0;
			$contf9=0;
			$contf10=0;
			$men=100;
		}
		if ($cont==1 && $men==$menf){
			$menf=$men;
			if ($contf1==0){
			$contf1=$fila;	
			}
			if ($contf1!=0 && $contf2==0) {
				$contf2=$fila;
			}
			else
				if ($contf2!=0 && $contf3==0) {
				$contf3=$fila;
			}
			else 
				if ($contf3!=0 && $contf4==0) {
				$contf4=$fila;
			}
			else 
				if ($contf4!=0 && $contf5==0) {
				$contf5=$fila;
			}
			else 
				if ($contf5!=0 && $contf6==0) {
				$contf6=$fila;
			}
			else 
				if ($contf6!=0 && $contf7==0) {
				$contf7=$fila;
			}
			else 
				if ($contf7!=0 && $contf8==0) {
				$contf8=$fila;
			}
			else 
				if ($contf8!=0 && $contf9==0) {
				$contf9=$fila;
			}
			else 
				if ($contf9!=0 && $contf10==0) {
				$contf10=$fila;
			}
			
	} 
	$men=100;
	$contm=0;
}
}
echo " Alumno: ".$matriz[$contf1][0]." = ($menf) ";

	if ($contf2!=0) {
		echo " Alumno: ".$matriz[$contf2][0]." = ($menf) ";
	}
	if ($contf3!=0) {
		echo " Alumno: ".$matriz[$contf3][0]." = ($menf) ";
	}
	if ($contf4!=0) {
		echo " Alumno: ".$matriz[$contf4][0]." = ($menf) ";
	}
	if ($contf5!=0) {
		echo " Alumno: ".$matriz[$contf5][0]." = ($menf) ";
	}
	if ($contf6!=0) {
		echo " Alumno: ".$matriz[$contf6][0]." = ($menf) ";
	}
	if ($contf7!=0) {
		echo " Alumno: ".$matriz[$contf7][0]." = ($menf) ";
	}
	if ($contf8!=0) {
		echo " Alumno: ".$matriz[$contf8][0]." = ($menf) ";
	}
	if ($contf9!=0) {
		echo " Alumno: ".$matriz[$contf9][0]." = ($menf) ";
	}
	if ($contf10!=0) {
		echo " Alumno: ".$matriz[$contf10][0]." = ($menf) ";
	}

echo "<br><br>";


#Sacamos la nota más alta por alumno:
echo "La nota más alta por alumno es: <br>";
$max=0;
for($fila=0;$fila<count($matriz);$fila++){
	for($col=1;$col<count($matriz[$fila]);$col++){
		if($max<$matriz[$fila][$col]){
			$max=$matriz[$fila][$col];
		}
	}
	$maxmat[$fila]=$max;
	echo " Alumno: ".$matriz[$fila][0]." = ($maxmat[$fila]) ";
	if ($contc!=10) {
		echo " - ";
		$contc++;
	}else {
	$contc=1;
}
	$max=0;
}

echo "<br><br>";

#Sacamos la nota más baja por alumno:
echo "La nota más baja por alumno es: <br>";
$men=100;
$cont=0;
for($fila=0;$fila<count($matriz);$fila++){
	for($col=1;$col<count($matriz[$fila]);$col++){
		if ($cont==0){
			$men=$matriz[$fila][$col];
			$cont=1;
		}
		if($cont==1 && $men>=$matriz[$fila][$col]){
			$men=$matriz[$fila][$col];
		}
	}
	$menmat[$fila]=$men;
	echo " Alumno: ".$matriz[$fila][0]." = ($menmat[$fila]) ";
	if ($contc!=10) {
		echo " - ";
		$contc++;
}else {
	$contc=1;
}
	$men=100;
	$cont=0;
}

echo "<br><br>";

#Sacamos la media por materia:
echo "La media por materia es : <br>";
$med=0;
for($col=1;$col<5;$col++){
 for($fila=0;$fila<count($matriz);$fila++){
		$med=$med+$matriz[$fila][$col];
	}
	$med=$med/10;
	$mediaal[$fila]=round($med,1);
	echo " La $col materia: = ($mediaal[$fila]) ";
	if ($contc!=4) {
		echo " - ";
		$contc++;
}else {
	$contc=1;
}
	$med=0;
}

echo "<br><br>";

#Sacamos la media por alumno:
echo "La media por alumno es : <br>";
$med=0;
for($fila=0;$fila<count($matriz);$fila++){
	for($col=1;$col<5;$col++){
		$med=$med+$matriz[$fila][$col];
	}
	$med=$med/4;
	$mediaal[$fila]=round($med,1);
	echo " Alumno: ".$matriz[$fila][0]." = ($mediaal[$fila]) ";
	if ($contc!=10) {
		echo " - ";
		$contc++;
}else {
	$contc=1;
}
	$med=0;
}

echo "<br><br>";
//He tardado un buen tiempo en perfecionar y terminar este ej la vdad.
?>
</BODY>
</HTML>
