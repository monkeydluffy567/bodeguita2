<?php
include_once 'AbstractCrud.php';
include_once 'Marca.php';
class MarcaDao extends AbstractCrud{
    public function createUpdate(Marca $objeto){
        $id_marca=$objeto->getId_marca();
        $marca=$objeto->getMarca();
        $descripcion=$objeto->getDescripcion();
        $this->query="CALL sp_marca_insert_update($id_marca,'$marca','$descripcion')";
        $this->set_query();
    }
	public function read(){
        $this->query="CALL sp_marca_listar()";
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