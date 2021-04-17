<?php
session_start();
if (!$_SESSION['nombre_empleado_session']) {
  ?>
    <script type="text/javascript">
      location.href='../../../../login.php';
    </script>
  <?php
}else {
 ?>

<!--
  ____                              ____ _ _            _
 | __ ) _   _ ___  ___ __ _ _ __   / ___| (_) ___ _ __ | |_ ___
 |  _ \| | | / __|/ __/ _` | '__| | |   | | |/ _ \ '_ \| __/ _ \
 | |_) | |_| \__ \ (_| (_| | |    | |___| | |  __/ | | | ||  __/
 |____/ \__,_|___/\___\__,_|_|     \____|_|_|\___|_| |_|\__\___|

-->
<table class="table table-striped  table-bordered table-sm" id="MytableSuplidores">
    <thead>
      <tr style="cursor:pointer">
        <th>ID</th>
        <th>Nombre</th>
        <th>Cedula</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Tipo de cuenta</th>
        <th>Foto</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody id="search_cliente_jquery">
      <?php
include '../../../componentes/conexion/conexion.php';
// post
$Nombre=ucwords(strtolower($_POST['Nombre']));
if (strlen($Nombre)>=1 ) {
  $Nombre='%'.$Nombre.'%';
};
$Cédula=$_POST['Cédula'];
$Email=$_POST['Email'];
$Tipo_de_cliente=$_POST['Tipo_de_cliente'];
// fin posts
//  selecionar consulta
if ($_POST['Tipo_de_cliente']=='Todos') {
   $sql_cliente="SELECT * FROM `Clientes_normales`";
}else {
  $sql_cliente="SELECT *,COUNT(*) as cliente FROM `Clientes_normales` WHERE `Tipo_de_cliente`='$Tipo_de_cliente' and `Nombre` Like '$Nombre' or `Cédula`='$Cédula' or `Email` like '$Email' GROUP BY `id_cliente` ORDER BY `Clientes_normales`.`Nombre` ASC";
  }
$mysli=mysqli_query($conexion,$sql_cliente);
$mysli_contador=mysqli_query($conexion,$sql_contador);
$a;
$contador=mysqli_fetch_array($mysli_contador);
while ($cliente=mysqli_fetch_array($mysli)) {
  $a++
 ?>
<tr class="text-capitalize " style="font-size: 10px;
    cursor: pointer;">
 <th scope="" style="width:6%"><?php echo $cliente['Id_secundary'] ?></th>
  <td ><?php echo $cliente['Nombre'] ?></td>
  <td class=""><?php echo $cliente['Cédula'] ?></td>
  <td class=""><?php echo $cliente['Telefono'] ?></td>
  <td class=""><?php echo $cliente['Email'] ?></td>
  <td class=""><?php echo $cliente['Tipo_de_cliente'] ?></td>
  <td>
    <a class="image-popup-no-margins" href="<?php echo $cliente['Foto'] ?>">
        <img class="img-fluid d-block" src="<?php echo $cliente['Foto'] ?>" alt="" width="75">
    </a>
  </td>
  <td>
    <a class="btn btn-outline-danger waves-effect waves-light" href="javascript:Eliminar_cliente(<?php echo $cliente['id_cliente'] ?>)" role="button"><i class="fas fa-trash-alt"></i></a>
    <a class="btn btn-outline-warning waves-effect waves-light" href="javascript:perfil_cliente_editar(<?php echo $cliente['id_cliente'] ?>,0)" role="button"><i class="fas fa-pencil-alt"></i></a>
    <a class="btn btn-outline-success waves-effect waves-light" href="javascript:perfil_cliente_ver(<?php echo $cliente['id_cliente'] ?>,1)" role="button"><i class="fas fa-search"></i></a>
  </td>

</tr>
<?php
    }
     ?>
   </tbody>
 </table>
 <script src="../../assets/pages/lightbox.js"></script>
 <script src="../../assets/js/Tables.js"></script>

<?php } ?>
