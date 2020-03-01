<?php
include_once 'AbstractCrud.php';
include_once 'Producto.php';
class ProductoDao extends AbstractCrud
{


    public function createUpdate( $objeto)
    {

        $id_producto = $objeto->getId_producto();
        $id_subtipo = $objeto->getId_subtipo();
        $precio = $objeto->getPrecio();
        $stock = $objeto->getStock();
        $stock_minimo = $objeto->getStock_minimo();
        $stock_maximo = $objeto->getStock_maximo();
        $fecha_vencimiento = $objeto->getFecha_vencimiento();
        $tamaño = $objeto->getTamaño();
        $color = $objeto->getColor();
        $url_imagen = $objeto->getUrl_imagen();
        $id_marca = $objeto->getId_marca();
        $id_unidad = $objeto->getId_unidad();

        $this->query = "CALL sp_producto_insert_update($id_producto,$id_subtipo,$precio,$stock,$stock_minimo,$stock_maximo
        ,$fecha_vencimiento,$tamaño,'$color','$url_imagen',$id_marca,$id_unidad)";
        $this->set_query();
    }

    public function delete($id)
    {
    }

    public function read()
    {
        $this->query = "CALL sp_producto_listar()";
        $this->get_query();
        $data=array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    
    }
    public function bulkcreate($array = array())
    {
    }
    public function buscarProducto($criterio){
        $this->query="CALL sp_producto_buscar($criterio)";
        $this->get_query();
        $data=array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
}
