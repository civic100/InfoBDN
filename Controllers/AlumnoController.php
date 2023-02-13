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
                require_once ("resources/views/alumno/login.php?&val1 = '1'");
            }
        } else {
            ?>
            <script>window.location.replace("index.php");</script>
            <?php
        }
    }

    public function registrarAlumno(){
          // Mientras no se pasen los datos del formulario mostraremos el else
        if (isset($_POST["dni"]) && isset($_POST["password"])) {
            require_once("models/alumno.php");
            $validar = new Alumno();

            $validar->SetDni($_POST["dni"]);
            $validar->SetNombre($_POST["nombre"]);
            $validar->setApellido($_POST["apellido"]);
            $validar->setEdad($_POST["edad"]);
            $validar->setFoto($_POST["foto"]);
            $validar->setEmail($_POST["email"]);
            $validar->setContraseña($_POST["contraseña"]);
            
            if ( $validar->registrarAlumno()==1){

                $_SESSION["Alumno"] = $_POST["nombre"];
                $_SESSION["correoAlumno"] = $_POST["correo"];
                ?>
                <script>window.location.replace("index.php?controller=Alumno&action=login");</script>
                <?php

            }else{
                echo "<h1>Correo ya registrado</h1>";
                require_once ("resources/views/alumno/registrar.php");
            }
            //Una vez terminado recoger los datos, validarlos los pasaremos a la vista y dependiendo los datos se mostrará una cosa u otra.
        } else {
            ?>
            <script>window.location.replace("index.php");</script>
            <?php
        }

    }
    public function login(){
        require_once "resources/views/alumno/login.php";
    }
    public function registrar(){
        require_once "resources/views/alumno/registrar.php";
    }

    public function home(){
        require_once "models/curso.php";
        $curso =  new Curso();
        $lista = $curso->listadoCursos();
        require_once "resources/views/alumno/home.php";
    }
}