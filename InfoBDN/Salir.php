<?php
session_start();

if(!empty ($_SESSION['dni'])){
    session_destroy(); //Se destruye la sesión creada
    ?>
        <!--Nos redirige a la pagina principal. -->
        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Login.php"/>
    <?php

}
else if(!empty ($_SESSION['admin']))  {
    session_destroy(); //Se destruye la sesión creada
    ?>
        <!--Nos redirige a la pagina principal. -->
        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Login.php"/>
    <?php

}
    
else if(!empty ($_SESSION['dniprofesor']))  {
    session_destroy(); //Se destruye la sesión creada
    ?>
        <!--Nos redirige a la pagina principal. -->
        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Login.php"/>
    <?php


}else{
    print("Has d'esta validat per veure aquesta pàgina");
?>
    <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=Login.php"/>
<?php
}
?>
