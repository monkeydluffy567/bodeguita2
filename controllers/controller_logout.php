<?php
session_start();
if(isset($_SESSION['id_usuario'])){
    session_unset();
    session_destroy();
    print('<script languaje="JavaScript">alert("esta saliendo del sistema");</script>');
    
    
    print('<a href="../index.php">salir</a>');
    
}else{
    print('<script languaje="JavaScript">alert("Acceso Denegado");</script>');
    print('<a href="../index.php">volver</a>');
}

