<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_mal = $_SESSION['id_usuario'];
    $id_usuario = htmlspecialchars($id_usuario_mal);
    if(isset($_POST['ok'])){
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle = new DetalleUsuarioPrivilegioDao;
        $privilegio = $detalle->getPrivilegios($id_usuario);
        $antigua=$_POST['contrasenia_antigua'];
        $nueva=$_POST['contrasenia_nueva'];
        $repetir_nueva=$_POST['repetir_contrasenia_nueva'];
        if($nueva!=''&& $repetir_nueva!=''   &&$nueva==$repetir_nueva){
            include_once('../models/UsuarioDao.php');
            $usuarioDao=new UsuarioDao;
            
            $resultado=$usuarioDao->cambiarContraseña($id_usuario,$antigua,$nueva);
            
            print('<script languaje="JavaScript">alert("contraseña ha sido cambiada ");</script>');
            print('<a href="./controller_usuario.php">volver</a>');
        }else{
            print('<script languaje="JavaScript">alert("las contraseñas no son iguales");</script>');
            print('<a href="./controller_usuario.php">volver</a>');
        }


    }else if(isset($_POST['cancelar'])){
        include_once('../models/DetalleUsuarioPrivilegioDao.php');
        $detalle = new DetalleUsuarioPrivilegioDao;
        $privilegio = $detalle->getPrivilegios($id_usuario);
        include_once('../view/facade_vista.php');
        $facade = new facade_vista();
        $facade->crear_form2('form_bienvenida', $privilegio);
    }
    

}else {
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
    
}