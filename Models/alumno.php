<?php
    // Llamamos al fichero database.php
    require_once("database.php");
    // Hacemos que esta class sea hija de Database para poder heredar la conexión.
class Alumno extends Database{

    private $dni;
    private $nombre;
    private $apellido;
    private $edad;
    private $foto;
    private $email;
    private $contraseña;
    private $activo;
    

    //Generamos los set y get.
    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
        return $this;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;
        return $this;
    } 
    public function getFoto()
    {
        return $this->foto;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    public function getContraseña()
    {
        return $this->contraseña;
    }
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
        return $this;
    }
    public function getActivo()
    {
        return $this->activo;
    }
    public function setActivo($activo)
    {
        $this->activo = $activo;
        return $this;
    }
    
    //login
    public function validarAlumno(){
        $sql = "SELECT * FROM alumnos where dni='".$this->dni."' and contraseña = '".$this->contraseña."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }

    //Registrar
    function registrarAlumno(){
        //Controlar que el cliente no este repetido
       $sql = "SELECT * FROM alumnos where  dni= '".$this->dni."'";
       $rows = $this->db->query($sql);
       //Si no lo esta ejecutamos esta parte
       if ($rows->rowCount() == 0){
               $sql1= "INSERT INTO alumnos (dni, nombre, apellido, edad, foto, email, contraseña) 
               VALUES ('".$this->dni."','".$this->nombre."','".$this->apellido."','".$this->edad."','".$this->foto."','".$this->email."','".$this->contraseña."','1')";
               $rows1 = $this->db->query($sql1);
               return  $rows1->rowCount();
       }
       else{return  $rows->rowCount();}
    }

    public function mostrarDatos(){
        $sql = "SELECT * FROM alumnos where dni= '".$_SESSION["Alumno"]->dni."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }

    public function editarPerfil(){
        $sql = "UPDATE alumnos SET nombre='".$this->nombre."', apellido='".$this->apellido."', edad='".$this->edad."' where dni = '".$this->dni."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }
    
}