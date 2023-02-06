<?php
session_start();
include("Funciones.php");
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resources/css/Estilos-Miscursos.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/Estilo-Menu-Cuerpo.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/Estilo-Tablas.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet"> 
   
    <title>Indice</title>
</head>
    <body>
        <header class="header-menu">
            <?php
                Generarmenu();
            ?>
        </header>
        <?php
        if(!empty ($_SESSION['dni']))  {
            $id=$_SESSION['dni'];
        ?>
        <div class="imagen-Profe"><br></div>

        <div class="contenedor-central">
            <h3 class="txt-contenedor-central">Mis Cursos</h3>
        </div>
        <div class="linea-central"></div>

        <div class="Contenedor-Tabla">
                <?php
                $conexion=ConecxionBBDD ();
                if($conexion == false){
                    mysqli_connect_errno();
                }
                else{
                    $sql = "SELECT * FROM matricula WHERE dni_alumno= '$id'";
                    $consulta = mysqli_query($conexion, $sql);

                    if ($consulta== false){
                        mysqli_error($conexion); 
                    }
                    else{
                        GenerarTablaMisCursos($conexion,$consulta);
                    }
                }
            ?>
            </div>
        <?php
        }else{
            print("Has d'esta validat per veure aquesta pàgina");
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=Login.php"/>
        <?php
        }
        ?>
    </body>
</html>