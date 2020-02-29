<?php
include_once 'AbstractCrud.php';
class UnidadDao extends AbstractCrud{
    
    public function createUpdate($objeto){}
	public function read(){
        $this->query="CALL sp_unidad_listar()";
    }
	
	public function delete($id){}
}

