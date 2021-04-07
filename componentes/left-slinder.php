<?php

 $id=$_SESSION['id_empleado_session'];

 ?>
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="javascript:Escritorio()" class="waves-effect">
                      <i class="fas fa-desktop"></i><span> Escritorio </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-user-shield"></i><span> Administracion <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="javascript:Crear_usuario(<?php echo $id ?>)">Crear usuario</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-user-friends"></i><span> Clientes <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                      <li><a href="javascript:Crear_cliente(<?php echo $id ?>)">Registrar Cliente</a></li>
                      <li><a href="javascript:Listado_Cliente(<?php echo $id ?>)">Listado Cliente</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-user-tie"></i><span>Gestores de Capitales <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                      <li><a href="javascript:Registrar_corredor_De_bolsa(<?php echo $id ?>)">Añadir Gestores de Capitales</a></li>
                      <li><a href="javascript:Listado_corredor_de_bolsa(<?php echo $id ?>)">Listado Gestores de Capitales</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-dollar-sign"></i><span> Nomina <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                      <li><a href="javascript:Nomina_cliente(<?php echo $id ?>)">Nomina Cliente</a></li>
                      <li><a href="javascript:Nomina_Corredor(<?php echo $id ?>)">Nomina Gestores de Capitales</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="far fa-calendar-alt"></i><span> Contabilidad <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="javascript:pagos_realizado(<?php echo $id ?>)">Estadistica de ingresos </a></li>
                    </ul>
                </li>
                <li class="menu-title">Utilidades</li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-info-circle"></i><span> Herramientas <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                      <li><a href="javascript:minuta()">Crear Minuta</a></li>
                      <li><a href="javascript:Misminuta()">Mis Minutas</a></li>
                      <li><a href="javascript:Aumentar_Inversión()">Aumentar Inversión</a></li>
                      <li><a href="javascript:información()">Solicitud de información   </a></li>
                      <li><a href="javascript:Calculadora()">Calculadora </a></li>
                        <!-- <li><a href="javascript:Email()">Enviar Email </a></li> -->
                    </ul>
                </li>
                <!-- <li class="menu-title">Configuracion</li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-info-circle"></i><span> info <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="javascript:alertify.error('Mantenimiento...')">Actualizaciones </a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
