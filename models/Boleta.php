<?php

class Boleta {

    private $id_boleta;
    private $id_proforma;
    private $codigo_boleta;
    private $fecha_creacion;
    private $fecha_cambio;
    private $total;
    private $estado;
    private $id_cliente;
    private $id_usuario;

    function __construct() {
        
    }

    function getId_boleta() {
        return $this->id_boleta;
    }

    function getId_proforma() {
        return $this->id_proforma;
    }

    function getCodigo_boleta() {
        return $this->codigo_boleta;
    }

    function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    function getFecha_cambio() {
        return $this->fecha_cambio;
    }

    function getTotal() {
        return $this->total;
    }

    function getEstado() {
        return $this->estado;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_boleta($id_boleta) {
        $this->id_boleta = $id_boleta;
    }

    function setId_proforma($id_proforma) {
        $this->id_proforma = $id_proforma;
    }

    function setCodigo_boleta($codigo_boleta) {
        $this->codigo_boleta = $codigo_boleta;
    }

    function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    function setFecha_cambio($fecha_cambio) {
        $this->fecha_cambio = $fecha_cambio;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}
