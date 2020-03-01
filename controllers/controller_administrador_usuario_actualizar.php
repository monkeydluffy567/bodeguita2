<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    if (isset($_POST['actualizar'])) {
            
            include_once('../models/DetalleUsuarioPrivilegioDao.php');
            $detalle = new DetalleUsuarioPrivilegioDao;
            $privilegio = $detalle->getPrivilegios($id_usuario);
            $id=$_POST['id'];
            $nombre = $_POST['nombre'];
            $apepat = $_POST['apepat'];
            $apemat = $_POST['apemat'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];

            include_once("../models/UsuarioDao.php");
            $usuarioDao = new UsuarioDao;
            $usuarioDao->actualizar_usuario_datos($id, $nombre, $apepat, $apemat, $telefono, $direccion);

            $data = $usuarioDao->read();
            include_once('../view/facade_vista.php');
            $facade = new facade_vista();
            $facade->crear_form3('form_gestionar_usuarios', $privilegio,$data);
        
    } else if (isset($_POST['cancelar'])) {
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle = new DetalleUsuarioPrivilegioDao;
        $privilegio = $detalle->getPrivilegios($id_usuario);
        include_once('../models/UsuarioDao.php');
        $usuarioDao = new UsuarioDao();
        $data = $usuarioDao->read();
        include_once('../view/facade_vista.php');
        $facade = new facade_vista();
        $facade->crear_form3('form_gestionar_usuarios', $privilegio, $data);
    }
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}
