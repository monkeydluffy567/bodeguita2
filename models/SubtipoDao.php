<?php
include_once 'AbstractCrud.php';
include_once 'Subtipo.php';
class SubtipoDao extends AbstractCrud{
    
	public function read(){
        $this->query="CALL sp_subtipo_listar()";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
    public function readTipo($id_tipo){
        $this->query="CALL sp_subtipo_listar_por_tipo($id_tipo)";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
    }
	
	protected function delete($id){}
    protected function createUpdate(Subtipo $objeto){}

}