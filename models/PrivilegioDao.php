<?php
require 'Privilegio.php';
class PrivilegioDao extends AbstractCrud{
    
    protected function createUpdate(Privilegio $objetoPrivilegio) {
        
        $id_privilegio=$objetoPrivilegio->getId_privilegio() ;
        $nombre=$objetoPrivilegio->getNombre() ; 
        $descripcion=$objetoPrivilegio->getDescripcion() ;
        
        
        $this->query="CALL sp_privilegio_create_update($id_privilegio,'$nombre','$descripcion')";
        $this->get_query();
        $num_rows = count($this->rows);
		$data = array();

		
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
			
		}

		return $data;
       
    }

    protected function delete($id_privilegio) {
        
    }

    protected function read() {
         $this->query="CALL sp_privilegio_listar()";
        $this->get_query();
        $num_rows = count($this->rows);
		$data = array();

		
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
			
		}

		return $data;
    }

}