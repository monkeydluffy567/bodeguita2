<?php
include_once 'form_abstract_factory.php';
class form_gestionar_productos extends form_abstract_factory
{
    public function form_gestionar_productos($data)
    {
?>
        <!-- Begin page content -->
        
        <div class="container">
            <h3 class="mt-5">gestionar Productos</h3>
            <hr>
            <form action="controller_gestionar_producto2.php" method="POST">
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary" name="buscar">
                        buscar
                    </button>
                    <label class="col-md-4 col-form-label text-md-right">Producto</label>
                    <div class="col-md-6">
                        <input type="text" id="email_address" class="form-control" name="producto">
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
                                    <th scope="col">nombre</th>
                                    <th scope="col">marca</th>
                                    <th scope="col">subtipo</th>
                                    <th scope="col">precio</th>
                                    <th scope="col">stock</th>
                                    <th scope="col">tamaño</th>
                                    <th scope="col">unidad</th>
                                    <th scope="col">color</th>
                                    <th scope="col">imagen</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($data)) {
                                } else {
                                }

                                foreach ($data as $k => $v) {
                                ?><?php if (!isset($data[$k]['id_producto'])) {
                                    } else { ?>
                                <tr>
                                    <th scope="row" name="id_producto"><?php echo $data[$k]['id_producto'] ?></th>
                                    <td><?php echo $data[$k]["nombre"]; ?></td>
                                    <td><?php echo $data[$k]["marca"]; ?></td>
                                    <td><?php echo $data[$k]["subtipo"]; ?></td>
                                    <td><?php echo $data[$k]["precio"]; ?></td>
                                    <td><?php echo $data[$k]["stock"]; ?></td>
                                    <td><?php echo $data[$k]["tamaño"]; ?></td>
                                    <td><?php echo $data[$k]["unidad"]; ?></td>
                                    <td><?php echo $data[$k]["color"]; ?></td>
                                    <td><img src="/bodeguita2/imagenes_productos/<?php echo $data[$k]["url_imagen"]?>" style="max-width:100%;width:auto;height:auto;"></td>

                                 


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


        </div>

        <!-- Fin row -->
<?php
    }
}
