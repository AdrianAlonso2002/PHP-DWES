<?php


// Modelo contiene la lógica de la aplicación: clases y métodos que se comunican
// con la Base de Datos

function obtenerProductos() {

	global $conn;

	try {
		$obtenerInfo = $conn->prepare("select * from products;");
		$obtenerInfo->execute();
		return $obtenerInfo->fetchAll(PDO::FETCH_ASSOC); 

	} catch (PDOException $ex) {
		echo "Error al recuperar productos". $ex->getMessage();
		return null;
	}

}

?>