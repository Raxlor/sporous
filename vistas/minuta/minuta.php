<?php
session_start();
if (!$_SESSION['nombre_empleado_session']) {
  ?>
    <script type="text/javascript">
      location.href='login.php';
    </script>
  <?php
}
include '../../componentes/conexion/conexion.php';

 ?>
 <div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Crear Minuta </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item active">Minuta</li>
            </ol>
        </div>
    </div>
    <!-- end row -->
</div>
<div class="card shadow-none">
    <div class="card-body">
      <div class="form-group">
        <form class="" action="javascript:void(0)" method="post" id="Nueva_minuta">
          <div class="row">

            <div class="col-md-3 my-2">
              <span class="label label-default">Nombre Cliente</span>
                <input type="text" class="form-control" name="Nombre" maxlength="40" value="" required id="">
            </div>

            <div class="col-md-3 my-2">
              <span class="label label-default">Modalidad</span>
                <select class="form-control" name="modalida">
                  <option value="Pago Trismestral">Pago Trismestral</option>
                  <option value="Pago Mensual">Pago Mensual</option>
                  <option value="Pago Semestral">Pago Semestral</option>
                </select>
            </div>
            <div class="col-md-6 my-2">
              <span class="label label-default">Referido</span>
                <select class="form-control" name="Refierdo">
                  <?php
                    $sqli_lista_corredores="SELECT * FROM `Corredore_bolsa` ORDER by `Nombre` ASC";
                    $mysli2=mysqli_query($conexion,$sqli_lista_corredores);
                   ?>
                    <option value="N/A">No,Aplicar Referido</option>
                    <?php
                      while ($array_Corredor=mysqli_fetch_array($mysli2)) {
                        ?>
                        <option value="<?php echo $array_Corredor['Nombre'] ?>"><?php echo $array_Corredor['Nombre'] ?></option>
                        <?php
                      };
                     ?>

                </select>
            </div>

            <div class="col-md-6 my-2">
              <span class="label label-default">Monto</span>
                <input type="text" class="form-control" name="Monto" maxlength="40" onchange="Monto_convet(this.value)" value="" required id="minuta_monto_input_value">
            </div>

            <div class="col-md-6 my-2">
              <span class="label label-default">Porcentaje</span>
                <input type="text" class="form-control" name="Porcentaje" maxlength="4" onchange="Porcentaje_convet(this.value)" value="" required id="minuta_porcentaje_input_value">
            </div>

          </div>

            <span class="label label-default">Negociación </span>
            <textarea name="name" class="form-control" rows="8" cols="80" placeholder="Comentarios"></textarea>

              <hr>
            <input type="submit"  id="search_cliente_jquery_buttom" class="btn btn-primary btn-block btn-lg waves-effect waves-light" name="" value="Crear Minuta">
          </form>
  </div>
</div>
</div>

<script type="text/javascript">
function Porcentaje_convet(valor) {
  $('#minuta_porcentaje_input_value').val(parseFloat(valor));
};
function Monto_convet(valor) {
  $('#minuta_monto_input_value').val(parseFloat(valor));
};
$('#Nueva_minuta').submit(function(e){
  if (isNaN($('#minuta_monto_input_value').val())) {
    alertify.alert('El valor del Monto no puede ser NaN').setHeader('Sporous Alert');
  }else {
    if (isNaN($('#minuta_porcentaje_input_value').val())) {
      alertify.alert('El valor del Porcentaje no puede ser NaN').setHeader('Sporous Alert');
    }else {
  var formData = new FormData($(this)[0]);
    $.ajax({
        url: "vistas/acciones/minuta/save_minuta.php",
        type: "POST",
        data: formData,
        async: false,beforeSend:function() {
          $('#search_cliente_jquery_buttom').attr('disabled', 'true');
        },
         success:function(e) {
            $('#data').html(e);
           // tiempo para evitar que spamen este botom y evitar error con data table
           setTimeout(function () {
           $('#search_cliente_jquery_buttom').removeAttr('disabled');
            $('#Nueva_minuta')[0].reset();
         }, 800);
         },error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#search_cliente_jquery_buttom').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
  }
};
});

</script>
<div class=""id="data">

</div>
