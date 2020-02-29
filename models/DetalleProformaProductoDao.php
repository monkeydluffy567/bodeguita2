<?php
include_once('AbstractCrud.php');
include_once('DetalleProformaProducto.php');
class DetalleProformaProducto extends AbstractCrud{
    public function createUpdate( DetalleProformaProducto $objeto){
        $id_producto=$objeto->getId_producto();
        $id_proforma=$objeto->getId_proforma();
        $cantidad=$objeto->getCantidad();
        
        $this->query="CALL sp_DetalleProformaProducto_insert($id_producto,$id_proforma,$cantidad)";
        $this->set_query();
    }
	public function read(){
        
    }
    public function buscarProductoDeproforma($id_proforma){
        $this->query="CALL sp_DetalleProformaProducto_listar($id_proforma)";
        $this->get_query();
        $data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
			
		}

		return $data;
    }
	
	public function delete($id){
        
        
    }

}