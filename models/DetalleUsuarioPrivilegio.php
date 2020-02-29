<?php
class DetalleUsuarioPrivilegio{
    private $id_usuario ;
    private $id_privilegio ;
    private $fecha_creacion;
    private $estado;
    function __construct() {
        
    }
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_privilegio() {
        return $this->id_privilegio;
    }

    function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_privilegio($id_privilegio) {
        $this->id_privilegio = $id_privilegio;
    }

    function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}