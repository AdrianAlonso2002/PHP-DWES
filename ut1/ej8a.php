<HTML>
<HEAD><TITLE> EJ8A – Crear un array asociativo con los nombres de 5 alumnos y nota </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej8

#Creamos los array asociativos:
$alumnos = array ("Juan" => 4, "Pedro"=> 6, "Ana"=> 8, "Marta"=> 7, "Adri"=>6);

#Mostrar la mayor nota:

echo "Mayor nota:"."<br><br>";

#Gracias a asort ordenamos de menor a mayor;
#Ahora solo falta ponerse en la posicion del menor y el mayor y mostrarlo.

asort($alumnos);

$cont=1;

foreach($alumnos as $i => $i_value) {
if($cont==count($alumnos)){
  echo "Alumno=" . $i . ", Nota=" . $i_value;
  echo "<br>";
}
$cont++;
}

#Mostrar la menor nota:

echo "<br><br>"."Menor nota:"."<br><br>";

$cont=0;

foreach($alumnos as $i => $i_value) {
if($cont==0){
  echo "Alumno=" . $i . ", Nota=" . $i_value;
  echo "<br>";
}
$cont++;
}

#Mostrar la media de las notas:

echo "<br><br>"."Media de las notas: ";

$cont=0;
$suma=0;
$media=0;

foreach($alumnos as $i => $i_value) {
$cont++;
$suma=$suma+$i_value;
}
$media=$suma/$cont;
echo $media;

?>
</BODY>
</HTML>
