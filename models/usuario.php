<?php
class Usuario {
    private $idUsuario;
    private $nombre;
    private $password;
    private $rol; // Objeto RolUsuario

    public function __construct($idUsuario, $nombre, $password, $rol) {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->rol = $rol;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}
?>
