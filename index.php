<!--Controlador frontal: fichero que se encarga de cargarlo absolutamente todo -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  type="text/css" media="screen" href="resources/views/css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
        <title>Document</title>
    </head>
    <body>
    
    <script src="resources/views/css/assets/jquery-3.6.2.js"></script>
    <script src="resources/views/css/assets/lockr/lockr.js"></script>
    <script src="resources/views/css/assets/js.js"></script>
    
        <?php 
        require_once "autoload.php";
        //require_once "views/general/cabecera.html";
        
        if(isset($_SESSION["Administrador"])){
            require_once "resources/views/general/menuAdmin.php";
        }elseif(!(isset($_GET['controller']) && isset($_GET['action']))){
            $categorias = new AlumnoController("");
            $categorias->Menu();
        }else if($_GET['action'] != "validarAlumno" && $_GET['action'] != "login" && $_GET['action'] != "registrar" && $_GET['action'] != "validar"){
            $categorias = new AlumnoController("");
            $categorias->Menu();
        }

        if (isset($_GET['controller'])){
            $nombreController = $_GET['controller']."Controller";
        }
        else{
            //Controlador per dedecte
            $nombreController = "AlumnoController";
        }
        if (class_exists($nombreController)){
            $controlador = new $nombreController(); 
            if(isset($_GET['action'])){
                $action = $_GET['action'];
            }
            else{
                $action ="home";
            }
            $controlador->$action();
        }else{
            echo "No existe el controlador";
        }
      
        
        ?>
       
    </body>
    
</html>