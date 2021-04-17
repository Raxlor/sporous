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

  $id=$_POST['id'];

  $permiso="SELECT `Permiso_cliente`, `Permiso_Corredor`, `Permiso_pago`, `Permiso_Master` FROM `usuarios` WHERE `id_usuario`='$id'";
  $mysli3=mysqli_query($conexion,$permiso);
  $permisos=mysqli_fetch_array($mysli3);

  if (!$permisos['Permiso_Master']==1 ) {
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
                <h4 class="page-title">Registrar Administrador(Usuario)</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Administrador</a></li>
                    <li class="breadcrumb-item active">Registrar Administrador(Usuario)</li>
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
              <form class="" id="Registrar_admin_form" action="javascript:void(0)" method="post" enctype="multipart/form-data">

                <div class="row show-grid">
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
                      <h6 class="text-muted">Nombre Puesto </h6>
                        <input type="text" style="text-transform: capitalize;" class="form-control" name="Nombre_puesto" value="" maxlength="80" required id="Nombre_Articulos_form"/>
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="m-t-20">
                      <h6 class="text-muted">Dirección  </h6>
                      <textarea name="Dirección"  class="form-control" rows="1"   maxlength="320" id="Descipcion_Articulos_form"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="m-t-20">
                        <h6 class="text-muted">Nombre de usuario  </h6>
                        <input name="Nombre_usuario"  class="form-control"  style="text-transform: capitalize;" onkeyup="Validar_nick(this.value)"  maxlength="30" id="Nombre_Articulos_form" required/>
                      </div>
                    </div>
                  <div class="col-md-6">
                    <div class="m-t-20">
                    <h6 class="text-muted">Foto</h6>
                          <input  name="img" class="form-control m-3"  type="file" accept="image/jpeg">
                    </div>
                  </div>

                  <h6 class="text-muted">Permisos</h6>
                  <div class="col-md-2">
                    <div class="m-t-20">
                      <input type="checkbox" name="permiso_clientes" class="form-check-input" id="permiso_clientes"/>
                       <label class="form-check-label" for="permiso_clientes">Registrar Cliente. </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="m-t-20">
                      <input type="checkbox" name="permiso_Corredor" class="form-check-input" id="permiso_Corredor"/>
                       <label class="form-check-label" for="permiso_Corredor">Registrar Corredor. </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="m-t-20">
                      <input type="checkbox" name="Aplicar_Pagos" class="form-check-input" id="Aplicar_Pagos"/>
                       <label class="form-check-label" for="Aplicar_Pagos">Aplicar Pagos. </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="m-t-20">
                      <input type="checkbox" name="All" class="form-check-input" id="All"/ onchange="All_permiso()">
                       <label class="form-check-label" for="All">Control Total. </label>
                    </div>
                  </div>
                </div>
                  <br>
                  <input type="submit" id="Enviar_formulario"class="btn btn-primary btn-block btn-lg waves-effect waves-light" name="" value="Registrar Administrador">
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
