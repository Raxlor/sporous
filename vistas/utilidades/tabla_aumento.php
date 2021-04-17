<?php
include '../../componentes/conexion/conexion.php';
setlocale(LC_MONETARY, 'en_US');

$id=$_POST['id'];
$query="SELECT * FROM `Aumentos` WHERE `id_cliente` = '79' ORDER BY `Fecha` ASC";
   $query2="SELECT *, COUNT(*) as resultado FROM `nomina_Historial`WHERE  `id_cliente`='$id' GROUP BY `id_nomina` ORDER BY`Fecha` ASC";
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
   <table class="table table-striped  table-bordered table-sm" id="MytableAumento">
     <thead>
       <th>#</th>
       <!-- <th>Banco</th> -->
       <!-- <th>Numero cuenta</th> -->
       <!-- <th>Tipo de pago</th> -->
       <th>Inversión Anterior</th>
       <th>Aumentod de </th>
       <th>resultado</th>
       <!-- <th>Desc. transferencia</th> -->
       <!-- <th>ISR</th> -->
       <!-- <th>Retencion de ley</th> -->
       <th>Fecha</th>
       <th>Metodo</th>
       <th>Autor</th>
       <!-- <th>Fecha</th> -->
     </thead>
     <tbody>
        <?php
        $a;
        while ($factura=mysqli_fetch_array($mysli)) {
          $a++;
          ?>
          <tr class="<?php if ($factura['Estado']=='0') {echo "bg-warning";  } ?>">
            <td><?php echo $a ?></td>
            <!-- <td><?php echo $factura['Banco'] ?></td> -->
            <!-- <td><?php echo $factura['Numero_Cuenta'] ?></td> -->
            <!-- <td><?php echo $factura['Tipo_de_cliente'] ?></td> -->
            <td><?php echo money_format('%(#10n',$factura['Inversion_anterior']) ?></td>

            <td><?php echo money_format('%(#10n',$factura['Aumento_de']) ?></td>
            <?php
              if ($factura['Metodo']=='2') {
              ?>
                <td>N/A</td>
              <?php
              }else {
                ?>
                <td><?php echo money_format('%(#10n',$factura['Inversion_nueva']) ?></td>
                <?php
              }
             ?>
            <!-- <td><?php echo money_format('%(#10n',$factura['Comisión_deposito_fijo']) ?></td> -->
            <!-- <td><?php echo money_format('%(#10n',$factura['Comision_deposito_isr']) ?></td> -->
            <!-- <td><?php echo money_format('%(#10n',$factura['Retencion_de_ley']) ?></td> -->
            <td><?php echo $factura['Fecha'] ?></td>
            <td><?php if ($factura['Metodo']==1) {
              echo "Instantáneo";
            }else {
              echo "Despues de Pago";
            } ?></td>
            <!-- <td><a class="btn btn-primary" href="https://oficinavirtual.sporouscapital.com.do/<?php echo $factura['img'] ?>" role="button" target="_blank"> Ver</a></td> -->
            <td><?php echo $factura['Autor'] ?></td>
        </tr>
          <?php
        }
        ?>
     </tbody>
   </table>

</div>
<?php endif; ?>

<script src="assets/js/Tables.js?s"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/limites_form.js"></script>
