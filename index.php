<?php
include_once ("./view/facade_vista.php");

$objeto=new facade_vista;

$objeto->crear_form('form_login');

// include_once("./models/Usuario.php");

// $usuario=new Usuario;
// $usuario->setId_usuario(0);
// $usuario->setNombre("gabriel");
// $usuario->setPassword("gabriel");
// $usuario->setApepat("champi");
// $usuario->setApemat("bautista");
// $usuario->setEmail("gchampibautista@gmail.com");
// $usuario->setDirreccion("");
// $usuario->setDni("789456000");
// $usuario->setTipo("administrador");
// include_once("./models/UsuarioDao.php");
// $usuarioDao=new UsuarioDao;
// $usuarioDao->createUpdate($usuario);