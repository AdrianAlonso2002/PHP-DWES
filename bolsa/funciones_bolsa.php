<?php

function mostrarPantalla($ubi){
    $myfile=file($ubi);
    foreach($myfile as $lin){
        echo"<pre>";
        echo($lin);
        echo"</pre>";
    }
}

?>
