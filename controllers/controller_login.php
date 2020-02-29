<?php

session_start();

if (isset($_POST['ingresar'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    include_once('../models/UsuarioDao.php');
    $usuarioDao = new UsuarioDao();
    $resultado = $usuarioDao->login($email, $password);
    if ($resultado > 0  ) {
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle = new DetalleUsuarioPrivilegioDao;
        $privilegio = $detalle->getPrivilegios($resultado);
        $_SESSION['id_usuario'] = $resultado;

        include_once('../view/facade_vista.php');
        $facade = new facade_vista();
        $facade->crear_form2('form_bienvenida', $privilegio);
    } else {
        print('<script languaje="JavaScript">alert("usuario y/o contraseña incorrectas");</script>');
        print('<a href="../index.php">volver al login</a>');
    }
} else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver al login</a>');
    
}
