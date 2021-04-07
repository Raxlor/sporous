<?php
session_start();
if (!$_SESSION['nombre_empleado_session']) {
  ?>
    <script type="text/javascript">
      location.href='login.php';
    </script>
  <?php
}
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Oficina Virtual | Sporous Capital</title>
    <meta content="Sistema Administrativo, de las gestiones internas de la empresa." name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <!-- Magnific popup -->
    <link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- animated -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.css" integrity="sha512-VMyF2fc2AX1KdbrqVUbeTWZxHmNThygdqsmZXqvg7hN3M3rgtzSQE+Vo4YtKRDexB0VDap5tiIwGVEmUA4Y1VA==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">

</head>
<style media="screen">
  span{
    font-size: 12.9px;
  };
</style>
<body>
  <div id="wrapper">
 <div class="topbar">
   <?php
   include 'componentes/header.php';
    ?>
  </div>
 <!-- Top Bar End -->
 <!-- ========== Left Sidebar Start ========== -->
 <div class="left side-menu">
   <?php
   include 'componentes/left-slinder.php';
    ?>
 </div>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid" id="Vistas_control">
        <!-- container-fluid -->
      </div>
    </div>
    <!-- content -->
    <?php
    include 'componentes/conexion/conexion.php';
    include 'componentes/footer.php';
     ?>
</div>
</div>



<input type="text" name=""  class="d-none" id="Variable_x_no_utilizable_ignore" value="<?php echo $id ?>"/>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metismenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>
<!-- puglin -->
<script src="plugins/alertify/js/alertify.js"></script>
<script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="plugins/chartjs/chart.min.js"></script>
<!-- App js -->
<script src="assets/js/app.js"></script>
<script src="assets/js/acciones.js?v=<?php echo base64_encode(date('y-d-m')) ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.js" integrity="sha512-k59zBVzm+v8h8BmbntzgQeJbRVBK6AL1doDblD1pSZ50rwUwQmC/qMLZ92/8PcbHWpWYeFaf9hCICWXaiMYVRg==" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
<script src="assets/js/vistas.js?v=<?php echo base64_encode(time()) ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.js" integrity="sha512-eOUPKZXJTfgptSYQqVilRmxUNYm0XVHwcRHD4mdtCLWf/fC9XWe98IT8H1xzBkLL4Mo9GL0xWMSJtgS5te9rQA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css" integrity="sha512-MpdEaY2YQ3EokN6lCD6bnWMl5Gwk7RjBbpKLovlrH6X+DRokrPRAF3zQJl1hZUiLXfo2e9MrOt+udOnHCAmi5w==" crossorigin="anonymous" />
</body>

</html>
