<?php
include_once 'AbstractCrud.php';
include_once 'Usuario.php';
class UsuarioDao extends AbstractCrud
{

    public function __construct()
    {
    }

    public function createUpdate($objetoUsuario)
    {

        $id_usuario = $objetoUsuario->getId_usuario();
        $email = $objetoUsuario->getEmail();
        $password = $objetoUsuario->getPassword();
        $apepat = $objetoUsuario->getApepat();
        $apemat = $objetoUsuario->getApemat();
        $nombre = $objetoUsuario->getNombre();
        $telefono = $objetoUsuario->getTelefono();
        $dni = $objetoUsuario->getDni();
        $dirreccion = $objetoUsuario->getDirreccion();
        
        $tipo = $objetoUsuario->getTipo();

        $pass = password_hash($password, PASSWORD_DEFAULT, array("cost" => 12));

        $this->query = "CALL sp_usuario_create_update($id_usuario,'$email','$pass','$apepat','$apemat','$nombre','$telefono','$dni','$dirreccion',1,'$tipo')";
        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();


        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function delete($id_usuario)
    {
        $this->query = "CALL sp_usuario_cambiar_estado2($id_usuario)";
        $this->set_query();
    }

    public  function read()
    {
        $this->query = "CALL sp_usuario_listar()";
        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();


        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
    public function login($email, $password)
    {
        $this->query = "CALL sp_usuario_get_password('$email')";
        $this->get_query();
        $data = array();
        $data = $this->rows;
        $num_rows = count($this->rows);
        if ($num_rows == 0) {
            return 0;
        } else {
            $pass = $data[0]["password"];
            $estado=$data[0]["estado"];
            if (password_verify($password, $pass)&& $estado==1) {
                return $data[0]["id_usuario"];
            } else {
                return 0;
            }
        }
    }
    public function getUsuario($id_usuario)
    {
        $this->query = "CALL sp_usuario_get_datos($id_usuario)";
        $this->get_query();
        $data = array();


        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
    
    
    public function cambiarContraseña($id_usuario, $antigua, $nueva)
    {
        $this->query = "CALL sp_usuario_obtener_password($id_usuario)";
        $this->get_query();
        $data = array();
        $data = $this->rows;
        $num_rows = count($this->rows);
        if ($num_rows == 0) {
            return 0;
        } else {
            $pass = $data[0]["password"];

            if (password_verify($antigua, $pass)) {

                $new = password_hash($nueva, PASSWORD_DEFAULT, array("cost" => 12));

                UsuarioDao::actualizarContraseña($id_usuario,$new);

                return $data[0]["id_usuario"];
            } else {
                return 0;
            }
        }
    }
    private  function actualizarContraseña($id_usuario,$new){
        $this->query="CAll sp_usuario_cambiar_contrasenia($id_usuario,'$new')";
        $this->set_query();

    }
    public function actualizar_usuario_datos($id_usuario,$nombre,$apepat,$apemat,$telefono,$dirreccion){
        $this->query="CALL sp_usuario_actualizar_datos($id_usuario,'$nombre','$apepat','$apemat','$telefono','$dirreccion')";
        $this->set_query();
    }
    public function buscar_nombre($nombre){
        $this->query="CALL sp_usuario_buscar_por_nombre('$nombre')";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
}
