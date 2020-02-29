<?php
class Subtipo{
    private $id_subtipo ;
    private $id_tipo;
    private $nombre ; 
    private $descripcion ;
    
    
    function __construct() {
        
    }
    function getId_subtipo() {
        return $this->id_subtipo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getId_tipo() {
        return $this->id_tipo;
    }

    function setId_subtipo($id_subtipo) {
        $this->id_subtipo = $id_subtipo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }


}