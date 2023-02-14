<?php
    // Llamamos al fichero database.php
    require_once("database.php");
    // Hacemos que esta class sea hija de Database para poder heredar la conexión.
class Profesor extends Database{
    private $dni;
    private $nombre;
    private $apellido;
    private $tituloacademico;
    private $foto;
    private $contraseña;
    private $activo;
 
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
    public function getTituloacademico()
    {
        return $this->tituloacademico;
    }
    public function setTituloacademico($tituloacademico)
    {
        $this->tituloacademico = $tituloacademico;
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

    public function profesores(){
        $sql = "SELECT * FROM profesores ";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }

    public function validar($dni){
        // Consulta
        $sql = "SELECT * FROM profesores where dni = '".$dni."'";
        $rows = $this->db->query($sql);
        //return $rows->rowCount();
        if($rows->rowCount() == 0){
            return true;
        }else{
            return false;
        }
    }
    public function insertar()
        {
            $sql = "INSERT INTO profesores (dni, nombre, apellido, titulacion, foto, activo) VALUES ('".$this->dni."','".$this->nombre."','".$this->apellido."','".$this->tituloacademico."','".$this->foto."')";
            $rows = $this->db->query($sql);  
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }

    public function obtenerActivo(){
        $sql = "SELECT activo FROM profesores WHERE dni = '".$this->dni."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }

    public  function activar(){
        $sql = "UPDATE profesores SET activo = '".$this->activo."' WHERE dni = '".$this->dni."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }
      //Funcion para editar un producto
      public function editar(){
        $sql = "UPDATE profesores SET nombre = '".$this->nombre."', apellido = '".$this->apellido."', tituloacademico = '".$this->tituloacademico."'  WHERE dni = '".$this->dni."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }

   //Funcion para editar imagen
    public function editarImagen(){
        $sql = "UPDATE profesores SET foto = '".$this->foto."' WHERE dni = '".$this->dni."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }

    public function validarProfesor(){
        $sql = "SELECT * FROM profesores where dni='".$this->dni."' and contraseña = '".$this->contraseña."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }

    public function mostrarDatos(){
        $sql = "SELECT * FROM profesores where dni= '".$_SESSION["Profesor"]->dni."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }

    public function editarPerfil(){
        $sql = "UPDATE profesores SET nombre='".$this->nombre."', apellido='".$this->apellido."', tituloacademico='".$this->tituloacademico."' where dni = '".$this->dni."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }
    
    
}