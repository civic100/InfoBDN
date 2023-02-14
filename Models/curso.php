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
            $sql = "INSERT INTO cursos (`codigo`, `nombre`, `descripcion`, `horas`, `fechainicio`, `fechafinal`, `profesor`, `foto`) VALUES (NULL,'".$this->nombre."','".$this->descripcion."','".$this->horas."','".$this->fechainicio."','".$this->fechafinal."','".$this->profesor."','".$this->foto."')";
            $rows = $this->db->query($sql);
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }

        public function eliminar()
        {
            $sql = "DELETE FROM cursos WHERE nombre = '".$this->nombre."'";
            $rows = $this->db->query($sql);
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }

        public function listadoCursos(){
            $sql = "SELECT * FROM cursos where activo='1' ";
            $rows = $this->db->query($sql);
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }
        public function listadoMisCursos(){
            $sql = "SELECT * FROM cursos where activo='1'  and profesor='".$this->profesor."'";
            $rows = $this->db->query($sql);
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }
          //Funcion para saber si el producto esta activado o descativado
        public function obtenerActivo(){
            $sql = "SELECT activo FROM cursos WHERE codigo = '".$this->codigo."'";
            $rows = $this->db->query($sql);
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }

        //Funcion para Activar/desactivar Curso
        public  function activar(){
            $sql = "UPDATE cursos SET activo = '".$this->activo."' WHERE codigo = '".$this->codigo."'";
            $rows = $this->db->query($sql);
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }

        //Funcion para editar un producto
        public function editar(){
            $sql = "UPDATE cursos SET nombre = '".$this->nombre."', descripcion = '".$this->descripcion."', horas = '".$this->horas."', fechainicio =
            '".$this->fechainicio."', fechafinal = '".$this->fechafinal."', profesor ='".$this->profesor."' WHERE codigo = '".$this->codigo."'";
            $rows = $this->db->query($sql);
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }

        //Funcion para editar imagen
        public function editarImagen(){
            $sql = "UPDATE cursos SET foto = '".$this->foto."' WHERE codigo = '".$this->codigo."'";
            $rows = $this->db->query($sql);
            return $rows->fetchAll(PDO::FETCH_CLASS);
        }

        

}