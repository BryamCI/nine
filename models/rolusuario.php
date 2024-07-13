<?php
class RolUsuario {
    private $idrolUsuario;
    private $nombreRol;

    public function __construct($idrolUsuario, $nombreRol) {
        $this->idrolUsuario = $idrolUsuario;
        $this->nombreRol = $nombreRol;
    }

    public function getIdrolUsuario() {
        return $this->idrolUsuario;
    }

    public function getNombreRol() {
        return $this->nombreRol;
    }

    public function setIdrolUsuario($idrolUsuario) {
        $this->idrolUsuario = $idrolUsuario;
    }

    public function setNombreRol($nombreRol) {
        $this->nombreRol = $nombreRol;
    }
}
?>
