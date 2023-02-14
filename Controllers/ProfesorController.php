<?php

    class ProfesorController{

        public function registrar(){
            if(isset($_SESSION['Administrador'])){
                if(isset($_POST['dni'])){
                    require_once "models/profesor.php";
                    $curso = new Profesor();
                    if($curso->validar($_POST['dni'])){
                        foreach($_POST as $clave => $valor){
                           $set = "set".$clave;
                           $curso->$set($valor);
                        }
                        $archivo = $_FILES['foto']['name'];
                        if (isset($archivo) && $archivo != "") {
                            $tipo = $_FILES['foto']['type'];
                            $tamano = $_FILES['foto']['size'];
                            $temp = $_FILES['foto']['tmp_name'];
                             
                            if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                                - Se permiten archivos .jpg, .png. y de 200 kb como máximo.</b><br>Por favor Vuelva a registrarse</div>';
                                echo "<meta http-equiv=REFRESH content=2,URL=index.php?controller=Curso&action=registrar>";
                            }else{
                            
                                if (move_uploaded_file($temp, "resources/views/css/assets/fotos/foto_".$_POST['dni'].".jpg")) {
                                    $curso->setFoto("resources/views/css/assets/fotos/foto_".$_POST['dni'].".jpg");
                                    $curso->insertar();
                                    $lista = $curso->profesores();
                                    require_once "resources/views/curso/lista.php";
                                }else{
                                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                                    echo "Por favor vuelva a registrarse..";
                                    require_once "resources/views/curso/registro.php";
                                }
                            }
                        }
                    }else{
                        echo "<script>alert('El dni ".$_POST['dni']." ya esta Registrado')</script>";
                        require_once "resources/views/curso/registro.php";
                    }
                }else{
                    require_once "models/profesor.php";
                    $profesor = new Profesor();
                    $listaProfesores = $profesor->profesores();
                    require_once "resources/views/curso/registro.php";
                }

            }else{
                ?>
                    <script>window.location.replace("index.php");</script>
                <?php
            }
        }
        public function listado(){
            if(isset($_SESSION['Administrador'])){
                require_once "models/profesor.php";
                $producto = new Profesor();
                $lista = $producto->profesores();
                require_once "resources/views/profesor/lista.php";
            }else{
                ?>
                    <script>window.location.replace("index.php");</script>
                <?php
            } 
        }

        //Funcion para editar el Curso
        public function editar(){
            if(isset($_SESSION['Administrador'])){
                if(isset($_GET['dni'])){
                    require_once "models/profesor.php";
                    $profesor = New Profesor();
                    $profesor->setDni($_GET['dni']);
                    $lista = $profesor->profesores();
                    require_once "resources/views/profesor/editar.php";
                }elseif(isset($_POST['dni'])){
                    require_once "models/profesor.php";
                    $profesor = new Profesor();
                    foreach($_POST as $clave => $valor){
                        $set = "set".$clave;
                        $profesor->$set($valor);
                    }
                    $profesor->editar();
                    $lista = $profesor->profesores();
                    require_once "resources/views/profesor/lista.php";
                }else{
                    require_once "models/profesor.php";
                    echo "El Profesor ".$_GET['dni']." No existe";
                    $lista = $profesor->profesores();
                    require_once "resources/views/profesor/lista.php";
                }
            }else{
                ?>
                <script>window.location.replace("index.php");</script>
                <?php
            }
        }


        public function activar(){
            if(isset($_SESSION['Administrador'])){
                if(isset($_GET['dni'])){
                    require_once "models/profesor.php";
                    $curso = new Profesor();
                    $curso->setDni($_GET['dni']);
                    $activo = $curso->obtenerActivo();
                    if($activo[0]->activo == 0){
                        $curso->setActivo('1');
                    }else{
                        $curso->setActivo('0');
                    }
                    $curso->activar();
                    ?>
                    <script>window.location.replace("index.php?controller=Profesor&action=listado");</script>
                    <?php
                }else{
                    require_once "resources/views/profesor/lista.php";
                }
            }else{
                ?>
                <script>window.location.replace("index.php");</script>
                <?php
            }
        }

         //Funcion para editar la imagen del producto
         public function editarImagen(){
            if(isset($_SESSION['Administrador'])){//Validamos que accede el administrador
                if(isset($_POST['dni'])){//Validaos que tengamos un formulario rellenado
                    require_once "models/profesor.php";
                    $profesor = new Profesor();
                    //Recogemos el archivo enviado por el formulario
                    $archivo = $_FILES['imagen']['name'];
                    //Si el archivo contiene algo y es diferente de vacio
                    if (isset($archivo) && $archivo != "") {
                        //Obtenemos algunos datos necesarios sobre el archivo
                        $tipo = $_FILES['imagen']['type'];
                        $tamano = $_FILES['imagen']['size'];
                        $temp = $_FILES['imagen']['tmp_name'];
                        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                        if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                            echo "<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .jpg, .png. y de 200 kb como máximo.</b><br>Por favor Vuelva a registrarse</div>";
                            
                        }else{
                            //Si la imagen es correcta en tamaño y tipo
                            //Se intenta subir al servidor C:\xampp\htdocs\tiendaonline\views\css\assets\fotos
                            if (move_uploaded_file($temp, "resources/views/css/assets/fotos/foto_".$_POST['dni'].".jpg")) {
                                $profesor->setFoto("resources/views/css/assets/fotos/foto_".$_POST['dni'].".jpg");
                                $profesor->setDni($_POST['dni']);
                                $profesor->editarImagen();
                                $lista = $profesor->profesores();
                                require_once "resources/views/profesor/lista.php";
                            }else{
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                echo "<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>";
                                echo "Por favor vuelva a Editar la imagen..";
                                require_once "resources/views/profesor/editarImagen.php";
                            }
                        }
                    }

                }elseif(isset($_GET['dni'])){
                    require_once "models/profesor.php";
                    $profesor = new Profesor();
                    $profesor ->setDni($_GET['dni']);
                    $lista = $profesor->profesores();
                    require_once "resources/views/profesor/editarImagen.php";
                }
                else{
                    require_once "models/profesor.php";
                    $profesor = new Profesor();
                    $lista = $profesor->profesores();
                    require_once "resources/views/profesor/lista.php";
                }
            }else{
                ?>
                <script>window.location.replace("index.php");</script>
                <?php
            }
        }
        
        public function editarPerfil(){
            if(isset($_SESSION['Profesor'])){
                if(isset($_GET['dni'])){
                     require_once "models/profesor.php";
                     $profesor = new Profesor();
                     $lista = $profesor->mostrarDatos();
                     require_once "resources/views/profesor/editarPerfil.php";
                 }elseif(isset($_POST['dni'])){
                     require_once "models/profesor.php";
                     $profesor = new Profesor();
                     foreach($_POST as $clave => $valor){
                         $set = "set".$clave;
                         $profesor->$set($valor);
                      }
                     $profesor->editarPerfil();
                     $lista = $profesor->mostrarDatos();
                     require_once "resources/views/profesor/editarPerfil.php";
                 }else{
                     echo "El usuario no existe";
                     require_once "resources/views/alumno/login.php";
                 }
            }else {
                ?>
                <script>window.location.replace("index.php");</script>
                <?php
            }
        }

        public function evaluarMisCursos(){
            if(isset($_SESSION['Profesor'])){
                require_once "models/curso.php";
                $producto = new Curso();
                $producto->setProfesor($_SESSION['Profesor']->dni);
                $lista = $producto->listadoMisCursos();

                require_once "resources/views/profesor/evaluarMisCursos.php";

            }else{
                ?>
                    <script>window.location.replace("index.php");</script>
                <?php
            }
        }
}