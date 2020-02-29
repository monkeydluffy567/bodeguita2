<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    if (isset($_POST['actualizar'])) {
        
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle = new DetalleUsuarioPrivilegioDao;
        $privilegio = $detalle->getPrivilegios($id_usuario);
        include_once('../models/UsuarioDao.php');
        $usuarioDao = new UsuarioDao;
        $data1 = $usuarioDao->getUsuario($id_usuario);
        $_SESSION['id_usuario'] = $id_usuario;
        include_once('../view/facade_vista.php');
        $facade = new facade_vista();
        $facade->crear_form3('form_usuario_actualizar', $privilegio, $data1);
    } else if (isset($_POST['cambiar_contrasenia'])) {
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle = new DetalleUsuarioPrivilegioDao;
        $privilegio = $detalle->getPrivilegios($id_usuario);
        include_once('../view/facade_vista.php');
        $facade = new facade_vista();
        $facade->crear_form2('form_usuario_cambiarContrasenia', $privilegio);
    }
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    session_abort();
    session_unset();
    session_destroy();
}
