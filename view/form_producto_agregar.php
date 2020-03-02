<?php
include_once 'form_abstract_factory.php';
class form_producto_agregar extends form_abstract_factory
{
    public function form_producto_agregar()
    {
?>
        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Agregar Producto </div>
                            <div class="card-body">
                                <form action="controller_producto_agregar.php" method="post">
                                  

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">nombre</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="nombre" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">precio</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="precio" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">stock</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="stock" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">fecha vencimiento</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="fecha_nacimiento" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">tamaño</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="tamaño" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">color</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="color" >
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">subtipo</label>
                                        <div class="col-md-6">
                                            <select name="subtipo" size="10">

                                                <option> Aceites</option>
                                                <option>Arroz</option>
                                                <option>Fideos, Pastas y Sus Salsas</option>
                                                <option>Alimentos en Conserva</option>
                                                <option> y Legumbres</option>
                                                <option>Harinas y Féculas</option>
                                                <option>Pures, Soya, Bases y Sopas</option>
                                                <option>Condimentos, Vinagres y Salsas</option>
                                                <option>Azúcar / Sustitutos</option>
                                                <option>Café, Infusiones y Hierbas</option>
                                                <option>Cereales</option>
                                                <option>Mermeladas, Mieles y Dulces</option>
                                                <option>Panes, Panetones y Biscochos Empacados</option>
                                                <option>Modificadores de Leche</option>
                                                <option>Galletas, Snacks y Golosinas</option>
                                                <option>Repostería</option>
                                                <option>Frutas</option>
                                                <option>Más Frutas</option>
                                                <option>Verduras</option>
                                                <option>Más Verduras</option>
                                                <option>Mundo Chino</option>
                                                <option>Mundo Orgánico</option>
                                                <option>Huevos Frescos</option>
                                                <option>Leche Evaporada</option>
                                                <option>Leche en Bolsa/botella vidrio</option>
                                                <option>Leche UHT</option>
                                                <option>Yogurt</option>
                                                <option>Bebidas Especiales</option>
                                                <option>Mantequillas y Margarinas</option>
                                                <option>Otros Productos de Leche</option>
                                                <option>Quesos Regulares y Frescos</option>
                                                <option>Quesos Gourmet</option>
                                                <option>Quesos Regionales</option>
                                                <option>Quesos Regionales</option>
                                                <option>Chorizos y Vienesas</option>
                                                <option>Fiambres Gourmet</option>
                                                <option>Otros Fiambres Gourmet</option>
                                                <option>Aceitunas y Fiambreria a Granel</option>
                                                <option>Carnes de Vacuno</option>
                                                <option>Carnes de Pollo</option>
                                                <option>Carnes de Cerdo</option>
                                                <option>Carnes de Pavo</option>
                                                <option>Carnes Especiales</option>
                                                <option>Pescados y Mariscos</option>
                                                <option>Orgánico</option>
                                                <option>Belleza</option>
                                                <option>Cuidado del Cabello</option>
                                                <option>Cuidado Bucal</option>
                                                <option>Cuidado Corporal</option>
                                                <option>Afeitado y Depilación</option>
                                                <option>Higiene Femenina</option>
                                                <option>Salud</option>
                                                <option>Lavado y Cuidado de Ropa</option>
                                                <option>Productos de Papel para el Hogar</option>
                                                <option>Lavado y Cuidado del Hogar</option>
                                                <option>Insecticidas, Pesticidas y Raticidas</option>
                                                <option>Agua Mineral</option>
                                                <option>Jugos y Bebidas Especiales</option>
                                                <option>Gaseosas</option>
                                                <option>Cervezas, Complementos de Parrilla y Tabaco</option>
                                                <option>Vinos por Países</option>
                                                <option>Vino Tinto</option>
                                                <option>Otros Vinos</option>
                                                <option>Licores y Bases Para Licores</option>
                                                <option>Panaderia</option>
                                                <option>Pasteleria</option>
                                                <option>Otros complementos</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">marcas</label>
                                        <div class="col-md-6">
                                            <select name="marca" size="5">
                                                <option>ADES</option>
                                                <option>Almendrina</option>
                                                <option>Anchor</option>
                                                <option>Bella Holandes</option>
                                                <option>Bonle</option>
                                                <option>Danlac</option>
                                                <option>Gloria</option>
                                                <option>Ideal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">unidades</label>
                                        <div class="col-md-6">
                                            <select name="unidad" size="2">
                                                <option>l</option>
                                                <option>ml</option>
                                                <option>kgr</option>
                                                <option>gr</option>
                                                <option>unidades</option>
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
