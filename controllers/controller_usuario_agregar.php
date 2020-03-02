<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    if (isset($_POST['agregar'])) {
        if (($_POST['password'] == $_POST['repetir_password'])) {
            include_once('../models/DetalleUsuarioPrivilegioDao.php');
            $detalle = new DetalleUsuarioPrivilegioDao;
            $privilegio = $detalle->getPrivilegios($id_usuario);
            include_once('../models/usuario.php');
            $usuario = new usuario;
            $usuario->setId_usuario(0);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApepat($_POST['apepat']);
            $usuario->setApemat($_POST['apemat']);
            $usuario->setTelefono($_POST['telefono']);
            $usuario->setDni($_POST['dni']);
            $usuario->setDirreccion($_POST['direccion']);
            $usuario->setTipo($_POST['tipo']);
            $usuario->setEstado(1);

            include_once('../models/UsuarioDao.php');
            $usuarioDao = new UsuarioDao;
            $result = $usuarioDao->createUpdate($usuario);
            if ($result[0]['var_status'] == 1) {
                $data=$usuarioDao->read();
                include_once('../view/facade_vista.php');
                $facade = new facade_vista();
                $facade->crear_form3('form_gestionar_usuarios', $privilegio,$data);
            } else {
                print('<script languaje="JavaScript">alert("error al ingresar datos");</script>');
            }
        } else {
            include_once('../models/DetalleUsuarioPrivilegioDao.php');
            $detalle = new DetalleUsuarioPrivilegioDao;
            $privilegio = $detalle->getPrivilegios($id_usuario);
            include_once('../view/facade_vista.php');
            $facade = new facade_vista();
            $facade->crear_form2('form_usuario_agregar', $privilegio);
        }
    } 
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}
