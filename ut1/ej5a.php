<HTML>
<HEAD><TITLE> EJ5A – Definir tres arrays con los siguientes valores relativos </TITLE></HEAD>
<style>
</style>
<BODY>
<?php

#Ej5

#Creamos los array.
$daw1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
$daw2 = array("Sistemas Informáticos","FOL","Mecanizado");
$daw3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");

#Los juntamos todos.
$res1 = [$daw1, $daw2, $daw3];

#Mostramos el resultado con print_r:
echo "Los 3 arrays juntos con un bucle: "."<br>";

print_r($res1); //Al juntarlo así, se crea un array multidimensional ya que contiene un array en el array.

echo "<br><br>"."Con array_merge: "."<br><br>";

#Utilizamos array_merge():
$res2 = array_merge($daw1, $daw2, $daw3);

#Mostramos el resultado con print_r:
print_r($res2); //De esta forma, se añade en un solo array todo.

echo "<br><br>"."Con array_push: "."<br><br>";

#Utilizamos array_push():
array_push($daw1, "Sistemas Informáticos","FOL","Mecanizado", "Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");

#Mostramos el resultado con print_r:
print_r($daw1); //Cambia un array y emppuja a cambiarlo metiendole lo de los demás.
  
?>
</BODY>
</HTML>
