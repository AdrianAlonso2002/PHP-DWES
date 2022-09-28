<HTML>
<HEAD><TITLE> EJ7A – Crear un array asociativo con los nombres de 5 alumnos y la edad de cada uno de
ellos </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej7

#Creamos los array asociativos:
$alumnos = array ("Juan" => 18, "Pedro"=> 25, "Ana"=> 21, "Marta"=> 19, "Adri"=>20);

echo "El array"."<br><br>";

#Mostramos el array con el bucle foreach:
foreach($alumnos as $i => $i_value) {
  echo "Alumno=" . $i . ", Edad=" . $i_value;
  echo "<br>";
}

echo "<br><br>"."Posicion 2: "."<br><br>";

$cont=0;

#Mostramos la 2 posición:
foreach($alumnos as $i => $i_value) {
  if($cont==1){
  echo "Alumno=" . $i . ", Edad=" . $i_value;
  echo "<br>";
  }
  $cont++;
}

echo "<br><br>"."Avanza posiciones: "."<br><br>";

$cont=0;

#Avanzamos una posición:

foreach($alumnos as $i => $i_value) {
  if($cont==2){
  echo "Alumno=" . $i . ", Edad=" . $i_value;
  echo "<br>";
  }
  $cont++;
}

echo "<br><br>"."Última posición: "."<br><br>";

$cont=1;

#Última posición:

foreach($alumnos as $i => $i_value) {
  if($cont==count($alumnos)){
  echo "Alumno=" . $i . ", Edad=" . $i_value;
  echo "<br>";
  }
  $cont++;
}

echo "<br><br>"."Ordenar de menor a mayor: "."<br><br>";

$cont=1;

#Ordenar de menor a mayor:

asort($alumnos);

foreach($alumnos as $i => $i_value) {
  echo "Alumno=" . $i . ", Edad=" . $i_value;
  echo "<br>";
}


?>
</BODY>
</HTML>
