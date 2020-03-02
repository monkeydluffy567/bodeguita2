
<?php
include_once("form_login.php");
include_once("form_emitir_boleta.php");
include_once("form_emitir_consolidado_cierre_caja.php");
include_once("form_emitir_proforma.php");
include_once("form_gestionar_productos.php");
include_once("form_gestionar_usuarios.php");
include_once("form_reportes.php");
include_once("form_usuario.php");
include_once("form_bienvenida.php");
include_once("form_usuario_actualizar.php");
include_once("form_usuario_cambiarContrasenia.php");
include_once("form_usuario_agregar.php");
include_once("form_administrador_usuario_actualizar.php");
include_once("form_administrador_actualizar_privilegios.php");
include_once("form_producto_agregar.php");
class form_abstract_factory{
    private $tipo;
	public function form_abstract_factory($tipo,$data=null,$id=null)
	{	
		$this->tipo = $tipo;
		$this->crearFormulario($data,$id);
	}
    
	private  function crearFormulario($data,$id)
    {
        switch($this->tipo) {
            case 'form_login':
                return new form_login($data);
            case 'form_emitir_boleta':
                return new form_emitir_boleta();
            case 'form_emitir_consolidado_cierre_caja':
                return new form_emitir_consolidado_cierre_caja();
            case 'form_emitir_proforma':
                return new form_emitir_proforma();       
            case 'form_gestionar_productos':
                return new form_gestionar_productos($data);       
            case 'form_gestionar_usuarios':
                return new form_gestionar_usuarios($data);       
            case 'form_reportes':
                return new form_reportes();
            case 'form_usuario':
                return new form_usuario($data);
            case 'form_bienvenida':
                return new form_bienvenida();
            case 'form_usuario_cambiarContrasenia':
                return new form_usuario_cambiarContrasenia();
            case 'form_usuario_actualizar':
                return new form_usuario_actualizar($data);
            case 'form_usuario_agregar':
                return new form_usuario_agregar();
            case 'form_administrador_usuario_actualizar' :
                return new form_administrador_usuario_actualizar($data);
            case 'form_administrador_actualizar_privilegios':
                return new form_administrador_actualizar_privilegios($data,$id);
            case 'form_producto_agregar':
                return new form_producto_agregar(); 
            default:
                return new Exception("no exite esta figura");
        }
    }
}