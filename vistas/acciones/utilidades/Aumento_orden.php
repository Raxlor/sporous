<?php
session_start();
if (!$_SESSION['nombre_empleado_session']) {
  ?>
    <script type="text/javascript">
      location.href='../../../../login.php';
    </script>
  <?php
}else {
include '../../../componentes/conexion/conexion.php';


  $Sumar=$_POST['Sumar'];
  $Sumar=str_replace('$','',$Sumar);
  $Sumar=str_replace(',','',$Sumar);
  $id=$_POST['id'];
  $metodo=$_POST['metodo'];//1==instantáneo 2== próximo Pago;

  $select="SELECT * FROM `Clientes_normales` WHERE `id_cliente`='$id'";
    $query=mysqli_query($conexion,$select);
      $data_cliente=mysqli_fetch_array($query);//recopilar toda la informacion nesesaria
      $Nombre=$data_cliente['Nombre'];
        $Inversión_anterior=$data_cliente['Inversión_Inicial'];
          $Inversión_nueva=$data_cliente['Inversión_Inicial']+$Sumar;
            $Inversión_de=$Sumar;
              $Autor=$_SESSION['nombre_empleado_session'];
              if (!isset($_POST['fecha'])) {
                     $fecha=date('Y-m-d');
              }else {
                $date_cruda = date_create($_POST['fecha']);
                 $fecha= date_format($date_cruda,"Y-m-d");
              }

                    $Sub_select="SELECT COUNT(*) AS verficar FROM `Aumentos` WHERE `id_cliente` = '$id' and `Estado`=0";
                      $sub_query=mysqli_query($conexion,$Sub_select);
                        $aumento_date=mysqli_fetch_array($sub_query);
                if ($aumento_date['verficar']==0) {
                  ///verifico que no halla uno pendiente
                if ($metodo==2) {
                    $insert="INSERT INTO `Aumentos`(
                                          `id_cliente`,
                                          `Nombre`,
                                          `Inversion_anterior`,
                                          `Inversion_nueva`,
                                          `Aumento_de`,
                                          `Metodo`,
                                          `Autor`,
                                          `Fecha`

                                      )
                                      VALUES
                                      (
                                        '$id',
                                        '$Nombre',
                                        '$Inversión_anterior',
                                        'N/A',
                                        '$Inversión_de',
                                        '$metodo',
                                        '$Autor',
                                        '$fecha'
                                      )";
                                      if (mysqli_query($conexion,$insert)) {
                                        ?>
                                        <script type="text/javascript">
                                        alertify.success('El monto se le aumentara, despues de aplicarsele un pago')
                                        $('#Modal_aumentos').modal('hide');
                                        </script>
                                        <?php
                                      }
                }else {
                    $insert="INSERT INTO `Aumentos`(
                                          `id_cliente`,
                                          `Nombre`,
                                          `Inversion_anterior`,
                                          `Inversion_nueva`,
                                          `Aumento_de`,
                                          `Metodo`,
                                          `Autor`,
                                          `Fecha`,
                                          `Estado`

                                      )
                                      VALUES
                                      (
                                        '$id',
                                        '$Nombre',
                                        '$Inversión_anterior',
                                        '$Inversión_nueva',
                                        '$Inversión_de',
                                        '$metodo',
                                        '$Autor',
                                        '$fecha',
                                        '1'
                                      )";
                                      if (mysqli_query($conexion,$insert)) {
                                        $update="UPDATE `Clientes_normales` SET `Inversión_Inicial`='$Inversión_nueva' WHERE `id_cliente`=$id";
                                        if (mysqli_query($conexion,$update)) {
                                          ?>
                                            <script type="text/javascript">
                                            $('#Modal_aumentos').modal('hide');
                                                alertify.success('Cliente Actualizado');
                                            </script>
                                          <?php
                                        }else {
                                          ?>
                                            <script type="text/javascript">
                                            $('#Modal_aumentos').modal('hide');
                                                alertify.error('Error al actualizar el cliente');
                                            </script>
                                          <?php
                                        }
                                      }else {
                                        ?>
                                          <script type="text/javascript">
                                              alertify.error('Error al Aplicar al historial el aumento');
                                          </script>
                                        <?php
                                      }
                };
              }else {
                ?>
                  <script type="text/javascript">
                  $('#Modal_aumentos').modal('hide');
                  alertify.error('No se Puede Aplicar Ya que tiene uno pendiente');
                  </script>
                <?php
              }
            }
?>
