<?php
class Empleado {
    private $idempleado;
    private $dni;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $nombre;
    private $celular;

    public function __construct($idempleado, $dni, $apellidoPaterno, $apellidoMaterno, $nombre, $celular) {
        $this->idempleado = $idempleado;
        $this->dni = $dni;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->nombre = $nombre;
        $this->celular = $celular;
    }

    public function getIdEmpleado() {
        return $this->idempleado;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }

    public function getApellidoMaterno() {
        return $this->apellidoMaterno;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function setIdEmpleado($idempleado) {
        $this->idempleado = $idempleado;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setApellidoPaterno($apellidoPaterno) {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    public function setApellidoMaterno($apellidoMaterno) {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }
}
?>
