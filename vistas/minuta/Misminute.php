<?php
session_start();
if (!$_SESSION['nombre_empleado_session']) {
  ?>
    <script type="text/javascript">
      location.href='login.php';
    </script>
  <?php
};
include '../../componentes/conexion/conexion.php';
 ?>
 <div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Mis Minutas </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item active">Mis Minuta</li>
            </ol>
        </div>
    </div>
    <!-- end row -->
</div>

 <div class="card shadow">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table" id="table_id">
         <thead>
           <th>#</th>
           <th>Nombre</th>
           <th>Creador</th>
           <th>Monto</th>
           <th>Porcentaje</th>
           <th>referido</th>
           <th>Negociación</th>
           <th>Fecha</th>
         </thead>
         <tbody>
          <?php
          $sentence="SELECT * FROM `minuta` WHERE 1";
          $query=mysqli_query($conexion,$sentence);
          $a=1;
            while ($array=mysqli_fetch_array($query)) {
            ?>
            <tr>

            <td><?php echo $a++; ?></td>
            <td><?php echo $array['Nombre'] ?></td>
            <td><?php echo $array['Creado'] ?></td>
            <td><?php
            setlocale(LC_MONETARY, 'en_US');
            echo money_format('%i', $array['Monto']) . "\n";
            ?></td>
            <td><?php echo $array['Porcentaje'] ?></td>
            <td><?php echo $array['Refierdo'] ?></td>
            <td><?php if ($array['Negocacion']=='') {
                  ?>
                <center>
                  <i class="far fa-eye-slash text-danger"></i>
                </center>
                  <?php
                }else {
                  ?>
                  <center>
                  <i class="far fa-eye fa btn text-success" onclick="alertify.confirm('<?php echo $array['Negocacion'] ?>').show('hola')"></i>
                </center>
                  <?php
                }  ?>
            </td>
            <td>
              <?php echo $array['fecha'] ?></td>
          </tr>

            <?php
            }
           ?>
         </tbody>
       </table>
     </div>
   </div>
 </div>
 <script type="text/javascript">
 $(document).ready( function () {
         $('#table_id').DataTable();
     });
 </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
