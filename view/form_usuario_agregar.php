<?php
include_once 'form_abstract_factory.php';
class form_usuario_agregar extends form_abstract_factory
{
    public function form_usuario_agregar()
    {
?>
        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Actualizar Datos</div>
                            <div class="card-body">
                                <form action="controller_usuario_agregar.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">email</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">password</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">repetir password</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="repetir_password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">nombre</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="nombre" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">apellido paterno</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="apepat" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">apellido materno</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="apemat" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">telefono</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="telefono" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">direccion</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="direccion" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">dni</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="dni" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">tipo</label>
                                        <div class="col-md-6">
                                            <select name="tipo" size="2">

                                                <option>dispensador</option>

                                                <option>administrador</option>

                                                <option>cajero</option>
                                                <option>especial</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" name="agregar">
                                            agregar
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="cancelar">
                                            cancelar
                                        </button>

                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </main>

        </main>
<?php
    }
}
