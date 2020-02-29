<?php
class Usuario{
    private $id_usuario ;
    private $email ;
    private $password;  
    private $apepat ;
    private $apemat ;
    private $nombre  ;
    private $telefono ;
    private $dni ;
    private $dirreccion;  
    private $fecha_create ; 
    private $update_fecha ; 
    private $estado;
    private $tipo;
            function _ipo_construct() {
        
    }
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getApepat() {
        return $this->apepat;
    }

    function getApemat() {
        return $this->apemat;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDni() {
        return $this->dni;
    }

    function getDirreccion() {
        return $this->dirreccion;
    }

    function getFecha_create() {
        return $this->fecha_create;
    }

    function getUpdate_fecha() {
        return $this->update_fecha;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setApepat($apepat) {
        $this->apepat = $apepat;
    }

    function setApemat($apemat) {
        $this->apemat = $apemat;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setDirreccion($dirreccion) {
        $this->dirreccion = $dirreccion;
    }

    function setFecha_create($fecha_create) {
        $this->fecha_create = $fecha_create;
    }

    function setUpdate_fecha($update_fecha) {
        $this->update_fecha = $update_fecha;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }


}