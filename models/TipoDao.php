<?php
include_once 'AbstractCrud.php';

class TipoDao extends AbstractCrud{
    public function createUpdate($objeto){}
	public function read(){
        $this->query="CALL sp_tipo_listar()";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
	
	public function delete($id){}
}