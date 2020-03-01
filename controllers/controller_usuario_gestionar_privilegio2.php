<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);

    include_once('../models/DetalleUsuarioPrivilegioDao.php');
    $detalle = new DetalleUsuarioPrivilegioDao;
    $privilegio = $detalle->getPrivilegios($id_usuario);

    if (isset($_POST['id_usuario']) && isset($_POST['check_lista'])) {
        $id = $_POST['id_usuario'];
        $privilegios_nuevos = $_POST['check_lista'];

        $objeto = new DetalleUsuarioPrivilegioDao;
        if (isset($_POST['agregar'])) {
            foreach ($privilegios_nuevos as $privilegio_nuevo) {
                $objeto->setPrivilegios($id, $privilegio_nuevo);
            }
            include_once('../view/facade_vista.php');
            include_once('../models/UsuarioDao.php');
            $usuarioDao = new UsuarioDao;
            $data = $usuarioDao->read();
            $facade = new facade_vista;
            $facade->crear_form3("form_gestionar_usuario", $privilegio, $data);
        }
        if (isset($_POST['quitar'])) {
            foreach ($privilegios_nuevos as $privilegio_nuevo) {
                $objeto->deletePrivilegiosAdmin($id, $privilegio_nuevo);
            }
            include_once('../view/facade_vista.php');
            include_once('../models/UsuarioDao.php');
            $usuarioDao = new UsuarioDao;
            $data = $usuarioDao->read();
            $facade = new facade_vista;
            $facade->crear_form3("form_gestionar_usuarios", $privilegio, $data);
        }
    } else {
        include_once('../view/facade_vista.php');
        include_once('../models/UsuarioDao.php');
        $usuarioDao = new UsuarioDao;
        $data = $usuarioDao->read();
        $facade = new facade_vista;
        $facade->crear_form3("form_gestionar_usuarios", $privilegio, $data);
    }
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}
