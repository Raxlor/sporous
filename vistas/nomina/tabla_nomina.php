<?php
include '../../componentes/conexion/conexion.php';
setlocale(LC_MONETARY, 'en_US');

$id=$_POST['id'];
$query="SELECT *, COUNT(*) as resultado FROM `nomina_Historial`WHERE `id_cliente`='$id' GROUP BY `id_nomina` ORDER BY`Fecha` ASC";
   $query2="SELECT *, COUNT(*) as resultado FROM `nomina_Historial`WHERE `id_cliente`='$id' GROUP BY `id_nomina` ORDER BY`Fecha` ASC";
   $mysli=mysqli_query($conexion,$query);
  $mysli2=mysqli_query($conexion,$query2);
  $numero=mysqli_fetch_array($mysli2);
 ?>
 <?php if ($numero['resultado']==0): ?>
   <center>
     <h3 class="text-muted">Sin Historial de movimientos</h3>
   </center>
 <?php endif; ?>
 <?php if ($numero['resultado']>=1): ?>

 <div class="table-responsive" style="font-size: 10px;">
   <table class="table table-striped  table-bordered table-sm" id="MytableSuplidores">
     <thead>
       <th>#</th>
       <!-- <th>Banco</th> -->
       <th>Numero cuenta</th>
       <!-- <th>Tipo de pago</th> -->
       <th>Inversión Anterior</th>
       <th><center>%</center></th>
       <th>Ganancia</th>
       <!-- <th>Desc. transferencia</th> -->
       <!-- <th>ISR</th> -->
       <!-- <th>Retencion de ley</th> -->
       <th>Total</th>
       <th># Factura </th>
       <th>Fecha</th>
       <th>IMG</th>
     </thead>
     <tbody>
        <?php
        $a;
        while ($factura=mysqli_fetch_array($mysli)) {
          $a++;
          ?>
          <tr>
            <td><?php echo $a ?></td>
            <!-- <td><?php echo $factura['Banco'] ?></td> -->
            <td><?php echo $factura['Numero_Cuenta'] ?></td>
            <!-- <td><?php echo $factura['Tipo_de_cliente'] ?></td> -->
            <td><?php echo money_format('%(#10n',$factura['inversion_anterior']) ?></td>
            <td><?php echo $factura['por_ciento'] ?></td>
            <td><?php echo money_format('%(#10n',$factura['valor_generado']) ?></td>
            <!-- <td><?php echo money_format('%(#10n',$factura['Comisión_deposito_fijo']) ?></td> -->
            <!-- <td><?php echo money_format('%(#10n',$factura['Comision_deposito_isr']) ?></td> -->
            <!-- <td><?php echo money_format('%(#10n',$factura['Retencion_de_ley']) ?></td> -->
            <td><?php echo money_format('%(#10n',$factura['total_pago']) ?></td>
            <td><?php echo $factura['Numero_factura'] ?></td>
            <td><?php echo $factura['Fecha'] ?></td>
            <td><a class="btn btn-primary" href="https://oficinavirtual.sporouscapital.com.do/<?php echo $factura['img'] ?>" role="button" target="_blank"> Ver</a></td>
        </tr>
          <?php
        }
        ?>
     </tbody>
   </table>

</div>
<?php endif; ?>

<script src="assets/js/Tables.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/limites_form.js"></script>
