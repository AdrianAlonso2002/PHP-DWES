<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Listado Productos</title>
    </head>
    <body>
	 <p><h1>Productos disponibles ... </h1></p>
        <?php
		    // Solo muestra datos no accede a los mismos
            foreach ($productos as $productos) {
                echo $productos["productName"]."<br/>";
            }
        ?>
    </body>
</html>