<?php

include_once 'AbstractCrud.php';
class DetalleUsuarioPrivilegioDao extends AbstractCrud{
    
    public function createUpdate($objeto){}
	public function read(){}
	
	public function delete($id){}
    public function getPrivilegios($id_usuario){
        $this->query="CALL sp_getPrivilegiosForUsuarios($id_usuario)";
        $this->get_query();
        $data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
			
		}

		return $data;
    }

}