<?php
    // Llamamos al fichero database.php
    require_once("database.php");
    // Hacemos que esta class sea hija de Database para poder heredar la conexión.
class Matricula extends Database{

    private $dni_alumno;
    private $curso;
    private $nota;
    private $activo;

    //Generamos los set y get.
    public function getDni_alumno(){
        return $this->dni_alumno;
    }
    public function setDni_alumno($dni_alumno){
        $this->dni_alumno = $dni_alumno;
        return $this;
    }
    public function getCurso(){
        return $this->curso;
    }
    public function setCurso($curso){
        $this->curso = $curso;
        return $this;
    }
    public function getNota(){
        return $this->nota;
    }

    public function setNota($nota){
        $this->nota = $nota;
        return $this;
    }
    public function getActivo(){
        return $this->activo;
    }
    public function setActivo($activo){
        $this->activo = $activo;
        return $this;
    }
    public function listaMisCursos(){
        $sql = "SELECT matricula.*, cursos.* FROM (`alumnos` INNER JOIN `matricula` ON alumnos.dni = matricula.dni_alumno) INNER JOIN `cursos`  ON cursos.codigo = matricula.curso  WHERE matricula.dni_alumno = '".$this->dni_alumno."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }
    public function altaCurso(){
        $sql = "INSERT INTO matricula (`dni_alumno`, `curso`, `nota`, `activo`) VALUES ('".$this->dni_alumno."','".$this->curso."','0','1')";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }
    public function listadoMisCursosNotas(){
        $sql = "SELECT * FROM matricula WHERE curso = '".$this->curso."' AND activo='1' " ;
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);    
    }

    public function ponerNota(){
        $sql="UPDATE `matricula` SET `nota`='".$this->nota."' WHERE curso = '".$this->curso."' AND dni_alumno = '".$this->dni_alumno."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }

    public function matricula(){
        $sql="SELECT * FROM `matricula`  WHERE curso = '".$this->curso."' AND dni_alumno = '".$this->dni_alumno."'";
        $rows = $this->db->query($sql);
        return $rows->fetchAll(PDO::FETCH_CLASS);
    }
}
