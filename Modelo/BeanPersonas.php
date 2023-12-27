<?php
class BeanPersonas {
    public $nombre ;
    public $apellido;
    public $correo ;
    public $pass;


    public function getnombre() {
        return $this->nombre;
    }

    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getapellido() {
        return $this->apellido;
    }

    public function setapellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getcorreo() {
        return $this->correo;
    }

    public function setcorreo($correo) {
        $this->correo = $correo;
    }

    public function getpass() {
        return $this->pass;
    }

    public function setpass($pass) {
        $this->pass = $pass;
    }
    
}
?>