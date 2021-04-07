<?php
include '../../componentes/conexion/conexion.php';
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
                <h4 class="page-title">Listado Cliente</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Clientes</a></li>
                    <li class="breadcrumb-item active">Listado Cliente</li>
                </ol>
            </div>
        </div>
        <!-- body -->
        <div class="card shadow-none">

            <div class="card-body">
              <form class="" action="javascript:void(0)" method="post" id="search_cliente_jquery_form">

              <div class="row">
                <div class="col-md-1">
                  <div class="m-t-20">
                    <h6 class="text-muted">&nbsp; </h6>
                  <a class="btn btn-primary" href="javascript:Crear_cliente()" role="button"><i class="fas fa-user-plus"></i></a>
                </div>
                </div>
                <div class="col-md-3">
                  <div class="m-t-20">
                    <h6 class="text-muted">Por Tipo De Cliente: </h6>
                    <select class="form-control" name="Tipo_de_cliente" onchange="validar_tipo_cliente(this.value)">
                      <option value="Todos">Todos</option>
                      <option value="Capital Compuesto">Capital Compuesto</option>
                      <option value="Pago Mensual">Pago Mensual</option>
                      <!-- <option disabled value="Pago Fijo">Pago Fijo</option> -->
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                  <div class="m-t-20">
                    <h6 class="text-muted">Por Cédula: </h6>
                    <input type="text"  class="form-control" name="Cédula" id="Cedula"   data-mask="999-9999999-9" value=""  />
                </div>
                </div>
                <!-- <div class="col-md-1">
                  <div class="m-t-20">
                    <h6 class="text-muted">Por ID: </h6>
                    <input type="text"  class="form-control" name="id_cliente" id="id_cliente" value=""/>
                </div>
                </div> -->
                <div class="col-md-2">
                  <div class="m-t-20">
                  <h6 class="text-muted">Por Nombre: </h6>
                  <input type="text"  class="form-control" style="text-transform: capitalize;"  id="Nombre"name="Nombre" value="" maxlength="80"  id="Nombre_Articulos_form"/>
                </div>
                </div>
                <div class="col-md-2">
                  <div class="m-t-20">
                  <h6 class="text-muted">Por Email: </h6>
                  <input type="text"  class="form-control" style="text-transform: lowercase;"  id="Email"name="Email" value="" maxlength="80"  id="Nombre_Articulos_form"/>
                </div>
                </div>
                <div class="col-md-1">
                  <div class="m-t-20">
                    <h6 class="text-muted">&nbsp; </h6>
                    <button type="submit" class="btn btn-primary" id="search_cliente_jquery_buttom"><i class="fas fa-search"></i></i></button>
                </div>
              </div>
              </div>

              </form>
              <br>
              <hr>
              <div class="table-responsive" id="search_cliente_jquery">
                    <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">Ninguna consulta enviada.</td></tr>
                </div>
            </div>
        </div>

      </div>
</div>
<div class="" id="Alerta_new_surtidora">
</div>

<script src="../../assets/js/acciones.js"></script>

<script src="assets/js/Tables.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/limites_form.js"></script>


<?php
}
?>
