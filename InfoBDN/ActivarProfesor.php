<?php
session_start();

if(!empty ($_SESSION['admin']))  {

    include("Funciones.php");

    $conexion=ConecxionBBDD ();
    $id = $_GET["CodigoProfesor"]; 

    if ($conexion == false){
        mysqli_connect_error();
    }else{
        ActivarProfesor($id,$conexion);
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=ProfesoresAdmin.php"/>
        <?php
    }



}else{
    print("Has d'esta validat per veure aquesta pàgina");
?>
    <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=Login.php"/>
<?php
}
?>
