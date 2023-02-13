<?php

    class CursoController{

        public function registrar(){
            if(isset($_SESSION['Administrador'])){
                if(isset($_POST['nombre'])){
                    require_once "models/curso.php";
                    $curso = new Curso();
                    if($curso->validar($_POST['nombre'])){
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
                            
                                if (move_uploaded_file($temp, "resources/css/assets/fotos/foto_".$_POST['nombre'].".jpg")) {
                                    $curso->setFoto("resources/css/assets/fotos/foto_".$_POST['nombre'].".jpg");
                                    $curso->insertar();
                                    $lista = $curso->listadoCursos();
                                    require_once "resources/views/curso/lista.php";
                                }else{
                                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                                    echo "Por favor vuelva a registrarse..";
                                    require_once "resources/views/curso/registro.php";
                                }
                            }
                        }
                    }else{
                        echo "<script>alert('El codigo ".$_POST['nombre']." ya esta Registrado')</script>";
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
                require_once "models/curso.php";
                $producto = new Curso();
                $lista = $producto->listadoCursos();
                require_once "resources/views/curso/lista.php";
            }else{
                ?>
                    <script>window.location.replace("index.php");</script>
                <?php
            }
            
        }
      

        //Funcion para eliminar el Curso
        public function activar(){
            if(isset($_SESSION['Administrador'])){
                if(isset($_GET['codigo'])){
                    require_once "models/curso.php";
                    $curso = new Curso();
                    $curso->setCodigo($_GET['codigo']);
                    $activo = $curso->obtenerActivo();
                    if($activo[0]->activo == 0){
                        $curso->setActivo('1');
                    }else{
                        $curso->setActivo('0');
                    }
                    $curso->activar();
                    ?>
                    <script>window.location.replace("index.php?controller=Curso&action=listado");</script>
                    <?php
                }else{
                    require_once "resources/views/curso/lista.php";
                }
            }else{
                ?>
                <script>window.location.replace("index.php");</script>
                <?php
            }
        }

        //Funcion para editar el Curso
        public function editar(){
            if(isset($_SESSION['Administrador'])){
                if(isset($_GET['codigo'])){
                    require_once "models/curso.php";
                    require_once "models/profesor.php";
                    $profesor = New Profesor("");
                    $listaProfesores = $profesor->profesores();
                    $curso = New Curso();
                    $curso->setCodigo($_GET['codigo']);
                    $lista = $curso->listadoCursos();
                    require_once "resources/views/curso/editar.php";
                }elseif(isset($_POST['codigo'])){
                    require_once "models/curso.php";
                    $curso = new Curso();
                    foreach($_POST as $clave => $valor){
                        $set = "set".$clave;
                        $curso->$set($valor);
                    }
                    $curso->editar();
                    $lista = $curso->listadoCursos();
                    require_once "resources/views/curso/lista.php";
                }else{
                    require_once "models/curso.php";
                    echo "El Curso ".$_GET['codigo']." No existe";
                    $lista = $curso->listadoCursos();
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
                if(isset($_POST['codigo'])){//Validaos que tengamos un formulario rellenado
                    require_once "models/curso.php";
                    $curso = new Curso();
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
                            if (move_uploaded_file($temp, "resources/views/css/assets/fotos/foto_".$_POST['codigo'].".jpg")) {
                                $curso->setFoto("resources/views/css/assets/fotos/foto_".$_POST['codigo'].".jpg");
                                $curso->setCodigo($_POST['codigo']);
                                $curso->editarImagen();
                                $lista = $curso->listadoCursos();
                                require_once "resources/views/curso/lista.php";
                            }else{
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                echo "<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>";
                                echo "Por favor vuelva a Editar la imagen..";
                                require_once "resources/views/curso/editarImagen.php";
                            }
                        }
                    }

                }elseif(isset($_GET['codigo'])){
                    require_once "models/curso.php";
                    $curso = new Curso();
                    $curso ->setNombre($_GET['codigo']);
                    $lista = $curso->listadoCursos();
                    require_once "resources/views/curso/editarImagen.php";
                }
                else{
                    require_once "models/curso.php";
                    $curso = new Curso();
                    $lista = $curso->listadoCursos();
                    require_once "resources/views/curso/lista.php";
                }
            }else{
                ?>
                <script>window.location.replace("index.php");</script>
                <?php
            }
        }


    }

