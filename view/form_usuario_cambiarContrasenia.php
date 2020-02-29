<?php
include_once 'form_abstract_factory.php';
class form_usuario_cambiarContrasenia extends form_abstract_factory{
    public function form_usuario_cambiarContrasenia(){
        ?>
        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Cambiar Contraseña</div>
                            <div class="card-body">
                                <form action="controller_usuario_cambiarContrasenia.php" method="post">
                                    <div class="form-group row">
                                        <label  class="col-md-4 col-form-label text-md-right">contraseña antigua</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="contrasenia_antigua" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right" >contraseña nueva</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="contrasenia_nueva" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right" > repetir contraseña nueva</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="repetir_contrasenia_nueva" >
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" name="ok">
                                            ok
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
        <?php
    }
}