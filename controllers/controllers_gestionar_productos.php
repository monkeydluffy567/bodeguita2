<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    
    include_once('../models/DetalleUsuarioPrivilegioDao.php');
    $detalle = new DetalleUsuarioPrivilegioDao;
    $privilegio = $detalle->getPrivilegios($id_usuario);
    
    include_once("../models/ProductoDao.php");
    $ProductoDao=new ProductoDao;
    $data=$ProductoDao->read();
    
    include_once('../view/facade_vista.php');
    $facade = new facade_vista();
    $facade->crear_form3('form_gestionar_productos', $privilegio,$data);

}else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}