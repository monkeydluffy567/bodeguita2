
<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    if (isset($_POST['actualizar'])) {
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle = new DetalleUsuarioPrivilegioDao;
        $privilegio = $detalle->getPrivilegios($id_usuario);
        $nombre = $_POST['nombre'];
        $apepat = $_POST['apepat'];
        $apemat = $_POST['apemat'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        include_once("../models/UsuarioDao.php");
        $usuarioDao = new UsuarioDao;
        $usuarioDao->actualizar_usuario_datos($id_usuario, $nombre, $apepat, $apemat, $telefono, $direccion);
        $usuarioDao2 = new UsuarioDao;
        $data1 = $usuarioDao2->getUsuario($id_usuario);
        print('<script languaje="JavaScript">alert("Usuario Actualizado");</script>');
        print('<a href="./controller_usuario.php">volver</a>');
    } 
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}
