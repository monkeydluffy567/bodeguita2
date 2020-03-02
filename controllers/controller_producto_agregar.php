<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    if (isset($_POST['agregar'])) {
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle = new DetalleUsuarioPrivilegioDao;
        $privilegio = $detalle->getPrivilegios($id_usuario);
        
        include_once('../view/facade_vista.php');
        $facade = new facade_vista();

        include_once('../models/ProductoDao.php');
        $productoDao=new ProductoDao;
        $data=$productoDao->read();

        include_once('../models/Producto.php');
        include_once('../models/ProductoDao.php');
        
        $productoDao=new ProductoDao;
        $productoDao->agregarProducto($_POST['nombre'],$_POST['precio'],$_POST['stock'],$_POST['fecha_nacimiento'],$_POST['tamaño'],$_POST['color'],$_POST['subtipo'],$_POST['marca'],$_POST['unidad']);
        include_once('../models/ProductoDao.php');
        $productoDao2=new ProductoDao;
        $data=$productoDao2->read();
        $facade->crear_form3('form_gestionar_productos', $privilegio,$data);
         
        
        
    } else if (isset($_POST['cancelar'])) {
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle = new DetalleUsuarioPrivilegioDao;
        $privilegio = $detalle->getPrivilegios($id_usuario);
        
        include_once('../view/facade_vista.php');
        $facade = new facade_vista();

        include_once('../models/ProductoDao.php');
        $productoDao=new ProductoDao;
        $data=$productoDao->read();
        $facade->crear_form3('form_gestionar_productos', $privilegio,$data);
    }
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}