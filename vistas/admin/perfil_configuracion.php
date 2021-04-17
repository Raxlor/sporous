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

$id=$_POST['id'];
 $user="SELECT * FROM `usuarios` WHERE `id_usuario`=$id";
 $mysli=mysqli_query($conexion,$user);
 $datos=mysqli_fetch_array($mysli);

 ?>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Configuración Perfil</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Perfil</a></li>
                    <li class="breadcrumb-item active">Configuración Perfil</li>
                </ol>
            </div>
        </div>
        <div class="row gutters-sm">
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">

                      <i class="fas fa-user-edit fa-4x " style="position: absolute;margin-top: 40px;margin-left: 17px;cursor:pointer; opacity:0.5;" onclick="Change_photo()"></i>

                      <img src="<?php echo $datos['img'] ?>" alt="Admin" class="rounded-circle" width="150" height="150">
                      <div class="mt-3">
                        <h4><?php echo $u=$datos['Usuario'] ?></h4>
                        <p class="text-secondary mb-1">Cargo Adminitrativo</p>
                        <p class="text-muted font-size-sm"><?php echo $datos['rol_name'] ?></p>
                        <!-- <button class="btn btn-primary">Follow</button> -->
                        <!-- <button class="btn btn-outline-primary">Message</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre Completo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <h6 class="mb-0">  <?php echo $u=$datos['Nombre'] ?> </h6>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <h6 class="mb-0"><?php echo $datos['Email'] ?></h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Cédula</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <h6 class="mb-0"><?php echo $datos['Cédula'] ?></h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Teléfono</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <h6 class="mb-0"><?php echo $datos['Telefono'] ?> </h6>
                    </div>
                  </div>
                  <hr>

                  <input type="text" name=""  class="d-none"  id="password" readonly value="<?php echo  base64_decode($datos['Password']) ?>">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Cambiar contraseña</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <a href="javascript:cambiar_contraseña(<?php echo $id ?>)" class="btn btn-primary" role="button"  data-toggle="modal" data-target="#cambio_contraseña"><i class="fas fa-user-edit"></i> Cambiar Contraseña </a>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Conetado desde</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <h6 class="mb-0"><?php echo $de_donde ?></h6>
                      </div>
                  </div> -->
                </div>
              </div>

            </div>
            <div class="col-md-4 mb-3">

              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">https://sporouscapital.com.do</span>
                  </li>
                  <?php
                     $num="SELECT COUNT(*)as numero FROM `Clientes_normales`  WHERE `Autor`='$u'";
                        $query=mysqli_query($conexion,$num);
                        $cuenta=mysqli_fetch_array($query);
                   ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fas fa-users fa-2x"></i> Cliente Registrado</h6>
                    <span class="text-secondary"><?php echo $cuenta['numero'] ?></span>
                  </li>
                  <?php
                     $num="SELECT COUNT(*)as numero FROM `Corredore_bolsa` WHERE `Autor`='$u'";
                        $query=mysqli_query($conexion,$num);
                        $cuenta=mysqli_fetch_array($query);
                   ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fas fa-users fa-2x"></i> Corredores Registrado</h6>
                    <span class="text-secondary"><?php echo $cuenta['numero'] ?></span>
                  </li>
                  <?php
                     $num="SELECT COUNT(*)as numero FROM `nomina_Historial` WHERE `autor`='$u'";
                        $query=mysqli_query($conexion,$num);
                        $cuenta=mysqli_fetch_array($query);
                   ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fas fa-money-bill-wave fa-2x"></i> Pago Realizados</h6>
                    <span class="text-secondary"><?php echo $cuenta['numero'] ?></span>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>
    </div>





    <!-- Modal -->
    <form class="" action="javascript:void(0)" method="post" id="form_cambio_contraseña_admin">
    <div class="modal fade" id="cambio_contraseña" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Contraseña Actual </h6>
                      <div class="input-group">
                        <input type="password"  class="form-control" name="password_anterior" maxlength="18" minlength="6"required id="Nombre_Articulos_form"/>
                        <div class="input-group-prepend">
                          <a class="input-group-text" href="javascript:mostrar_psw1()" role="button"><i id="show1" class="fas fa-eye "></i></a>
                          <input type="text" name="" class="d-none" value="0" id="show1_state">
                        </div>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-12">
                    <h6 class="text-muted">Contraseña Actual </h6>
                   <div class="input-group">

                     <input type="password" class="form-control" name="password_new" maxlength="18" minlength="6"required id="Nombre_Articulos_form"/>
                     <div class="input-group-prepend">
                       <a class="input-group-text" href="javascript:mostrar_psw2()" role="button"><i id="show2"  class="fas fa-eye "></i></a>
                       <input type="text" name="" class="d-none" value="0" id="show2_state">
                     </div>
                   </div>
                 </div>

                  <div class="col-md-12 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Confirme contraseña </h6>
                       <div class="input-group">
                        <input type="password"  class="form-control" name="password_confirm" maxlength="18"  minlength="6" required id="Nombre_Articulos_form"/>
                        <div class="input-group-prepend">
                          <a class="input-group-text" href="javascript:mostrar_psw3()" role="button"><i id="show3"class="fas fa-eye"></i></a>
                          <input type="text" name="" class="d-none" value="0" id="show3_state">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <input type="text" name="id"class="d-none" value="<?php echo base64_encode($datos['id_usuario'])?>">
                <cite>Nota: Para mayor seguridad a su acceso, utilize contraseña alfanumerica</cite>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name=""class="btn btn-primary" value="Cambiar contraseña" id="search_cliente_jquery_buttom">
          </div>
        </div>
      </div>
    </div>
  </form>


  <div class="" id="Change_vista">

  </div>


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

  <div class="" id="Alerta_new_surtidora"></div>


<!-- js -->
<!-- limites_form -->
<script src="assets/js/limites_form.js"></script>
<script src="assets/js/acciones.js"></script>
<?php
} ?>
