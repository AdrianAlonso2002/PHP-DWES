<?php

//Llama al login

require_once("models/login_model.php");

require_once("views/login_view.php");

//Llamada al modelo -- Intermediario entre vista y modelo !!!
require_once("models/productos_model.php");


$productos=obtenerProductos();

//Llamada a la vista -- Intermediario entre vista y modelo !!!
require_once("views/productos_view.php");

?>
