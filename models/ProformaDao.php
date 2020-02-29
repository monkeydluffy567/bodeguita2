<?php
include_once 'AbstractCrud.php';
include_once 'Proforma.php';
class ProformaDao extends AbstractCrud
{
    public function createUpdate(Proforma $objeto)
    {
       
        $id_usuario=$objeto->getId_usuario();
        $total=$objeto->getTotal();
        $this->query="CALL sp_proforma_insert($id_usuario,$total)";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    
    }
    public function read()
    {
        $this->query="CALL sp_proforma_listar()";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function delete($id)
    {
    }
    
    public function buscarProforma($id){
        $this->query="CALL sp_proforma_buscar($id)";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
}
