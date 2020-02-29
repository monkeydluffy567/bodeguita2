<?php
class Unidad{
    private $id_unidad ;
    private $unidad ;
    private $descripcion;
    
    function __construct() {
        
    }
    function getId_unidad() {
        return $this->id_unidad;
    }

    function getUnidad() {
        return $this->unidad;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_unidad($id_unidad) {
        $this->id_unidad = $id_unidad;
    }

    function setUnidad($unidad) {
        $this->unidad = $unidad;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}