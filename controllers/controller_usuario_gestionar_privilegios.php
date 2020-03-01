<?php
session_start();
if(isset($_SESSION['id_usuario'])){
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);

    include_once('../models/DetalleUsuarioPrivilegioDao.php');
    $detalle = new DetalleUsuarioPrivilegioDao;
    $privilegio = $detalle->getPrivilegios($id_usuario);

    include_once('../view/facade_vista.php');
    $facade = new facade_vista();
    
    if (isset($_GET['id_usuario'])) {
        
        $id = $_GET['id_usuario'];
        
       
        $facade->crear_form3('form_administrador_actualizar_privilegios', $privilegio, $id,$data);

    }else{
        include_once('../models/UsuarioDao.php');
        $usuarioDao = new UsuarioDao;
        $data = $usuarioDao->read();
        $facade->crear_form3('form_usuario_actualizar', $privilegio, $data);
    }

}else{
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}