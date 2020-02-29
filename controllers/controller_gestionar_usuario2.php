<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    if (isset($_POST['buscar'])) {
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle=new DetalleUsuarioPrivilegioDao;
        $privilegio=$detalle->getPrivilegios($id_usuario);
        include_once('../models/UsuarioDao.php');
        $usuarioDao=new UsuarioDao;
        $data=$usuarioDao->buscar_nombre($_POST['usuario']);
        include_once('../view/facade_vista.php');
        $facade=new facade_vista();
        $facade->crear_form3('form_gestionar_usuarios',$privilegio,$data);

    } else if (isset($_POST['agregar'])) {
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle=new DetalleUsuarioPrivilegioDao;
        $privilegio=$detalle->getPrivilegios($id_usuario);
        include_once('../view/facade_vista.php');
        $facade=new facade_vista();
        $facade->crear_form2('form_usuario_agregar',$privilegio);

    }
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}
