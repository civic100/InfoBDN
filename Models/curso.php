<?php
    // Llamamos al fichero database.php
    require_once("database.php");
    // Hacemos que esta class sea hija de Database para poder heredar la conexión.
class Curso extends Database{

    private $codigo;
    private $nombre;
    private $descripcion;
    private $horas;
    private $fechainicio;
    private $fechafinal;
    private $profesor;
    private $activo;
    private $foto;
    

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }
    public function getHoras()
    {
        return $this->horas;
    }
    public function setHoras($horas)
    {
        $this->horas = $horas;
        return $this;
    }
    public function getFechainicio()
    {
        return $this->fechainicio;
    }
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;
        return $this;
    }
    public function getFechafinal()
    {
        return $this->fechafinal;
    }
    public function setFechafinal($fechafinal)
    {
        $this->fechafinal = $fechafinal;
        return $this;
    }
    public function getProfesor()
    {
        return $this->profesor;
    }
    public function setProfesor($profesor)
    {
        $this->profesor = $profesor;
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
    public function getFoto()
    {
        return $this->foto;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }
     //FUNCIONES

      
        public function validar($nombre){
            // Consulta
            $sql = "SELECT * FROM cursos where nombre = '".$nombre."'";
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
            $sql = "INSERT INTO cursos () VALUES ('".$this->nombre."')";
            $this->db->query($sql);
            //return $this;   
            return $sql;
        }

        public function eliminar()
        {
            $sql = "DELETE FROM cursos WHERE nombre = '".$this->nombre."'";
            $this->db->query($sql);
            //return $this;
            return $sql;
        }

        public function listadoCursos(){
            $sql = "SELECT * FROM cursos";
            $rows = $this->db->query($sql);
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }
}