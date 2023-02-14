<?php
// Creamos la class.
    class MatriculaController{ 

        public function misCursos(){
            if(isset($_SESSION['Alumno'])){
                require_once "models/matricula.php";
                $matricula = new Matricula();
                $matricula->setDni_alumno($_SESSION['Alumno']->dni);
                $listaMisCursos=$matricula->listaMisCursos();
                
                require_once "resources/views/alumno/misCursos.php";
            }else{
                ?>
                    <script>window.location.replace("index.php");</script>
                <?php
            }
        }
        public function altaCurso(){
            if(isset($_SESSION['Alumno'])){
                require_once "models/matricula.php";
                $matricula = new Matricula();
                $matricula->setDni_alumno($_SESSION['Alumno']->dni);
                $matricula->setCurso($_GET['codigo']);
                $listaMisCursos=$matricula->altaCurso();
                
                require_once "resources/views/alumno/misCursos.php";
            }
         }
    }
   