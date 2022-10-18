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
    <link rel="stylesheet" type="text/css" href="estilos-css/Estilos-Miscursos.css" />
    <link rel="stylesheet" type="text/css" href="estilos-css/Estilo-Menu-Cuerpo.css" />

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
       if(!empty ($_SESSION['dniprofesor']))  {
            $id=$_SESSION['dniprofesor'];
        ?>
        <div class="imagen-Profe"><br></div>

        <div class="contenedor-central">
            <h3 class="txt-contenedor-central">Evaluar mis cursos</h3>
        </div>
        <div class="linea-central"></div>

        <div class="Contenedor-cursos">
                <?php
                $conexion=ConecxionBBDD ();
                if($conexion == false){
                    mysqli_connect_errno();
                }
                else{
                    //Realizamos la consulta a la bbdd para mostrar todos los datos de la tabla empleados
                    $sql = "SELECT * FROM cursos WHERE profesor= '$id'";
                    $consulta = mysqli_query($conexion, $sql);

                    if ($consulta == false){
                        mysqli_error($conexion); 
                    }
                    else{
                        generarTablaEvaluaciones($consulta);
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