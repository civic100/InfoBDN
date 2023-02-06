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
    public function getDni_alumno()
    {
        return $this->dni_alumno;
    }
    public function setDni_alumno($dni_alumno)
    {
        $this->dni_alumno = $dni_alumno;
        return $this;
    }
    public function getCurso()
    {
        return $this->curso;
    }
    public function setCurso($curso)
    {
        $this->curso = $curso;
        return $this;
    }
    public function getNota()
    {
        return $this->nota;
    }

    public function setNota($nota)
    {
        $this->nota = $nota;
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
    
}
