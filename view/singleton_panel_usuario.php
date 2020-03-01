<?php

class singleton_panel_usuario
{
    private $privilegios;

    private static $instance = null;
    private function singleton_panel_usuario($privilegios)
    { ?>

        <div id="navbar" class="sidebar">
            <h2>MENU</h2>
            <ul>
                <?php

                foreach ($privilegios as $privilegio) {
                ?>

                    <?php if ($privilegio['id_privilegio'] == 1) { ?>
                        <li><a href='../controllers/controller_usuario.php'>Usuario</a></li>
                    <?php }  ?>

                    <?php if ($privilegio['id_privilegio'] == 2) { ?>
                        <li><a href='../controllers/controller_emitir_proforma.php'>Emitir Proforma</a></li>
                    <?php }  ?>

                    <?php if ($privilegio['id_privilegio'] == 3) { ?>
                        <li><a href='../controllers/controller_emitir_boleta.php'>Emitir boleta</a></li>
                    <?php }  ?>

                    <?php if ($privilegio['id_privilegio'] == 4) { ?>
                        <li><a href='../controllers/controller_emitir_consolidado.php'>Emitir Consolidado Cierre Caj</a></li>
                    <?php }  ?>

                    <?php if ($privilegio['id_privilegio'] == 5) { ?>
                        <li><a href='../controllers/controller_gestionar_usuario.php'>Gestionar Usuarios</a></li>
                    <?php }  ?>

                    <?php if ($privilegio['id_privilegio'] == 6) { ?>
                        <li><a href='../controllers/controller_gestionar_producto.php'>Gestionar Producto
                            </a></li>
                    <?php }  ?>

                    <?php if ($privilegio['id_privilegio'] == 7) { ?>
                        <li><a href='../controllers/controller_reporte.php'>Reporte</a></li>
                    <?php }  ?>
                    <?php if ($privilegio['id_privilegio'] == 9) { ?>
                        <li><a href='../controllers/controller_logout.php'>Logout</a></li>
                    <?php }  ?>
                   



                <?php }
                ?>


            </ul>

        </div>

<?php }
    
    
    public static function getInstance($privilegio)
    {

        if (self::$instance == null) {
            self::$instance = new singleton_panel_usuario($privilegio);
        } else {
            echo 'El objeto ya existe, no puedes volver a crearlo <br />';
        }

        return self::$instance;
    }
}
