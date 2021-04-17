<?php
session_start();
if (!$_SESSION['nombre_empleado_session']) {
  ?>
    <script type="text/javascript">
      location.href='../../../../login.php';
    </script>
  <?php
}else {

include '../../componentes/conexion/conexion.php';
  $sql_categoria='SELECT * FROM `categorias`';// enlaces de categoria
  $mysli_categoria=mysqli_query($conexion,$sql_categoria);

  $sql_unidades='SELECT * FROM `unidades`';
  $mysli_unidad=mysqli_query($conexion,$sql_unidades);

   $sqli_lista_banco="SELECT * FROM `Bancos_lista` ORDER BY `Bancos_lista`.`Banco` ASC";
   $mysli=mysqli_query($conexion,$sqli_lista_banco);

   $sqli_lista_corredores="SELECT * FROM `Corredore_bolsa` ORDER by `Nombre` ASC";
   $mysli2=mysqli_query($conexion,$sqli_lista_corredores);
   $id=$_POST['id'];

  $permiso="SELECT `Permiso_cliente`, `Permiso_Corredor`, `Permiso_pago`, `Permiso_Master` FROM `usuarios` WHERE `id_usuario`='$id'";
  $mysli3=mysqli_query($conexion,$permiso);
  $permisos=mysqli_fetch_array($mysli3);

  if (!$permisos['Permiso_cliente']==1 && !$permisos['Permiso_Master']==1 ) {
    ?>
    <div class="account-pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card shadow-lg">
                            <div class="card-block">
                                <div class="text-center p-3">
                                        <h1 class="error-page mt-4"><img  class="center-block" src="assets/images/SPOROUS HORIZONTALES CURVAS C-03.png" alt="" width='50%'></h1>
                                    <h4 class="mb-4 mt-5">Lo siento, No esta Autorizado</h4>
                                    <p class="mb-4">No tiene permiso para vizualizar, <br> Este modulo.</p>
                                    <a class="btn btn-primary mb-4 waves-effect waves-light" href="index.php"><i class="mdi mdi-home"></i> Volver al Escritorio</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    <?php
  }else {
?>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Registrar Cliente</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Cliente</a></li>
                    <li class="breadcrumb-item active">Registrar Cliente</li>
                </ol>
            </div>
        </div>
        <!-- end row -->
      </div>
      <!-- formulario articulos -->
      <div class="card shadow-none">
        <div class="card-body">
          <div class="form-group">

            <div class="col-12">
              <form class="" id="Registrar_cliente_form" action="javascript:void(0)" method="post" enctype="multipart/form-data">

                <div class="row show-grid">
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">ID </h6>
                        <input type="text"  class="form-control" style="text-transform: capitalize;" name="Id_secundary" value="" maxlength="29" required id="Nombre_Articulos_form"/>
                    </div>
                  </div>
                  <!-- nombre -->
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Nombre </h6>
                        <input type="text"  class="form-control" style="text-transform: capitalize;" name="Nombre" value="" maxlength="80" required id="Nombre_Articulos_form"/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Cédula </h6>
                        <input type="text"  class="form-control" name="Cédula"   data-mask="999-9999999-9" value=""  required/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Teléfono </h6>
                        <input type="text"  class="form-control" name="Teléfono" data-mask="(999) 999-9999" value="" maxlength="10" required />
                    </div>
                  </div>
                  <!-- fin -->
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Correo Eletronico </h6>
                        <input type="Email" style="text-transform: lowercase;" class="form-control" name="Email" value="" maxlength="80" required id="Nombre_Articulos_form"/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Tipo de cliente </h6>
                        <select class="form-control" name="Cliente" onchange="validad_PAgo_por_mes(this.value)">
                          <option value="Capital Compuesto">Capital Compuesto</option>
                          <option value="Pago Mensual">Pago Mensual</option>
                          <option value="Pago Trismestral">Pago Trismestral</option>

                          <!-- <option disabled value="Pago Fijo">Pago Fijo</option> -->
                        </select>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Pago por mes </h6>
                      <input type="text"  class="form-control" name="PAgo_por_mes"  id="PAgo_por_mes"value="" maxlength="11" required />
                    </div>
                  </div>
                  <!-- fin 3x4=12 -->
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Banco </h6>
                        <select class="form-control" name="Banco" onchange="Validad_Banco(this.value)">
                          <option value="No">No,Aplicar Banco.</option>
                          <?php
                            while ($array_Banco=mysqli_fetch_array($mysli)) {
                              ?>
                              <option value="<?php echo $array_Banco['Banco'] ?>"><?php echo $array_Banco['Banco'] ?></option>
                              <?php
                            };
                           ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Numero de cuenta </h6>
                      <input type="text"  class="form-control" min="5" name="Numero_cuenta" value="" maxlength="40" required id="Banco"/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Fecha De inicio </h6>
                      <input type="date" name="fecha" class="form-control" value="" required/>
                    </div>
                  </div>
                  <!-- fin 3x4=12 -->
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Fecha De Pago </h6>
                      <input type="date" name="fecha_Pago" class="form-control" value="" required/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Inversión Inicial </h6>
                      <input type="text"  class="form-control" name="Inversión" value="" maxlength="11" required id="Nombre_Articulos_form" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Por ciento Inversión </h6>
                      <input type="text"  class="form-control" name="Inversión_porciento" value="" data-mask="99.9%" required />
                    </div>
                  </div>
                  <!-- fin 3x4=12 -->
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Gestor de Capital </h6>
                      <select class="form-control" name="Corredor_Bolsa" required onchange="validad_corredor(this.value)">
                        <option value="No">No,Aplicar Gestor de Capital</option>
                        <?php
                          while ($array_Corredor=mysqli_fetch_array($mysli2)) {
                            ?>
                            <option value="<?php echo $array_Corredor['Nombre'] ?>"><?php echo $array_Corredor['Nombre'] ?></option>
                            <?php
                          };
                         ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Por ciento Gestor </h6>
                      <input type="text"  class="form-control" name="Por_ciento_Corredor"  id="Numero_cuenta" value="" data-mask="99.9%" required />
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">¿Aplicar tasa de cambio a DOP? </h6>
                      <select class="form-control" name="Cambio_de_tasa" required onchange="Tasa_cambio(this.value)">
                        <option value="no">No, Aplicar Cambio de moneda.</option>
                        <option value="si">Si, Aplicar Cambio de moneda.</option>
                      </select>
                    </div>
                  </div>
                  <!-- fin 3x4=12 -->
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Pagar Tasa a: </h6>
                      <input type="text"  class="form-control" name="Pagar_Tasa" value="No Aplica"  value="" maxlength="11" required id="Tasa_cambioid" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"/ />
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="m-t-20">
                      <h6 class="text-muted">Dirección  </h6>
                      <textarea name="Dirección"  class="form-control" rows="3"   maxlength="320" id="Descipcion_Articulos_form"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="m-t-20">
                    <h6 class="text-muted">Foto</h6>
                          <input  name="img" class="form-control m-3"  type="file" accept="image/jpeg">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="m-t-20">
                      <input type="checkbox" class="form-check-input" id="Check_Articulo"  >
                       <label class="form-check-label" for="Check_Articulo">Seguir Registrando Cliente. </label>
                    </div>
                  </div>
                </div>
                  <br>
                  <input type="submit" id="Enviar_formulario"class="btn btn-primary btn-block btn-lg waves-effect waves-light" name="" value="Registrar Cliente">
              </form>
            </div>
          </div>
        </div>
        </div>
        <!-- alerta -->
        <div class="" id="contenido">
        </div>

</div>

<!-- table -->
<script src="assets/js/Tables.js"></script>

<script src="assets/js/acciones.js"></script>
<!-- limites_form -->
<script src="assets/js/limites_form.js"></script>
<?php
}
}
?>
