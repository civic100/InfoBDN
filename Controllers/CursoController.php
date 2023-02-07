<?php

    class CursoController{

        public function registrar(){
            if(isset($_SESSION['Administrador'])){//Validamos que accede el administrador
                if(isset($_POST['nombre'])){//Validaos que tengamos un formulario rellenado
                    require_once "models/curso.php";
                    $curso = new Curso();
                    if($curso->validar($_POST['nombre'])){//validamos que no este el libro ya creado
                        foreach($_POST as $clave => $valor){
                           $set = "set".$clave;
                           $curso->$set($valor);
                        }
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
                            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .jpg, .png. y de 200 kb como máximo.</b><br>Por favor Vuelva a registrarse</div>';
                            echo "<meta http-equiv=REFRESH content=2,URL=index.php?controller=curso&action=registrar>";
                        }else{
                            //Si la imagen es correcta en tamaño y tipo
                            //Se intenta subir al servidor C:\xampp\htdocs\tiendaonline\resources/views\css\assets\fotos
                            if (move_uploaded_file($temp, "resources/views/css/assets/fotos/foto_".$_POST['isbn'].".jpg")) {
                                $curso->setFoto("resources/views/css/assets/fotos/foto_".$_POST['isbn'].".jpg");
                                $curso->insertar();
                                $lista = $curso->listadoCursos();
                                require_once "resources/views/curso/lista.php";
                            }else{
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                                echo "Por favor vuelva a registrarse..";
                                require_once "resources/views/curso/registro.php";
                            }
                        }
                    }
                    }else{
                        echo "<script>alert('El ISBN ".$_POST['isbn']." ya esta Registrado')</script>";
                        require_once "resources/views/curso/registro.php";
                    }
                }
            }else{
                ?>
                <script>window.location.replace("index.php");</script>
                <?php
            }
        }


    }