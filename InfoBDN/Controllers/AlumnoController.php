<?php
// Creamos la class.
    class AlumnoController{

    //Función para validar el inicio de sesión del Admin
    public function validarAlumno(){
        if (isset($_POST["dni"]) && isset($_POST["password"])) {
            require_once("models/alumno.php"); 
            $validar=new Alumno();
            $validar->setDni($_POST["correo"]);
            $validar->setContraseña($_POST["password"]);
            $validarRow = $validar->validarAlumno();

            $_SESSION["dni"] = $_POST["dni"];
            if (isset($validarRow[0]->nombre)){
                //Una vez validado se genera la session del cliente
                $_SESSION["Alumno"] =$validarRow[0]->nombre;
    
            }else{
                require_once ("views/cliente/login.php?&val1 = '1'");
            }
        } else {
            ?>
            <script>window.location.replace("index.php");</script>
            <?php
        }
    }

    public function login(){
        require_once "views/alumno/login.php";
    }
}