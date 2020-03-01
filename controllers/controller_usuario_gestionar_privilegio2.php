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
        $privilegios_nuevos=$_POST['check_lista'];
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $objeto=new DetalleUsuarioPrivilegioDao;
        foreach ($privilegios_nuevos as $privilegio_nuevo) {
            
            $objeto->setPrivilegios($id,$privilegio_nuevo);
        }

    } else {
    }
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}
