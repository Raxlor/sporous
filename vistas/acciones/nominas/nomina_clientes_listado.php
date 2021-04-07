 <!--
                          _            _ _            _                                                       _
  ___  ___  __ _ _ __ ___| |__     ___| (_) ___ _ __ | |_ ___   _ __   __ _ _ __ __ _   _ __   ___  _ __ ___ (_)_ __   __ _
 / __|/ _ \/ _` | '__/ __| '_ \   / __| | |/ _ \ '_ \| __/ _ \ | '_ \ / _` | '__/ _` | | '_ \ / _ \| '_ ` _ \| | '_ \ / _` |
 \__ \  __/ (_| | | | (__| | | | | (__| | |  __/ | | | ||  __/ | |_) | (_| | | | (_| | | | | | (_) | | | | | | | | | | (_| |
 |___/\___|\__,_|_|  \___|_| |_|  \___|_|_|\___|_| |_|\__\___| | .__/ \__,_|_|  \__,_| |_| |_|\___/|_| |_| |_|_|_| |_|\__,_|
                                                               |_|

-->
<?php
setlocale(LC_MONETARY, 'en_US');

 ?>

 <table class="table table-striped  table-bordered table-sm" id="MytableSuplidores">
     <thead>
       <tr style="cursor:pointer">
         <th>ID</th>
         <th>Nombre</th>
         <th>Cedula</th>
         <th>Tipo de cliente</th>
         <th>Banco</th>
         <th>Numero de cuenta</th>
         <th>Inversion</th>
         <th><center>%</center></th>
         <th>Pagar</th>
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
 $Tipo_de_cliente=$_POST['Tipo_de_busqueda'];
 // fin posts
 //  selecionar consulta
 if ($_POST['Tipo_de_busqueda']=='Todos') {
     $sql_cliente="SELECT * FROM `Clientes_normales`";
 }else {
   $sql_cliente="SELECT *,COUNT(*) as cliente FROM `Clientes_normales` WHERE `Tipo_de_cliente`='$Tipo_de_cliente' or `Nombre` Like '$Nombre' or `Cédula`='$Cédula' or `Email` like '$Email' GROUP BY `id_cliente` ORDER BY `Clientes_normales`.`Nombre` ASC";
   }
 $mysli=mysqli_query($conexion,$sql_cliente);
 $mysli_contador=mysqli_query($conexion,$sql_contador);
 $a;
 $contador=mysqli_fetch_array($mysli_contador);
 while ($cliente=mysqli_fetch_array($mysli)) {
   if ($a>1) {
    $ids.=$cliente['id_cliente'].',';
  }else {
    $ids.=$cliente['id_cliente'].',';
  }
   $a++
  ?>
  <tr class="text-capitalize " style="font-size: 10px;
      cursor: pointer;">
   <th scope="" style="width:6%"><?php echo $cliente['Id_secundary'] ?></th>
   <td ><?php echo $cliente['Nombre'] ?></td>
   <td class=""><?php echo $cliente['Cédula'] ?></td>
   <td class=""><?php echo $cliente['Tipo_de_cliente'] ?></td>
   <td class=""><?php echo $cliente['Banco'] ?></td>
   <td class=""><?php echo $cliente['Numero_de_cuenta'] ?></td>
   <td class=""><?php echo money_format('%(#10n',$cliente['Inversión_Inicial']) ?></td>
   <td class=""><?php echo $cliente['Por_ciento_Inversión'] ?></td>
   <td class="text-success" data-toggle="tooltip" data-placement="right" title="Sistema: Esto es solo una proyeccion de lo que generara esta nomina al cliente"><?php
        $inversion=$cliente['Inversión_Inicial'];
        $porcentaje=$cliente['Por_ciento_Inversión'];
        $porcentaje=$cliente['Por_ciento_Inversión'];
        $pago_mensual=$cliente['Pago_mensual'];

        // variables
        $comision_deposito_fijo='0'; //los 10 usd por la traferencia de banco
        $comision_deposito_isr_local ='0';//este es un valor que se toma el 10%
        $Retencion_de_ley;//este es un valor que se toma si pasa de 2000usd el sub total
        $ganacia_neta;
        $Retencion_de_ley_local='0';//aca lo uso si se pasa la ganacia de 200

        // operaciones
        if ($cliente['Tipo_de_cliente']=='Pago Total') {
          $prev=$inversion*$porcentaje/100;
           $comision_deposito_fijo=$prev-$comision_deposito_fijo;
          $Comision_deposito_isr=$comision_deposito_fijo*$comision_deposito_isr_local/100;
          $prev=$comision_deposito_fijo-$Comision_deposito_isr;
        }elseif ($cliente['Tipo_de_cliente']=='Capital Compuesto') {
          $prev=$inversion*$porcentaje/100;
       }elseif ($cliente['Tipo_de_cliente']=='Pago Trismestral') {
         $y=1;
         $prev=0;
         while ($y <= 3) {
            $y++."<Br>";
           $inversion+=$prev+=$inversion*$porcentaje/100;
         }
       }
        // else {
        //   // sacar porciento
        //   $valor_generado=$ganacia_neta=$inversion*$porcentaje/100;
        //   // comienzo a descontarle
        //    $comision_deposito_fijo=$pago_mensual;
        //     // comienzo a descontarle 10 usd
        //    $comision_deposito_fijo_traferir=$pago_mensual;
        //    // inversion_resultante
        //    $inversion_resultante=$comision_deposito_fijo_traferir;
        //     $Comision_deposito_isr=$Comision_deposito_isr=$pago_mensual*$comision_deposito_isr_local/100;
        //    // aca pregunto si paasa de 2000 para cobrarle el 0.015%
        //    if ($Comision_deposito_isr>=2000) {
        //        $Retencion_de_ley=$Retencion_de_ley_local=$pago_mensual*$Retencion_de_ley_local/100;
        //    }else {
        //    $Retencion_de_ley= $Retencion_de_ley_local=0;
        //    }
        //
        //
        //   $prev=$comision_deposito_fijo_traferir-$Retencion_de_ley-$Comision_deposito_isr;
        // }

        echo money_format('%(#10n',$prev).' +';

    ?></td>
   <td>
     <a class="btn btn-outline-success waves-effect waves-light" href="javascript:Nomina_cliente_pagar(<?php echo $cliente['id_cliente'] ?>)" role="button"><i class="fas fa-money-check-alt"></i></a>
   </td>

 </tr>
 <?php
     }
     // echo "$ids";
      ?>
    </tbody>
  </table>

  <script src="../../assets/pages/lightbox.js"></script>
  <script src="../../assets/js/Tables.js"></script>
