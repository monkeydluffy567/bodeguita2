<?php

require_once 'AbstractCrud.php';
require_once 'Cliente.php';

class ClienteDao extends AbstractCrud {

    protected function createUpdate(Cliente $objeto) {
        $id_cliente = $objeto->getId_cliente();
        $nombre = $objeto->getNombre();
        $apemat = $objeto->getApemat();
        $apepat = $objeto->getApepat();
        $this->query = "CALL sp_cliente_create_update($id_cliente,'$nombre','$apemat','$apepat')";
        $this->set_query();
    }

    protected function delete($id) {
        $this->query = "CALL sp_cliente_cambiar_estado($id)";
        $this->set_query();
    }

    protected function read() {
        $this->query = "CALL sp_cliente_listar()";
        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

}
