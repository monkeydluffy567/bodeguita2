<?php
include_once 'form_abstract_factory.php';
class form_usuario_actualizar extends form_abstract_factory
{
    public function form_usuario_actualizar($data)
    {
?>

        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Actualizar Datos</div>
                            <div class="card-body">
                                <form action="controller_usuario_actualizar.php" method="post">
                                    <div class="form-group row">
                                        <label  class="col-md-4 col-form-label text-md-right">nombre</label>
                                        <div class="col-md-6">
                                            <input type="text" value="<?php echo $data[0]['nombre'] ?>" class="form-control" name="nombre" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-4 col-form-label text-md-right">apellido paterno</label>
                                        <div class="col-md-6">
                                            <input type="text"  value="<?php echo $data[0]['apepat']?>"  class="form-control" name="apepat" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-4 col-form-label text-md-right">apellido materno</label>
                                        <div class="col-md-6">
                                            <input type="text"  value="<?php echo $data[0]['apemat']?>" class="form-control" name="apemat" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-4 col-form-label text-md-right">telefono</label>
                                        <div class="col-md-6">
                                            <input type="text" value="<?php echo $data[0]['telefono']?>" class="form-control" name="telefono" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-4 col-form-label text-md-right">direccion</label>
                                        <div class="col-md-6">
                                            <input type="text"  value="<?php echo $data[0]['dirreccion']?>" class="form-control" name="direccion" required autofocus>
                                        </div>
                                    </div>

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" name="actualizar">
                                            actualizar
                                        </button>
                                        <button type="button" class="btn btn-danger" name="cancelar"><a href="./controller_usuario.php">cancelar</a></button>
                                        
                                    </div>
                            </div>
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
