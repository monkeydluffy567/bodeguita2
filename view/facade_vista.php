<?php
include_once 'singleton_encabezado_login.php';
include_once 'singleton_encabezado.php';
include_once 'singleton_pie.php';
include_once 'singleton_panel_usuario.php';
include_once ("form_abstract_factory.php");
class facade_vista
{
    public function crear_form($tipo){
        singleton_encabezado_login::getInstance($tipo);
        $objeto=new form_abstract_factory($tipo);
        singleton_pie::getInstance();
        
    }
    public function crear_form2($tipo,$privilegios){
        singleton_encabezado::getInstance("$tipo");
        singleton_panel_usuario::getInstance($privilegios);
        $objeto=new form_abstract_factory($tipo);
        singleton_pie::getInstance();

    }
    public function crear_form3($tipo,$privilegios,$data=null){
        singleton_encabezado::getInstance("$tipo");
        singleton_panel_usuario::getInstance($privilegios);
        $objeto=new form_abstract_factory($tipo,$data);
        singleton_pie::getInstance();

    }
    public function crear_form4($tipo,$estado){
        singleton_encabezado::getInstance($tipo);
        $objeto=new form_abstract_factory($tipo,$estado);
        singleton_pie::getInstance();
    }
    
}
