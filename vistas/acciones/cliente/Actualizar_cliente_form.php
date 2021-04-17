<!--
     _        _               _ _                      _ _            _
    / \   ___| |_ _   _  __ _| (_)______ _ _ __    ___| (_) ___ _ __ | |_ ___
   / _ \ / __| __| | | |/ _` | | |_  / _` | '__|  / __| | |/ _ \ '_ \| __/ _ \
  / ___ \ (__| |_| |_| | (_| | | |/ / (_| | |    | (__| | |  __/ | | | ||  __/
 /_/   \_\___|\__|\__,_|\__,_|_|_/___\__,_|_|     \___|_|_|\___|_| |_|\__\___|

 -->
<?php
  include '../../../componentes/conexion/conexion.php';

  $id=$_POST['ID'];
  $sql_foto="SELECT `Foto` FROM `Clientes_normales` WHERE `id_cliente`='$id'";
  $mysli=mysqli_query($conexion,$sql_foto);
  if (!$foto=mysqli_fetch_array($mysli)) {
  ?>
  <script type="text/javascript">
      alertify.error('Sistema: Estoy Teniendo Problema con la base de dato..');
  </script>
  <?php
  };

  // post recibido
  $Nombre=ucwords(strtolower($_POST['Nombre']));//1
  $AduanaCode=strpos($Nombre,"'");
 if ($AduanaCode!== false) {
   ?>

   <script type="text/javascript">
    alertify.alert("<center><i class='fas fa-exclamation-triangle animated bounce infinite fa-4x text-danger'></i><center><br><center><b>Sistema: Se encontro un Carácter No Aceptado en el sistema (') Remuevalo para continuar. <BR>disculpé los inconveniente <b><center>").set('label', 'Entiendo');
 </script>
   <?php
   exit(0);
 }
  $Cédula=$_POST['Cédula'];//2
  $Teléfono=$_POST['Teléfono'];//3
  $Email=strtolower($_POST['Email']);//4
  ////////////////////////////////////////////////////////////////////////
  // // GENERADOR DE CONTRASEÑA                                       ////
  // $password='sporou'.substr(str_shuffle('123456789'), 0, 4);       ////
  // /////////////////////////////////////////////////////////////////////
  $Cliente=$_POST['Cliente'];//5
  $Banco=$_POST['Banco'];//6
  if (!$_POST['Numero_cuenta']) {
    $Numero_cuenta='No Aplica';
  }else {
    $Numero_cuenta=$_POST['Numero_cuenta'];//7
  }
  $Inversión=$_POST['Inversión'];//8
  if (!$_POST['PAgo_por_mes']) {
    $Pago_mensual='No Aplica';
  }else {
    $Pago_mensual=$_POST['PAgo_por_mes'];//9
  }
  $Inversión_porciento=$_POST['Inversión_porciento'];//10
  $Corredor_Bolsa=$_POST['Corredor_Bolsa'];//11
  if (!$_POST['Por_ciento_Corredor']) {
    $Por_ciento_Corredor='No Aplica';
  }else {
    $Por_ciento_Corredor=$_POST['Por_ciento_Corredor'];//12
  }
  $Cambio_de_tasa=$_POST['Cambio_de_tasa'];//13
  if (!$_POST['Pagar_Tasa']) {
    $Pagar_Tasa='No Aplica.';
  }else {
    $Pagar_Tasa=$_POST['Pagar_Tasa'];//14
  }

  $Dirección=ucwords(strtolower($_POST['Dirección']));//15
  // fin posts


  //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
  if (isset($_FILES['img']) && $_FILES['img']['tmp_name']!=''){
    $img='assets/images/systema/not-found.jpeg';

    if ($img==$foto['Foto']) {

    }else {
      unlink($foto['Foto']);// borro la anterior foto para optimizar
    };
  //Imagen original
  $rtOriginal=$_FILES['img']['tmp_name'];
  //Crear variable
  $original = imagecreatefromjpeg($rtOriginal);
  //Ancho y alto máximo
  $max_ancho = 600; $max_alto = 400;
  //Medir la imagen
  list($ancho,$alto)=getimagesize($rtOriginal);
  //Ratio
  $x_ratio = $max_ancho / $ancho;
  $y_ratio = $max_alto / $alto;
  //Proporciones
  if(($ancho <= $max_ancho) && ($alto <= $max_alto) ){
      $ancho_final = $ancho;
      $alto_final = $alto;
  }
  else if(($x_ratio * $alto) < $max_alto){
      $alto_final = ceil($x_ratio * $alto);
      $ancho_final = $max_ancho;
  }
  else {
      $ancho_final = ceil($y_ratio * $ancho);
      $alto_final = $max_alto;
  }
  //Crear un lienzo
  $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
  //Copiar original en lienzo
  imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
  //Destruir la original
  imagedestroy($original);
  //Crear la imagen y guardar en directorio upload/
  imagejpeg($lienzo,'../../../assets/images/clientes/'.md5(time()).'.jpeg');
   $img='../../../assets/images/clientes/'.md5(time()).'.jpeg';

 }else {
   $img=$foto['Foto'];
 };

   $update="UPDATE `Clientes_normales` SET `Nombre`='$Nombre',`Cédula`='$Cédula',`Telefono`='$Teléfono',
  `Email`='$Email',`Tipo_de_cliente`='$Cliente',`Banco`='$Banco',
  `Numero_de_cuenta`='$Numero_cuenta',`Inversión_Inicial`='$Inversión',
  `Pago_mensual`='$Pago_mensual',`Por_ciento_Inversión`='$Inversión_porciento',
  `Corredor_de_Bolsa`='$Corredor_Bolsa',`Por_ciento_Corredor`='$Por_ciento_Corredor',`Tasa_pregunta`='$Cambio_de_tasa',
  `Tasa_value`='$Pagar_Tasa',`Dirección`='$Dirección',`Foto`='$img' WHERE `id_cliente`='$id'";

  if ($msyli=mysqli_query($conexion,$update)) {
    ?>
    <script type="text/javascript">
      alertify.success('Sistema: Actualizacion al cliente <?php echo $Nombre ?> Ejecutada exitosamente')
    </script>
    <?php

  }else {
    ?>
    <script type="text/javascript">
      alertify.error("Sistema: Actualizacion al cliente <?php echo $Nombre ?> No se pudo completar, Conflicto con los datos ");
    </script>
    <?php
  }

 ?>
