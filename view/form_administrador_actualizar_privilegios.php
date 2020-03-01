<?php
include_once 'form_abstract_factory.php';
class form_administrador_actualizar_privilegios extends form_abstract_factory
{
    public function form_administrador_actualizar_privilegios($data,$id)
    {
?>
        <main class="login-form">

            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Actualizar Privilegios</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">privilegio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $k => $v) {
                                        ?><?php if (!isset($data[$k]['id_usuario'])) {
                                                    } else { ?>
                                        <tr>
                                            <td><?php echo $data[$k]["privilegio"]; ?></td>
                                        </tr>
                                <?php
                                                    }
                                                }
                                ?>
                                    </tbody>
                                </table>

                                <form action="controller_usuario_gestionar_privilegio2.php" method="POST">

                                    <label class="heading">actualice sus privilegios :</label>



                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $id ?>" class="form-control" name="id_usuario" readonly="readonly">
                                    </div>
                                    <br>

                                    <div class="checkbox">

                                        <label><input type="checkbox" name="check_lista[]" value="2">emitir proforma</label>
                                    </div>

                                    <div class="checkbox">
                                        <label><input type="checkbox" name="check_lista[]" value="3">emitir boleta</label>
                                    </div>
                                    <div class="checkbox">

                                        <label><input type="checkbox" name="check_lista[]" value="4">emitir consolidado de cierre de caja</label>
                                    </div>
                                    <div class="checkbox">

                                        <label><input type="checkbox" name="check_lista[]" value="5">gestionar usuarios</label>
                                    </div>
                                    <div class="checkbox">

                                        <label><input type="checkbox" name="check_lista[]" value="6">gestionar productos</label>
                                    </div>

                                    <div class="checkbox">

                                        <label><input type="checkbox" name="check_lista[]" value="7">reportes</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="agregar">agregar privilegios</button>
                                    <button type="submit" class="btn btn-primary" name="quitar">quitar privilegios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
<?php

    }
}
