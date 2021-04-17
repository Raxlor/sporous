<!--

  _ _     _                                           _                    _ _            _
 | (_)___| |_ __ _    __ _ _   _ _ __ ___   ___ _ __ | |_ __ _ _ __    ___| (_) ___ _ __ | |_ ___
 | | / __| __/ _` |  / _` | | | | '_ ` _ \ / _ \ '_ \| __/ _` | '__|  / __| | |/ _ \ '_ \| __/ _ \
 | | \__ \ || (_| | | (_| | |_| | | | | | |  __/ | | | || (_| | |    | (__| | |  __/ | | | ||  __/
 |_|_|___/\__\__,_|  \__,_|\__,_|_| |_| |_|\___|_| |_|\__\__,_|_|     \___|_|_|\___|_| |_|\__\___|

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
  $sql_cliente="SELECT *,COUNT(*) as cliente FROM `Clientes_normales` WHERE  `Nombre` Like '$Nombre' or `Cédula`='$Cédula' or `Email` like '$Email' and `Tipo_de_cliente`='$Tipo_de_cliente'   GROUP BY `id_cliente` ORDER BY `Clientes_normales`.`Nombre` ASC";
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
 <th scope="" style="width:6%"><?php echo $id=$cliente['Id_secundary'] ?></th>
  <td ><?php echo $cliente['Nombre'] ?></td>
  <td class=""><?php echo $cliente['Cédula'] ?></td>
  <td class=""><?php echo $cliente['Telefono'] ?></td>
  <td class=""><?php echo $cliente['Email'] ?></td>
  <td class=""><?php echo $cliente['Tipo_de_cliente'] ?></td>
  <td>
    <a class="image-popup-no-margins" href="<?php echo $cliente['Foto'] ?>">
        <img class="img-fluid d-block" src="<?php echo $cliente['Foto'] ?>" alt="" width="100">
    </a>
  </td>
  <td>
    <?php
    $Sub_select="SELECT COUNT(*) AS verficar FROM `Aumentos` WHERE `id_cliente` = '$id' and `Estado`=0";
    $sub_query=mysqli_query($conexion,$Sub_select);
      $aumento_date=mysqli_fetch_array($sub_query);
      $aumento_date=$aumento_date['verficar'];
     ?>
    <a class="btn btn-outline-success waves-effect waves-light" href="javascript:Cliente_aumentar(<?php echo $cliente['id_cliente'] ?>,'<?php echo $cliente['Nombre'] ?>','<?php echo $cliente['Inversión_Inicial'] ?>','<?php echo $aumento_date ?>')" role="button"><i class="fas fa-cash-register"></i>

    <span><?php echo $aumento_date ?></span>

   </a>

  </td>

</tr>
<?php
    }
     ?>
   </tbody>
 </table>
 <script src="../../assets/pages/lightbox.js"></script>
 <script src="../../assets/js/Tables.js"></script>
 <script type="text/javascript">
 const options2 = { style: 'currency', currency: 'USD' };
 const numberFormat2 = new Intl.NumberFormat('en-US', options2);
 function Cliente_aumentar(id,Nombre,inversion,existencia) {
   if (existencia>0) {
   $.ajax({
     url: 'vistas/acciones/utilidades/pendiente_show.php',
     type: 'POST',
     data: 'id='+id,
   })
   .always(function(repuesta) {
     $('#pendiente').html(repuesta)
   });
 }

   $('#Metodo_pago_h6').attr('hidden', 'true');
   $('#inversion_modal_nuew').attr('hidden', 'true');
   $('#Modal_aumentos').modal('show');
   $('#Nombre_modal').html(Nombre);
   $('#id').val(id);
   $('#Inversion_antirior').val(inversion);
   $('#resetear_data').val('');
 };
 function Revisar_valor() {
   x=$('#resetear_data').val();
   y=$('#Inversion_antirior').val();
   mod=$('#Metodo_pago_i').val();
   if (mod==1) {
     $('#Metodo_pago').html('Instantáneo');
     $('#fecha').removeAttr('disabled');
   }else {
     $('#Metodo_pago').html('próximo Pago');
     $('#fecha').attr('disabled',true);

   }
   if (x>0) {
     $('#Inversion_nueva').html(numberFormat2.format(parseInt(x)+parseInt(y)));
     $('#inversion_modal_nuew').removeAttr('hidden');
     $('#Metodo_pago_h6').removeAttr('hidden');
     $('#button_envio_orden').removeAttr('disabled');


   }else {
     $('#inversion_modal_nuew').attr('hidden', 'true');
     $('#Metodo_pago_h6').attr('hidden', 'true');
     $('#button_envio_orden').attr('disabled', 'true');

   }
 }
 </script>
  <div class="modal" tabindex="-1" role="dialog" id="Modal_aumentos">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6>Nombre: <span id="Nombre_modal"></span> </h6>
          <h6 class="mx-2"  id="inversion_modal_nuew" >Inversion Nueva: <span class="text-success" id="Inversion_nueva"></span> </h6>
          <h6 class="mx-2" id="Metodo_pago_h6">Metodo: <span id="Metodo_pago"></span></h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
            </div>
          </div>
          <form class="" action="javascript:void(0)" method="post" id="envio_consulta_orden_aumento">
            <div class="row">
              <div class="col-md-6">
                <span class="label label-info">Inversion Actual</span>
                <input type="text" hidden class="form-control" name="id" id="id" value="N-A" readonly>
                <input type="text" class="form-control" name="" id="Inversion_antirior" value="N-A" readonly>
              </div>
              <div class="col-md-6">
                <span class="label label-info">Sumarle a la Inversion Actual</span>
                <input type="text" class="form-control" name="Sumar" id="resetear_data" onchange="Revisar_valor()" value="N-A" pattern="[0-9]+" required>
              </div>
              <div class="col-md-6">
                <span class="label label-info">Aplicar Aumento</span>
                <select class="form-control" name="metodo" id="Metodo_pago_i" onchange="Revisar_valor()">
                  <option value="2">próximo Pago</option>
                  <option value="1">instantáneo</option>
                </select>
                <br>
              </div>
              <div class="col-md-6">
                <span class="label label-info">Fecha</span>
                <input type="date" class="form-control"  id="fecha" name="fecha"/>
                <br>
              </div>
            </div>
            <cite>Nota: Instantáneo > El capital Nuevo se modifica en este momento </cite>

            <cite class="text-warning">Nota: Próximo Pago > Se quedara pendiente y solo se aplicara cuando se le pague. Sumando el Aumento y la inversion despues del pago </cite>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" id="button_envio_orden"disabled name="" value="Ejecutar Orden">
            </div>
          </form>
        </div>
          <div class="container"id="pendiente">

          </div>

      </div>
    </div>
  </div>
  <div class=""id="repuesta">

  </div>
<script type="text/javascript">

$('#envio_consulta_orden_aumento').submit(function(e){
  var checkBox = document.getElementById("Check_Articulo");
  var formData = new FormData($(this)[0]);
    $.ajax({
        url: "vistas/acciones/utilidades/Aumento_orden.php",
        type: "POST",
        data: formData,
        async: false,beforeSend:function() {
          $('#button_envio_orden').attr('disabled', 'true');
        },
         success:function(e) {
           $('#repuesta').fadeOut(0).html(e).fadeIn(1000);
           // tiempo para evitar que spamen este botom y evitar error con data table
           setTimeout(function () {
           $('#button_envio_orden').removeAttr('disabled');
         }, 800);
         },error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#button_envio_orden').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});
</script>
