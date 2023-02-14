<?php 

    class BaseController{

        public static function salir(){
            session_unset();
            session_destroy();
            ?>
            <script>window.location.replace("index.php");</script>
            <?php
        }

        public function listadoProfesores(){
        
            require_once "models/profesor.php";
            $producto = new Profesor();
            $lista = $producto->profesores();
            require_once "resources/views/general/listaProfesores.php";
       
        }
        public function listadoCursos(){
      
            require_once "models/curso.php";
            $producto = new Curso();
            $lista = $producto->listadoCursos();
            require_once "resources/views/general/listaCursos.php";
       
        }
    }
?>