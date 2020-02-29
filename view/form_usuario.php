<?php
include_once 'form_abstract_factory.php';
class form_usuario extends form_abstract_factory
{
    public function form_usuario($data)
    {
?>
        <!-- Begin page content -->

        <div class="container">
            <h3 class="mt-5">Mostrar Datos de Usuario</h3>
            <hr>
            <div class="row">
                <div class="col-12 col-md-12">
                    <!-- Contenido -->
                    <form action="controller_usuario_dos.php" method="post">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">apellido paterno</th>
                                    <th scope="col">apellido materno</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">email</th>
                                    <th scope="col">telefono</th>
                                    <th scope="col">dni</th>
                                    <th scope="col">direccion</th>
                                    <th scope="col">tipo</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row"></th>
                                    <td><?php echo $data[0]['apepat']; ?></td>
                                    <td><?php echo $data[0]['apemat']; ?></td>
                                    <td><?php echo $data[0]['nombre']; ?></td>
                                    <td><?php echo $data[0]['email']; ?></td>
                                    <td><?php echo $data[0]['telefono']; ?></td>
                                    <td><?php echo $data[0]['dni']; ?></td>
                                    <td><?php echo $data[0]['dirreccion']; ?></td>
                                    <td><?php echo $data[0]['tipo']; ?></td>
                                </tr>
                                <?php

                                ?>
                            </tbody>
                        </table>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" name="actualizar">
                                actualizar
                            </button>
                            <button type="submit" class="btn btn-primary" name="cambiar_contrasenia">
                                cambiar contraseña
                            </button>
                        </div>
                    </form>
                    <!-- Fin Contenido -->
                </div>
            </div>
            <!-- Fin row -->
    <?php
    }
}
