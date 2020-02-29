<?php

class Producto {

    private $id_producto;
    private $id_subtipo;
    private $precio;
    private $stock;
    private $stock_minimo;
    private $stock_maximo;
    private $fecha_vencimiento;
    private $tamaño;
    private $color;
    private $url_imagen;
    private $id_marca;
    private $id_unidad;

    function __construct() {
        
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function getId_subtipo() {
        return $this->id_subtipo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getStock_minimo() {
        return $this->stock_minimo;
    }

    function getStock_maximo() {
        return $this->stock_maximo;
    }

    function getFecha_vencimiento() {
        return $this->fecha_vencimiento;
    }

    function getTamaño() {
        return $this->tamaño;
    }

    function getColor() {
        return $this->color;
    }

    function getUrl_imagen() {
        return $this->url_imagen;
    }

    function getId_marca() {
        return $this->id_marca;
    }

    function getId_unidad() {
        return $this->id_unidad;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setId_subtipo($id_subtipo) {
        $this->id_subtipo = $id_subtipo;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setStock_minimo($stock_minimo) {
        $this->stock_minimo = $stock_minimo;
    }

    function setStock_maximo($stock_maximo) {
        $this->stock_maximo = $stock_maximo;
    }

    function setFecha_vencimiento($fecha_vencimiento) {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    function setTamaño($tamaño) {
        $this->tamaño = $tamaño;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setUrl_imagen($url_imagen) {
        $this->url_imagen = $url_imagen;
    }

    function setId_marca($id_marca) {
        $this->id_marca = $id_marca;
    }

    function setId_unidad($id_unidad) {
        $this->id_unidad = $id_unidad;
    }

}
