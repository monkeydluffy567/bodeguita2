<?php
class Proforma{
    private $id_proforma  ;
    private $fecha_creacion ;
    private $fecha_update;
    private $estado  ;
    private $total;
    
    private $id_usuario ; 
   
    
   
    function __construct() {
        
    }
   
    function getId_proforma() {
        return $this->id_proforma;
    }

    function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    function getFecha_update() {
        return $this->fecha_update;
    }

    function getEstado() {
        return $this->estado;
    }

    function getTotal() {
        return $this->total;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_proforma($id_proforma) {
        $this->id_proforma = $id_proforma;
    }

    function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    function setFecha_update($fecha_update) {
        $this->fecha_update = $fecha_update;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }




}