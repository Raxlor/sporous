<!--
  _   _                 _                ____ _ _            _
 | \ | | ___  _ __ ___ (_)_ __   __ _   / ___| (_) ___ _ __ | |_ ___
 |  \| |/ _ \| '_ ` _ \| | '_ \ / _` | | |   | | |/ _ \ '_ \| __/ _ \
 | |\  | (_) | | | | | | | | | | (_| | | |___| | |  __/ | | | ||  __/
 |_| \_|\___/|_| |_| |_|_|_| |_|\__,_|  \____|_|_|\___|_| |_|\__\___|

-->
<?php
include '../../componentes/conexion/conexion.php';
 ?>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Nomina Cliente</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Nomina</a></li>
                    <li class="breadcrumb-item active">Nomina Cliente</li>
                </ol>
            </div>
        </div>
        <!-- body -->
        <div class="card shadow-none">

            <div class="card-body">
              <form class="" action="javascript:void(0)" method="post" id="search_nomina_jquery_form">

              <div class="row">
                <div class="col-md-1">
                  <div class="m-t-20">
                    <h6 class="text-muted">&nbsp; </h6>
                  <a class="btn btn-primary" href="javascript:Crear_cliente()" role="button"><i class="fas fa-user-plus"></i></a>
                </div>
                </div>
                <div class="col-md-3">
                  <div class="m-t-20">
                    <h6 class="text-muted">Por Tipo De Cuenta: </h6>
                    <select class="form-control" name="Tipo_de_busqueda" onchange="validar_tipo_busqueda(this.value)">
                      <option value="Todos">Todos</option>
                      <option value="Capital Compuesto">Capital Compuesto</option>
                      <option value="Pago Mensual">Pago Mensual</option>
                      <option value="Pago Trismestral">Pago Trismestral</option>

                      <!-- <option disabled value="Pago Fijo">Pago Fijo</option> -->
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                  <div class="m-t-20">
                    <h6 class="text-muted">Por Cédula: </h6>
                    <input type="text"  class="form-control" name="Cédula" id="Parametro1" data-mask="999-9999999-9" value=""  />
                </div>
                </div>
                <div class="col-md-2">
                  <div class="m-t-20">
                  <h6 class="text-muted">Por Nombre: </h6>
                  <input type="text"  class="form-control" style="text-transform: capitalize;"  id="Parametro2"name="Nombre" value="" maxlength="80"  id="Nombre_Articulos_form"/>
                </div>
                </div>
                <div class="col-md-1">
                  <div class="m-t-20">
                    <h6 class="text-muted">&nbsp; </h6>
                    <button type="submit" class="btn btn-primary" id="search_nomina_jquery_buttom"><i class="fas fa-search"></i></i></button>
                </div>
              </div>
              </div>

              </form>
              <br>
              <hr>


                <div id="carga_progreso"class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                      <div class="progress">
                      <div id="bulk-action-progbar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width:2%">
                      </div>
                      </div>
                    </div>
                  </div>
                </div>

              <div class="table-responsive" id="search_nomina_jquery">
                    <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">Ninguna consulta enviada.</td></tr>
                </div>
            </div>
        </div>

      </div>
</div>
<!-- alertas -->
 <div class="" id="Alerta_new_surtidora">
 </div>

<script src="../../assets/js/acciones.js?<?php echo md5(time()) ?>"></script>
<script src="assets/js/Tables.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/limites_form.js"></script>
