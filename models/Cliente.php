<?php
class Cliente{
    private $id_cliente ;
    private $nombre ; 
    private $apemat ; 
    private $apepat ; 
    private $fecha_create ; 
    private $fecha_update ; 
    
    
    function __construct() {
        
    }
    function getId_cliente() {
        return $this->id_cliente;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApemat() {
        return $this->apemat;
    }

    function getApepat() {
        return $this->apepat;
    }

    function getFecha_create() {
        return $this->fecha_create;
    }

    function getFecha_update() {
        return $this->fecha_update;
    }

    
    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApemat($apemat) {
        $this->apemat = $apemat;
    }

    function setApepat($apepat) {
        $this->apepat = $apepat;
    }

    function setFecha_create($fecha_create) {
        $this->fecha_create = $fecha_create;
    }

    function setFecha_update($fecha_update) {
        $this->fecha_update = $fecha_update;
    }

    

}