<?php
include_once 'form_abstract_factory.php';
class form_gestionar_usuarios extends form_abstract_factory
{
    public function form_gestionar_usuarios($data)
    {
?>
        <!-- Begin page content -->

        <div class="container">
            <h3 class="mt-5">gestionar Usuarios</h3>
            <hr>
            <form action="controller_gestionar_usuario2.php" method="POST">
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary" name="buscar">
                        buscar
                    </button>
                    <label class="col-md-4 col-form-label text-md-right">usuario</label>
                    <div class="col-md-6">
                        <input type="text" id="email_address" class="form-control" name="usuario">
                    </div>

                    <button type="submit" class="btn btn-primary" name="agregar">
                        agregar
                    </button>
                </div>



                <div class="row">
                    <div class="col-12 col-md-12">
                        <!-- Contenido -->

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
                                    <th scope="col">estado</th>
                                    <th scope="col">eliminar</th>
                                    <th scope="col">actualizar</th>
                                    <th scope="col">privilegios</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($data)){

                                }else{}

                                foreach ($data as $k => $v) {
                                ?><?php if (!isset($data[$k]['id_usuario'])) {
                                    } else { ?>
                                <tr>
                                    <th scope="row" name="id_usuario"><?php echo $data[$k]['id_usuario'] ?></th>
                                    <td><?php echo $data[$k]["apepat"]; ?></td>
                                    <td><?php echo $data[$k]["apemat"]; ?></td>
                                    <td><?php echo $data[$k]["nombre"]; ?></td>
                                    <td><?php echo $data[$k]["email"]; ?></td>
                                    <td><?php echo $data[$k]["telefono"]; ?></td>
                                    <td><?php echo $data[$k]["dni"]; ?></td>
                                    <td><?php echo $data[$k]["dirreccion"]; ?></td>
                                    <td><?php echo $data[$k]["tipo"]; ?></td>
                                    <td><?php echo $data[$k]["estado"]; ?></td>
                                    <td><a href="controller_usuario_delete.php?id_usuario=<?php echo $data[$k]['id_usuario'] ?>" class="btn btn-secondary">cambiar estado</a></td>
                                    <td><a href="controller_usuario_edit.php?id_usuario=<?php echo $data[$k]['id_usuario'] ?>" class="btn btn-primary">actualizar</a></td>
                                    <td><a href="controller_usuario_gestionar_privilegios.php?id_usuario=<?php echo $data[$k]['id_usuario'] ?>" class="btn btn-danger">Dar privilegios</a></td>

                                </tr>

                        <?php
                                    }
                                }
                        ?>
                            </tbody>
                        </table>

                        <!-- Fin Contenido -->
                    </div>
            </form>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

        </div>

        <!-- Fin row -->
<?php
    }
}
