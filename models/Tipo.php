<?php
class Tipo{

    private $id_tipo; 
    private $nombre ;
    private $descripcion;
    
    
    function __construct() {
        
    }
    function getId_tipo() {
        return $this->id_tipo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}