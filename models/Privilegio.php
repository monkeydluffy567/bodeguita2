<?php
class Privilegio{
    private $id_privilegio ;
    private $nombre ; 
    private $descripcion ;
    

    function __construct() {
        
    }

    function getId_privilegio() {
        return $this->id_privilegio;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    

    function setId_privilegio($id_privilegio) {
        $this->id_privilegio = $id_privilegio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    

}