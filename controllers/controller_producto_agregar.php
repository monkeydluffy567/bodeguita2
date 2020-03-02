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
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $stock=$_POST['stock'];
        $fecha_nacimiento=$_POST['fecha_nacimiento'];
        $tamanio=$_POST['tamaño'];
        $color=$_POST['color'];
        $subtipo=$_POST['subtipo'];
        $marca=$_POST['marca'];
        $unidad=$_POST['unidad'];
        $productoDao->agregarProducto($nombre,$precio,$stock,$fecha_nacimiento,$tamanio,$color,$subtipo,$marca,$unidad);
        include_once('../models/ProductoDao.php');
        $productoDao2=new ProductoDao;
        $data=$productoDao2->read();
        
        print('<script languaje="JavaScript">alert("producto agregado");</script>');
        print('<a href="./controller_gestionar_producto.php">volver</a>');
         
        
        
    } 
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}