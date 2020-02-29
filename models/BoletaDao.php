<?php

include_once 'Boleta.php';
include_once 'AbstractCrud.php';

class BoletaDao extends AbstractCrud {

    public function createUpdate(Boleta $objeto) {
        
        $id_proforma = $objeto->getId_proforma();
        $id_cliente = $objeto->getId_cliente();
        $id_usuario = $objeto->getId_usuario();

        $this->query = "CALL sp_boleta_crear($id_proforma,$id_cliente,$id_usuario)";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        if($data[0]['var_flag']==0){
            return 0;
        }else{
            $this->query="CALL sp_boleta_obtener_id_producto($id_proforma)";
            $data2 = array();
            foreach ($this->rows as $key => $value) {
                array_push($data2, $value);
            }
            for ($i=0; $i <count($this->rows) ; $i++) { 
                $this->query="CALL sp_boleta_actualizar_producto($data2[$i]['id_producto'])"; 
            }
        }
        
    }

    public function delete($id) {
        $this->query = "CALL sp_boleta_cambiar_estado($id,0)";
        $this->set_query();
    }

    public function read() {
        $this->query = "CALL sp_boleta_listar()";
        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();


        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
    public function buscarBoletaEspecifica($id){
        $this->query="CALL sp_boleta_buscar($id)";
        $this->get_query();
        $data = array();


        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function buscarBoletasCierreCaja($dia){
        $this->query="CALL sp_boleta_buscar_por_dia('$dia')";
        $this->get_query();
        $data = array();


        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
}
