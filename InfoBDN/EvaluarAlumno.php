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
    <link rel="stylesheet" type="text/css" href="estilos-css/Estilo-Tablas.css" />
    <link rel="stylesheet" type="text/css" href="estilos-css/Estilo-Menu-Cuerpo.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet"> 
  
    <title>EvaluarAlumno</title>
</head>
    <body>
        <header class="header-menu">
            <?php
                Generarmenu();
            ?>
        </header>
    <?php
    if(!empty ($_SESSION['dniprofesor']))  {

        //Realizamos la conexión a la bbdd 
        $conexion=ConecxionBBDD ();

        $idalumno= $_GET["CodigoAlumno"]; 
        $idcurso=  $_SESSION['curso'];

        if(!empty($_POST['DNI'])){
        $nota = $_POST['nota'];

        if($conexion == false){
            mysqli_connect_errno();
        }

        else{
            AddNota ($conexion, $idalumno,$idcurso, $nota);
        }   
        }else{
            $sql = "SELECT * FROM matricula WHERE dni_alumno = '$idalumno' AND curso = '$idcurso'";
            $result=mysqli_query($conexion, $sql);
            while ($row=mysqli_fetch_array($result)){
                ?>
                <div class="Contenedor-Tabla">
                    <h1>Edir de Cursos</h1>
                    <form name="formulaionotas" method="POST" action="#" >
                        <label for="DNI">
                        DNI alumno:
                        </label >
                            <input type="text"  maxlength="15" id = "DNI" name="DNI" readonly value=" <?php echo $row['dni_alumno'];?>" /><br>

                        <label for="curso">
                        Id del curso:
                        </label >
                            <input type="text"  maxlength="15" id = "curso" name="curso" readonly value=" <?php echo $row['curso'];?>" /><br>

                        <label for="nota">
                        Nota:
                        </label >
                            <input type="number" min="1" max="10" id = "nota" name="nota" required value=" <?php echo $row['nota'];?>" /><br>

                        <input type="submit" name="subir" value="Aceptar"/>
                    </form>
                <?php
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