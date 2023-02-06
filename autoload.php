<?php

function autocargar($nombreClase){
    include "Controllers/$nombreClase.php";
}
spl_autoload_register("autocargar");


?>