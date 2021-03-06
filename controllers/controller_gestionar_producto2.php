<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    if (isset($_POST['buscar'])) {
        $criterio=$_POST['producto'];
        
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle=new DetalleUsuarioPrivilegioDao;
        $privilegio=$detalle->getPrivilegios($id_usuario);
        include_once('../models/ProductoDao.php');
        $productoDao=new ProductoDao;
        $data=$productoDao->buscarProducto($criterio);
        include_once('../view/facade_vista.php');
        $facade=new facade_vista();
        $facade->crear_form3('form_gestionar_productos',$privilegio,$data);

    } else if (isset($_POST['agregar'])) {
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle=new DetalleUsuarioPrivilegioDao;
        $privilegio=$detalle->getPrivilegios($id_usuario);
        include_once('../view/facade_vista.php');
        $facade=new facade_vista();
        $facade->crear_form2('form_producto_agregar',$privilegio);

    }
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}