<?php

    include 'conexion/conexion.php';
    $id=$_SESSION['id_empleado_session'];
      $sql="SELECT * FROM `usuarios` WHERE  `id_usuario`='$id'";
      $mysli=mysqli_query($conexion,$sql);
      $user=mysqli_fetch_array($mysli);
 ?>




     <!-- LOGO -->
     <div class="topbar-left">
         <a href="javascript:Escritorio()" class="logo">
             <span class="logo-light">
                <img src="assets/images/logo-dark.png" alt=""width='132'>
             </span>
             <span class="logo-sm">
                 <img src="assets/images/favicon.png" alt=""width='32'>
             </span>
         </a>
     </div>

     <nav class="navbar-custom">
         <ul class="navbar-right list-inline float-right mb-0">

             <!-- language-->
             <!-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                 <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                      Conectados <span class="mdi mdi-chevron-down"></span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                     <a class="dropdown-item" href="#"> TU </span></a>

                 </div>
             </li> -->

             <!-- full screen -->
             <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                 <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                     <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                 </a>
             </li>

             <!-- notification -->
             <li class="dropdown notification-list list-inline-item">
                 <!-- <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     <i class="mdi mdi-bell-outline noti-icon"></i>
                     <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                 </a> -->
                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                     <!-- item-->
                     <h6 class="dropdown-item-text">
                         Notifications
                     </h6>
                     <div class="slimscroll notification-item-list">
                         <!-- item-->
                         <a href="javascript:void(0);" class="dropdown-item notify-item active">
                             <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                             <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                         </a>
                     </div>
                     <!-- All-->
                     <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                         View all <i class="fi-arrow-right"></i>
                     </a>
                 </div>
             </li>

             <li class="dropdown notification-list list-inline-item">
                 <div class="dropdown notification-list nav-pro-img">
                     <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                         <img src="<?php echo $user['img'] ?>" alt="user" class="rounded-circle">
                     </a>
                     <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                         <!-- item-->
                         <a class="dropdown-item" href="javascript:perfil()"><i class="mdi mdi-account-circle"></i> Profile</a>
                         <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> My Wallet</a> -->
                         <a class="dropdown-item d-block" href="javascript:configuracion()"><span class="badge badge-success float-right"></span><i class="mdi mdi-settings"></i> Configuración</a>
                         <a class="dropdown-item" href="javascript:location.href='home.php'"><i class="mdi mdi-lock-open-outline"></i> Inicio</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item text-danger" href="javascript:deslog()"><i class="mdi mdi-power text-danger"></i> Salir</a>
                     </div>
                 </div>
             </li>

         </ul>

         <ul class="list-inline menu-left mb-0">
             <li class="float-left">
                 <button class="button-menu-mobile open-left waves-effect">
                     <i class="mdi mdi-menu"></i>
                 </button>
             </li>
             <li class="d-none d-md-inline-block">
                 <!-- <form role="search" class="app-search">
                     <div class="form-group mb-0">
                         <input type="text" class="form-control" placeholder="Search..">
                         <button type="submit"><i class="fa fa-search"></i></button>
                     </div>
                 </form> -->
             </li>
         </ul>

     </nav>
