<?php
  include '../../componentes/conexion/conexion.php';
  $sql_categoria='SELECT * FROM `categorias`';// enlaces de categoria
  $mysli_categoria=mysqli_query($conexion,$sql_categoria);
  setlocale(LC_MONETARY, 'en_US');

  // generado a capital_compuesto
    $capital_compuesto="SELECT SUM(`Inversión_Inicial`)as valor_generado  FROM `Clientes_normales` WHERE `Tipo_de_cliente`='Capital Compuesto'";
    $ganacia_compuesta=mysqli_fetch_array(mysqli_query($conexion,$capital_compuesto));

    $pago_total="SELECT SUM(`Inversión_Inicial`)as valor_generado  FROM `Clientes_normales` WHERE `Tipo_de_cliente`='Pago Mensual'";
    $pago_total=mysqli_fetch_array(mysqli_query($conexion,$pago_total));

    $pago_Fijo="SELECT SUM(`Inversión_Inicial`)as valor_generado  FROM `Clientes_normales` WHERE `Tipo_de_cliente`='Pago Fijo'";
    $pago_Fijo=mysqli_fetch_array(mysqli_query($conexion,$pago_Fijo));

    $Pago_trimestral="SELECT SUM(`Inversión_Inicial`)as valor_generado  FROM `Clientes_normales` WHERE `Tipo_de_cliente`='Pago Trismestral'";
    $Pago_trimestral=mysqli_fetch_array(mysqli_query($conexion,$Pago_trimestral));


   $id=$_POST['id'];
   $permiso="SELECT `Permiso_cliente`, `Permiso_Corredor`, `Permiso_pago`, `Permiso_Master` FROM `usuarios` WHERE `id_usuario`='$id'";
   $mysli3=mysqli_query($conexion,$permiso);
   $permisos=mysqli_fetch_array($mysli3);
   if (!$permisos['Permiso_Corredor']==1 && !$permisos['Permiso_Master']==1) {
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
                    <h4 class="page-title">Estadistica de ingresos</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Estadistica de ingresos</a></li>
                        <li class="breadcrumb-item active">Estadistica de ingresos</li>
                    </ol>
                </div>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                          <i class="fas fa-dollar-sign bg-success  text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16"> Capital Compuesto</h5>
                        </div>
                        <h4 class="mt-4"><?php echo money_format('%(#10n',$ganacia_compuesta['valor_generado']) ?></h4>
                        <div class="progress mt-4 visibility-hidden" style="height: 0px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-none">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                          <i class="fas fa-dollar-sign bg-success  text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16"> Pago Fijo</h5>
                        </div>
                        <h4 class="mt-4"><?php echo money_format('%(#10n',$pago_Fijo['valor_generado']) ?></h4>
                        <div class="progress mt-4 visibility-hidden" style="height: 0px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                          <i class="fas fa-dollar-sign bg-success  text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16"> Pago Mensual</h5>
                        </div>
                        <h4 class="mt-4"><?php echo money_format('%(#10n',$pago_total['valor_generado']); ?></h4>
                        <div class="progress mt-4 visibility-hidden" style="height: 0px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                          <i class="fas fa-dollar-sign bg-success  text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16"> Pago Trismestral</h5>
                        </div>
                        <h4 class="mt-4"><?php echo money_format('%(#10n',$Pago_trimestral['valor_generado']); ?></h4>
                        <div class="progress mt-4 visibility-hidden" style="height: 0px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
          <br>
          <p class="text-muted center-block">Representación Graficas de Estadisticas.</p>
          <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-Grafico-Perfiles" data-toggle="tab" href="#Grafico-Perfiles" role="tab" aria-controls="Grafico-Perfiles" aria-selected="true">Grafico Perfiles</a>
    <a class="nav-item nav-link" id="nav-Proyecciones-de-mes" data-toggle="tab" href="#Proyecciones-de-mes" role="tab" aria-controls="Proyecciones-de-mes" aria-selected="false">Proyecciones de mes</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="Grafico-Perfiles" role="tabpanel" aria-labelledby="Grafico-Perfiles-tab">
    <div class="row">
          <div class="col-md-6 ">
              <div class="card shadow">
                <div class="card-heading p-4">
                <canvas id="pagos" width="300" height="190"></canvas>
              </div>
            </div>
        </div>
        <!-- pago fijo -->
          <div class="col-md-6 d-none">
              <div class="card shadow">
                <div class="card-heading p-4">
                <canvas id="pagos_fijo" width="300" height="190"></canvas>
              </div>
            </div>
        </div>
        <!-- pago total -->
          <div class="col-md-6 ">
              <div class="card shadow">
                <div class="card-heading p-4">
                <canvas id="pagos_Total" width="300" height="190"></canvas>
              </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow">
              <div class="card-heading p-4">
              <canvas id="Pago_trimestral" width="300" height="190"></canvas>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="Proyecciones-de-mes" role="tabpanel" aria-labelledby="Proyecciones-de-mes-tab">
    <div class="col-md-12 ">
        <!-- <div class="card shadow">
          <div class="card-heading p-4">
          <canvas id="Grafico_Proyecciones" width="200" height="100"></canvas>
        </div>
      </div> -->
      <h3 class="text-muted">Aun No esta listo</h3>
  </div>
  </div>
</div>



<!--
   __                  _
  / _|_   _ _ __   ___(_) ___  _ __   ___  ___
 | |_| | | | '_ \ / __| |/ _ \| '_ \ / _ \/ __|
 |  _| |_| | | | | (__| | (_) | | | |  __/\__ \
 |_|  \__,_|_| |_|\___|_|\___/|_| |_|\___||___/

 -->
  <div class="" id="grafico"/>
  <script type="text/javascript">
        $.ajax({
          url: 'vistas/nomina/Grafico_capital_compuesto.php',
          type: 'POST',
          success:function(e) {
            $('#grafico').html(e)
          }
        });
      $.ajax({
        url: 'vistas/nomina/Grafico_Pago_Total.php',
        type: 'POST',
        success:function(e) {
          $('#grafico').html(e)
        }
      });
      $.ajax({
        url: 'vistas/nomina/Grafico_pago_fijo.php',
        type: 'POST',
        success:function(e) {
          $('#grafico').html(e)
        }
      });
      $.ajax({
        url: 'vistas/nomina/grafico_trimestral.php',
        type: 'POST',
        success:function(e) {
          $('#grafico').html(e)
        }
      });


      // Proyecciones
      // $.ajax({
      //   url: 'vistas/nomina/Grafico_Proyecciones.php',
      //   type: 'POST',
      //   success:function(e) {
      //     $('#grafico').html(e)
      //   }
      // });
  </script>
    <?php
  }
  ?>
