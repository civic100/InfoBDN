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
    <title>Indice</title>

</head>
    <body>
        <header class="header-menu">
            <?php
                Generarmenu();
            ?>
        </header>

        <?php
        if(!empty ($_SESSION['admin']))  {
    
            if(!empty($_POST['nom'])){
                $NombreCurso = $_POST['nom'];
                $Descripcion = $_POST['descripcio'];
                $duracion = $_POST['horadurada'];
                $fechaincio = $_POST['datainici'];
                $fechafin = $_POST['datafi'];
                $profesor = $_POST['select1'];
                $fecha1=strtotime($fechaincio);
                $fecha2=strtotime($fechafin);
                if($fecha1 < $fecha2){
                    if (is_uploaded_file ($_FILES['imagen']['tmp_name'])){
                        $nombreDirectorio = "img/";
                        $idUnico = time();
                        $nombreFichero = $idUnico . "-" .
                        $_FILES['imagen']['name'];
                        $directorio= $nombreDirectorio . $nombreFichero;
                        move_uploaded_file ($_FILES['imagen']['tmp_name'], $nombreDirectorio . $nombreFichero);
                        $tamano = $_FILES['imagen']['size'];
                        $tipo = $_FILES['imagen']['type'];
                    }

                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/> - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                        ?>
                            <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=AñadirCurso.php"/>
                        <?php 
                    }else{
                        $conexion=ConecxionBBDD ();
                        if($conexion == false){
                            mysqli_connect_errno();
                        }else{
                            AñadirCurso($conexion,$NombreCurso,$Descripcion,$duracion,$fechaincio, $fechafin ,$profesor, $directorio); 
                        }   
                    }

                }else{
                    echo "La fecha final no puede ser menor a la fecha de inicio"
                    ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=AñadirCurso.php"/>
                    <?php 
                }
            }else{

            ?>
            <div class="Contenedor-Tabla">
                <h2> Añadir Curso </h2>
                <form name="formulariAdmin" method="POST" enctype="multipart/form-data" action="#" >
            
                    <label for="nom">
                        Nombre del Curso:
                    </label >
                        <input type="text"  maxlength="15" id = "nom" name="nom" required /><br>

                    <label for="descripcio">
                        Descripcion del Curso:
                    </label >
                        <input type="text"  maxlength="40" id = "descripcio" name="descripcio" required /><br>

                    <label for="horadurada">
                        Hora durada del curs:   
                    </label >
                        <input type="int"  name="horadurada" maxlength="15" id = "horadurada" required/><br>

                    <label for="datainici">
                        Data de inici del Curso:
                    </label >
                        <input type="date"  maxlength="15" id = "datainici" name="datainici" required /><br>

                    <label for="datafi">
                        Data de fi del Curso:
                    </label >
                        <input type="date"  maxlength="15" id = "datafi" name="datafi" required /><br>
                            
                    <label for="profesor">
                        Nombre del Profesor:
                    </label >
                        <?php
                            $conexion=ConecxionBBDD ();
                            if($conexion == false){
                                mysqli_connect_errno();
                            }else{
                                $sql='SELECT * FROM profesores';
                                $consulta = mysqli_query($conexion, $sql);
                                ?>
                                    <select name='select1' id = 'select1'>"
                                <?php
                                    while($fila=mysqli_fetch_array($consulta)){
                                        echo "<option value='".$fila['dni']."'>".$fila['nombre']."</option>";
                                    }
                                ?> 
                                    </select>
                                <?php
                                }
                            ?>
                            <br>
                            <?php
                        ?>
                    <label for="imagen">
                        Añadir Foto:
                        </label >
                            <input name="imagen" type="file" required accept=".png .jpg .jpeg"/>
                            <br>
                    <input type="submit" name="subir" value="Aceptar"/>
                </form>
                <a href='CursosAdmin.php'>Editar los Cursos</a><br>
        
            <?php
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