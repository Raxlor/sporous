<?php
session_start();
if (!$_SESSION['nombre_empleado_session']) {
  ?>
    <script type="text/javascript">
      location.href='../../../../login.php';
    </script>
  <?php
}else {
$tablet_browser = 0;
$mobile_browser = 0;
$body_class = 'desktop';

if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
    $body_class = "tablet";
}

if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
    $body_class = "mobile";
}

if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
    $body_class = "mobile";
}

$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');

if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}

if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
if ($tablet_browser > 0) {
// Si es tablet has lo que necesites
   $de_donde='una tablet <i class="fas fa-tablet-alt"></i>';
}
else if ($mobile_browser > 0) {
// Si es dispositivo mobil has lo que necesites
   $de_donde='un mobil <i class="fas fa-mobile-alt"></i>';
}
else {
// Si es ordenador de escritorio has lo que necesites
   $de_donde='un ordenador <i class="fas fa-desktop"></i>';
}
?>
  <?php
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
                <h4 class="page-title">Perfil</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Perfil</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </div>
        </div>
        <div class="row gutters-sm">
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
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
                    <h6 class="mb-0">  <?php echo$u=$datos['Nombre'] ?></h6>
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
                      <h6 class="mb-0"><?php echo $datos['Telefono'] ?></h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Conetado desde</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <h6 class="mb-0"><?php echo $de_donde ?></h6>
                      </div>
                  </div>
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
<?php } ?>
