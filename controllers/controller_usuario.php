<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    include_once('../models/UsuarioDao.php');
    $usuarioDao=new UsuarioDao;
    $data1=$usuarioDao->getUsuario($id_usuario);
    include_once('../models/DetalleUsuarioPrivilegioDao.php');
    $detalle = new DetalleUsuarioPrivilegioDao;
    $privilegio = $detalle->getPrivilegios($id_usuario);
    $_SESSION['id_usuario'] = $id_usuario;
    include_once('../view/facade_vista.php');
    $facade=new facade_vista();
    $facade->crear_form3('form_usuario',$privilegio,$data1);
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
    
}
