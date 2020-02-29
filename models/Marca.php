<?php
class Marca{
    private $id_marca ;
    private $marca ;
    private $descripcion;
    
    
    function __construct() {
        
    }
    function getId_marca() {
        return $this->id_marca;
    }

    function getMarca() {
        return $this->marca;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_marca($id_marca) {
        $this->id_marca = $id_marca;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}