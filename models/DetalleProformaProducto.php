<?php

class DetalleProformaProducto {

    private $id_proforma;
    private $id_producto;
    private $cantidad;
    private $subtotal;
    private $fecha_creacion;

    function __construct() {
        
    }

    function getId_proforma() {
        return $this->id_proforma;
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getSubtotal() {
        return $this->subtotal;
    }

    function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    function setId_proforma($id_proforma) {
        $this->id_proforma = $id_proforma;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

}
