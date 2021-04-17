<!--
  ____            __ _ _        _ _            _
 |  _ \ ___ _ __ / _(_) |   ___| (_) ___ _ __ | |_ ___
 | |_) / _ \ '__| |_| | |  / __| | |/ _ \ '_ \| __/ _ \
 |  __/  __/ |  |  _| | | | (__| | |  __/ | | | ||  __/
 |_|   \___|_|  |_| |_|_|  \___|_|_|\___|_| |_|\__\___|

-->
<?php
include '../../componentes/conexion/conexion.php';
setlocale(LC_MONETARY, 'en_US');
  $id=$_POST['id_cliente'];
    $sql_cliente="SELECT * FROM `Clientes_normales` WHERE `id_cliente`='$id'";
        $mysli=mysqli_query($conexion,$sql_cliente);
        $cliente_datos=mysqli_fetch_array($mysli);
  // listado de banco
  $sqli_lista_banco="SELECT * FROM `Bancos_lista` ORDER BY `Bancos_lista`.`Banco` ASC";
  $mysli=mysqli_query($conexion,$sqli_lista_banco);

  $sqli_lista_corredores="SELECT * FROM `Corredore_bolsa` ORDER by `Nombre` ASC";
  $mysli2=mysqli_query($conexion,$sqli_lista_corredores);
  if ($_POST['modalidad']==0) {

    ?>
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Edición Cliente</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Clientes</a></li>
                        <li class="breadcrumb-item active">Edición Cliente</li>
                    </ol>
                </div>
            </div>
            <!-- body -->
    <div class="card shadow-none">
        <div class="card-body">
          <div class="row">
            <div class="col-2">
              <div class="m-t-5">
                <a class="btn btn-outline-success waves-effect waves-light" href="javascript:perfil_cliente_ver(<?php echo $_POST['id_cliente'] ?>,1)" role="button"><i class="fas fa-user"></i></a>
              </div>
            </div>

            <div class="col-2">
              <div class="m-t-5">
                  <a class="btn btn-outline-success waves-suc waves-light" href="javascript:perfil_cliente_editar(<?php echo $_POST['id_cliente'] ?>,0)" role="button"><i class="fas fa-redo"></i></a>
              </div>
            </div>

            <div class="col-2">
              <div class="m-t-5">
                  <a class="btn btn-outline-danger waves-suc waves-light" href="javascript:Eliminar_cliente(<?php echo $_POST['id_cliente'] ?>)" role="button"><i class="fas fa-trash-alt"></i></a>
              </div>
            </div>
            <div class="col-2">
              <div class="m-t-5">
                  <a class="btn btn-outline-primary waves-suc waves-light" href="javascript:Listado_Cliente(<?php echo $_POST['id_cliente'] ?>)" role="button"><i class="icon-paper-sheet"></i></a>
              </div>
            </div>
            <!-- <div class="col-2">
              <div class="m-t-5">
                  <a class="btn btn-outline-primary waves-suc waves-light" href="javascript:Crear_cliente()" role="button"><i class="fas fa-user-plus"></i></a>
              </div>
            </div> -->
          </div>
          <hr>
          <form class="" action="javascript:void(0)" id="Actualizar_cliente_form" method="post" enctype="multipart/form-data">
          <div class="row">
            <!-- nombre -->
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Nombre </h6>
                  <input type="text"  class="form-control" style="text-transform: capitalize;" name="Nombre" value="<?php echo $cliente_datos['Nombre'] ?>" maxlength="80" required id="Nombre_Articulos_form"/>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Cédula </h6>
                  <input type="text"  class="form-control" name="Cédula"   data-mask="999-9999999-9" value="<?php echo $cliente_datos['Cédula'] ?>"  required/>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Teléfono </h6>
                  <input type="text"  class="form-control" name="Teléfono" data-mask="(999) 999-9999" value="<?php echo $cliente_datos['Telefono'] ?>" maxlength="10" required />
              </div>
            </div>
            <!-- fin -->
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Correo Eletronico </h6>
                  <input type="Email" style="text-transform: lowercase;" class="form-control" name="Email" value="<?php echo $cliente_datos['Email'] ?>" maxlength="80" required id="Nombre_Articulos_form"/>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Tipo de cliente </h6>
                  <select class="form-control" name="Cliente" onchange="revalidad_PAgo_por_mes(this.value,'<?php echo $cliente_datos['Pago_mensual'] ?>')">
                    <option se value="Capital Compuesto" <?php if ($cliente_datos['Tipo_de_cliente']=='Capital Compuesto') {echo "selected";} ?>>Capital Compuesto</option>
                    <option value="Pago Mensual"<?php if ($cliente_datos['Tipo_de_cliente']=='Pago Mensual') {echo "selected";} ?>>Pago Mensual</option>
                    <option value="Pago Trismestral"<?php if ($cliente_datos['Tipo_de_cliente']=='Pago Trismestral') {echo "selected";} ?>>Pago Trismestral</option>
                    <!-- <option disabled value="Pago Fijo" <?php if ($cliente_datos['Tipo_de_cliente']=='Pago Fijo') {echo "selected";} ?>>Pago Fijo</option> -->
                  </select>
              </div>
            </div>
              <!-- id -->
              <input type="text" class="d-none" name="ID" value="<?php echo $cliente_datos['id_cliente'] ?>">
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Pago por mes </h6>
                <?php if ($cliente_datos['Tipo_de_cliente']=='Pago Fijo') {
                    ?>
                    <script type="text/javascript">
                      setTimeout(function () {
                         revalidad_PAgo_por_mes('Pago Fijo','<?php echo $cliente_datos['Pago_mensual'] ?>');
                      }, 100);
                    </script>
                  <?php
                } ?>
                <input type="text"  class="form-control" name="PAgo_por_mes"  id="PAgo_por_mes" value="" maxlength="11" required />
              </div>
            </div>
            <!-- fin 3x4=12 -->
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Banco </h6>
                  <select class="form-control" name="Banco" onchange="ReValidad_Banco(this.value,'<?php echo $cliente_datos['Numero_de_cuenta'] ?>')">
                    <option value="No">No,Aplicar Banco.</option>
                    <?php
                      while ($array_Banco=mysqli_fetch_array($mysli)) {
                        ?>
                        <option value="<?php echo $array_Banco['Banco'] ?>"<?php if ($array_Banco['Banco']==$cliente_datos['Banco']) { echo "selected".' style="color: red;"';} ?>><?php echo $array_Banco['Banco'] ?></option>
                        <?php
                      };
                     ?>
                  </select>
                  <script type="text/javascript">
                  setTimeout(function () {
                      ReValidad_Banco('<?php echo $cliente_datos['Banco'] ?>','<?php echo $cliente_datos['Numero_de_cuenta'] ?>');
                      }, 100);
                  </script>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Numero de cuenta </h6>
                <input type="text"  class="form-control" name="Numero_cuenta" value="" maxlength="40" required id="Banco"/>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Inversión Inicial </h6>
                <input type="text"  class="form-control" name="Inversión" value="<?php echo $cliente_datos['Inversión_Inicial'] ?>" maxlength="11" required id="Nombre_Articulos_form" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"/>
              </div>
            </div>
            <!-- fin 3x4=12 -->
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Por ciento Inversión </h6>
                <input type="text"  class="form-control" name="Inversión_porciento" value="<?php echo $cliente_datos['Por_ciento_Inversión'] ?>" data-mask="99.9%" required />
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Gestores de Capitales </h6>
                <select class="form-control" name="Corredor_Bolsa" required onchange="Revalidad_corredor(this.value,'<?php echo $cliente_datos['Por_ciento_Corredor'] ?>')">
                  <option value="No">No,Aplicar Gestores de Capitales</option>
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
                <h6 class="text-muted">Por ciento de  Gestores de Capitale </h6>
                <input type="text"  class="form-control" name="Por_ciento_Corredor"  id="Numero_cuenta" value="" data-mask="99.9%" required />
              </div>
            </div>
            <!-- fin 3x4=12 -->
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">¿Aplicar tasa de cambio a DOP? </h6>
                <select class="form-control" name="Cambio_de_tasa" required onchange="ReTasa_cambio(this.value,'<?php echo $cliente_datos['Tasa_value'] ?>')">
                  <option value="no" <?php if ($cliente_datos['Tasa_pregunta']=='no') {echo "selected";} ?>>No, Aplicar Cambio de moneda.</option>
                  <option value="si" <?php if ($cliente_datos['Tasa_pregunta']=='si') {echo "selected";}?>>Si, Aplicar Cambio de moneda.</option>
                </select>
              </div>
              <script type="text/javascript">
              setTimeout(function () {
                ReTasa_cambio('<?php echo $cliente_datos['Tasa_pregunta']?>','<?php echo $cliente_datos['Tasa_value'] ?>');
              }, 700);
              </script>
            </div>
            <div class="col-md-4 ">
              <div class="m-t-20">
                <h6 class="text-muted">Pagar Tasa a: </h6>
                <input type="text"  class="form-control" name="Pagar_Tasa" value="No Aplica"  value="" maxlength="11" required id="Tasa_cambioid" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"/ />
              </div>
            </div>
          <div class="col-md-4">
              <div class="m-t-20">
                <h6 class="text-muted">Dirección  </h6>
                <textarea name="Dirección"  class="form-control" rows="3"   maxlength="320" id="Descipcion_Articulos_form"><?php echo $cliente_datos['Dirección'] ?></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="m-t-20">
              <h6 class="text-muted">Foto:</h6>
              <cite>Sitema: si no quiere actualizar la foto no selecione foto.</cite>
              <input  name="img" class="form-control "  type="file" accept="image/jpeg">
              </div>
            </div>
          </div>
          <br>
          <input type="submit" id="Enviar_formulario"class="btn btn-success btn-block btn-lg waves-effect waves-light" name="" value="Actualizar Cliente">
        </form>

        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
     alertify.error('Sistema: Acaba de entrar en modo edición.');
  </script>
<!-- js -->

    <?php

  }else {
    // vista de perfil normal
    ?>
    <div class="container-fluid">
        <!-- Page-Title -->


        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Perfil Cliente</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Clientes</a></li>
                        <li class="breadcrumb-item active">Perfil Cliente</li>
                    </ol>
                </div>
            </div>
            <!-- body -->


            <!-- aca verifico si se pago -->
            <?php
              if ($cliente_datos['Pago_valido_hasta']>date('Y-m-d') && !$cliente_datos['Pago_valido_hasta']==0) {
                $class='base-alt';
                $texto='Todos Los pagos Al Día';
              }else {
                $class='red';
                $texto='Pago Pendiente';

              }

             ?>
            <div class="card shadow-none ">

                <div class="card-body">

                  <div class="row">
                    <div class="col-2">
                      <div class="m-t-5">
                        <a class="btn btn-outline-warning waves-effect waves-light" href="javascript:perfil_cliente_editar(<?php echo $_POST['id_cliente'] ?>,0)" role="button"><i class="fas fa-pencil-alt"></i></a>
                      </div>
                    </div>

                    <div class="col-2">
                      <div class="m-t-5">
                          <a class="btn btn-outline-success waves-suc waves-light" href="javascript:perfil_cliente_ver(<?php echo $_POST['id_cliente'] ?>,1)" role="button"><i class="fas fa-redo"></i></a>
                      </div>
                    </div>

                    <div class="col-2">
                      <div class="m-t-5">
                          <a class="btn btn-outline-danger waves-suc waves-light" href="javascript:Eliminar_cliente(<?php echo $_POST['id_cliente'] ?>)" role="button"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="m-t-5">
                          <a class="btn btn-outline-primary waves-suc waves-light" href="javascript:Listado_Cliente(<?php echo $_POST['id_cliente'] ?>)" role="button"><i class="icon-paper-sheet"></i></a>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="m-t-5">
                          <a class="btn btn-outline-primary waves-suc waves-light" href="javascript:Crear_cliente()" role="button"><i class="fas fa-user-plus"></i></a>
                      </div>
                    </div>

                  </div>
                  <hr>
                    <div class="row bootstrap snippets bootdey">
                      <div class="ribbon <?php echo $class ?>"><span><?php echo $texto ?></span></div>
                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted">Foto: </h6>
                        <a class="image-popup-no-margins " href="<?php echo $cliente_datos['Foto'] ?>">
                            <img class="img-thumbnail d-block" src="<?php echo $cliente_datos['Foto'] ?>" alt="" width="100">
                        </a>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted">Nombre: </h6>
                        <b><?php echo $cliente_datos['Nombre'] ?></b>
                      </div>
                      </div>
                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted">Cédula: </h6>
                        <b><?php echo $cliente_datos['Cédula'] ?></b>
                      </div>
                      </div>
                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted">Teléfono: </h6>
                        <b><?php echo $cliente_datos['Telefono'] ?></b>
                        <!-- <input type="text"  class="form-control"  disabled  id="Nombre" name="Nombre" value="<?php echo $cliente_datos['Telefono'] ?>" maxlength="80" /> -->
                      </div>
                      </div>
                      <!-- fin de la primera linea -->
                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted">Email: </h6>
                        <b><?php echo $cliente_datos['Email'] ?></b>
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted">Tipo de cliente: </h6>
                        <b><?php echo $cliente_datos['Tipo_de_cliente'] ?></b>
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Banco: </h6>
                        <b><?php echo $cliente_datos['Banco'] ?></b>
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Numero de cuenta: </h6>
                        <b><?php echo $cliente_datos['Numero_de_cuenta'] ?></b>
                      </div>
                      </div>
                      <!-- segunda fila -->
                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Fecha de inicio: </h6>
                        <b><?php echo $cliente_datos['Fecha_De_inicio'] ?></b>
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Inversión Inicial: </h6>
                        <b><?php echo money_format('%(#10n',$cliente_datos['Inversión_Inicial'])?></b>
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Pago mensual: </h6>
                        <b><?php  if ($cliente_datos['Tipo_de_cliente']=='Pago Fijo') {
                        echo  money_format('%(#10n',$cliente_datos['Pago_mensual']);
                        }else {
                        echo  $cliente_datos['Pago_mensual'];
                        }; ?></b>
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Por ciento Inversión: </h6>
                        <b><?php echo $cliente_datos['Por_ciento_Inversión'] ?></b>
                      </div>
                      </div>
                      <!-- fin tercera columna -->
                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Gestores de Capitales: </h6>
                        <b><?php echo $cliente_datos['Corredor_de_Bolsa'] ?></b>
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Por ciento de Gestor de Capital: </h6>
                        <b><?php echo $cliente_datos['Por_ciento_Corredor'] ?></b>
                      </div>
                      </div>

                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> ¿Aplica a tasa de cambio?: </h6>
                        <b><?php echo $cliente_datos['Tasa_pregunta'] ?></b>
                      </div>
                      </div>
                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Valor del dolar a peso: </h6>
                        <b><?php  if ($cliente_datos['Tasa_pregunta']=='si') {
                        echo  money_format('%(#10n',$cliente_datos['Tasa_value']);
                        }else {
                        echo  $cliente_datos['Tasa_value'];
                        }; ?></b>
                      </div>
                      </div>
                      <div class="col-md-3">
                        <div class="m-t-20">
                        <h6 class="text-muted"> Dirección: </h6>
                        <b><?php echo $cliente_datos['Dirección'] ?></b>
                      </div>
                      </div>
                    </div>
                    <hr>
                    <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" onclick="tabla_query_nomina(<?php echo $id ?>);" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Historial de pagos</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" onclick="tabla_query_Aumento(<?php echo $id; ?>)" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Historial de Aumentos</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="table-responsive container-fluid" id="tabla_query_nomina">
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <div class="table-responsive container-fluid" id="tabla_query_Aumento">
                      </div>

                    </div>
                  </div>
                    <script type="text/javascript">
                      tabla_query_nomina(<?php echo $id ?>);
                    </script>


                  </div>

                </div>
            </div>

          </div>
    </div>

    <?php
  }

 ?>


<!-- alertas -->
 <div class="" id="Alerta_new_surtidora">
 </div>
 <!-- alerta -->
 <div class="" id="contenido">
 </div>
<!-- js -->
<script src="../../assets/pages/lightbox.js"></script>
<script src="assets/js/acciones.js?vs"></script>
<!-- limites_form -->
<script src="assets/js/limites_form.js"></script>
<style media="screen">
.ribbon {
  position: absolute;
  top: 17px;
  right: -5px;
  padding: 15px;
}
.ribbon-content{
  position: relative;
  width: 100%;
  height: 100px;
  background: #f1f1f1;
  border: 1px solid #DDD;
}
.ribbon.base {
  background: #3498db;
  color: #fff;
  border-right: 5px solid #8bc4ea;
}
.ribbon.light {
  background: #ecf0f1;
  color: #2c3e50;
  border-right: 5px solid #dde4e6;
}
.ribbon.dark {
  background: #131313;
  color: #fff;
  border-right: 5px solid #464646;
}
.ribbon.base-alt {
  background: #9cd70e;
  color: #fff;
  border-right: 5px solid #c6f457;
}
.ribbon.red {
  background: #e91b23;
  color: #fff;
  border-right: 5px solid #f2787d;
}
.ribbon.orange {
  background: #ff8a3c;
  color: #fff;
  border-right: 5px solid #ffc7a2;
}
.ribbon.yellow {
  background: #ffd800;
  color: #fff;
  border-right: 5px solid #ffe866;
}
.ribbon:before, .ribbon:after {
  content: '';
  position: absolute;
  left: -9px;
  border-left: 10px solid transparent;
}
.ribbon:before {
  top: 0;
}
.ribbon:after {
  bottom: 0;
}
.ribbon.base:before {
  border-top: 27px solid #3498db;
}
.ribbon.base:after {
  border-bottom: 27px solid #3498db;
}
.ribbon.light:before {
  border-top: 27px solid #ecf0f1;
}
.ribbon.light:after {
  border-bottom: 27px solid #ecf0f1;
}
.ribbon.dark:before {
  border-top: 27px solid #131313;
}
.ribbon.dark:after {
  border-bottom: 27px solid #131313;
}
.ribbon.base-alt:before {
  border-top: 27px solid #9cd70e;
}
.ribbon.base-alt:after {
  border-bottom: 27px solid #9cd70e;
}
.ribbon.red:before {
  border-top: 27px solid #e91b23;
}
.ribbon.red:after {
  border-bottom: 27px solid #e91b23;
}
.ribbon.orange:before {
  border-top: 27px solid #ff8a3c;
}
.ribbon.orange:after {
  border-bottom: 27px solid #ff8a3c;
}
.ribbon.yellow:before {
  border-top: 27px solid #ffd800;
}
.ribbon.yellow:after {
  border-bottom: 27px solid #ffd800;
}
.ribbon span {
  display: block;
  font-size: 16px;
  font-weight: 600;
}
</style>
