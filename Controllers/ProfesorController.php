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



    }