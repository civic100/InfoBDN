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
    <title>Editar Perfil</title>
</head>
</head>
    <body>
        <header class="header-menu">
            <?php
                Generarmenu();
            ?>
        </header>
    <?php
    if(!empty ($_SESSION['dni']))  {

        $conexion=ConecxionBBDD ();
        $id = $_SESSION['dni']; 

        if(!empty($_POST['nom'])){
        $Dni = $_POST['DNI'];
        $Nombre = $_POST['nom'];
        $Apellido = $_POST['Apellido'];
        $Edad = $_POST['Tituloacademico'];
        if($conexion == false){
            mysqli_connect_errno();
        }
        else{
            EditarPerfilAlumno($conexion,$Dni,$Nombre,$Apellido,$Edad);
        }   
        }else{
            $sql = "SELECT * FROM alumnos WHERE dni = '$id'";
            $result=mysqli_query($conexion, $sql);
            while ($row=mysqli_fetch_array($result)){
                ?>
                <div class="Contenedor-Tabla">
                    <h2> Editar Perfil </h2>
                    <form name="formulariAdmin" method="POST" action="#" >
                            <label for="DNI">
                            DNI Profesor:
                            </label >
                                <input type="text"  maxlength="15" id = "DNI" name="DNI" readonly value=" <?php echo $row['dni'];?>" /><br>

                            <label for="nom">
                            Nombre del profesor:
                            </label >
                                <input type="text"  maxlength="15" id = "nom" name="nom" required value=" <?php echo $row['nombre'];?>" /><br>

                            <label for="Apellido">
                            Apellido del profesor:   
                            </label >
                                <input type="int"  name="Apellido" maxlength="15" id = "Apellido" required value=" <?php echo $row['apellido'];?>" /><br>
                         
                            <label for="Edat">
                                Edat:
                            </label> 
                                <input type="number"  name="Edat" id="Edat" min="18" max="50" required value=" <?php echo $row['edad'];?>" /><br>  


                            <input type="submit" name="subir" value="Aceptar"/>
                    </form>
                    <a href='Home.php'>Inicio</a><br>
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