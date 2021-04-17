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
    //////////////////////////////////////////////////////////////////////////
    //  ____            _     _                    _ _            _        ///
    // |  _ \ ___  __ _(_)___| |_ _ __ ___     ___| (_) ___ _ __ | |_ ___  ///
    // | |_) / _ \/ _` | / __| __| '__/ _ \   / __| | |/ _ \ '_ \| __/ _ \ ///
    // |  _ <  __/ (_| | \__ \ |_| | | (_) | | (__| | |  __/ | | | ||  __/ ///
    // |_| \_\___|\__, |_|___/\__|_|  \___/   \___|_|_|\___|_| |_|\__\___| ///
    //            |___/                                                    ///
    //////////////////////////////////////////////////////////////////////////

    // post recibido
    $Nombre=ucwords(strtolower($_POST['Nombre']));
    $Cédula=$_POST['Cédula'];
    $Teléfono=$_POST['Teléfono'];
    $Email=strtolower($_POST['Email']);
    $Id_secundary=$_POST['Id_secundary'];
    // GENERADOR DE CONTRASEÑA
    $password='sporou'.substr(str_shuffle('123456789'), 0, 4);
    $Cliente=$_POST['Cliente'];
    $Banco=$_POST['Banco'];
    if (!$_POST['Numero_cuenta']) {
      $Numero_cuenta='No Aplica';
    }else {
      $Numero_cuenta=$_POST['Numero_cuenta'];
    }
    $fecha=$_POST['fecha'];
    $fecha_Pago=$_POST['fecha_Pago'];
    $Inversión=$_POST['Inversión'];
    $Inversión=str_replace('$','',$Inversión);
    $Inversión=str_replace(',','',$Inversión);
    if (!$_POST['PAgo_por_mes']) {
      $Pago_mensual='No Aplica';
    }else {
      $Pago_mensual=$_POST['PAgo_por_mes'];
    }
    $Inversión_porciento=$_POST['Inversión_porciento'];
    $Corredor_Bolsa=$_POST['Corredor_Bolsa'];
    if (!$_POST['Por_ciento_Corredor']) {
      $Por_ciento_Corredor='No Aplica';
    }else {
      $Por_ciento_Corredor=$_POST['Por_ciento_Corredor'];
    }
    $Cambio_de_tasa=$_POST['Cambio_de_tasa'];
    if (!$_POST['Pagar_Tasa']) {
      $Pagar_Tasa='No Aplica.';
    }else {
      $Pagar_Tasa=$_POST['Pagar_Tasa'];
    }
    $Dirección=ucwords(strtolower($_POST['Dirección']));
    // fin posts

    // informacion session
    $autor=$_SESSION['nombre_empleado_session'];
    // subir y guardar img
    $img='assets/images/systema/not-found.jpeg';
    //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
    if (isset($_FILES['img']) && $_FILES['img']['tmp_name']!=''){
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

   };
   $date=date("Y/M");
     $sql="INSERT INTO `Clientes_normales`(`Id_secundary`,`Nombre`, `Cédula`, `Telefono`, `Email`, `Password`, `Tipo_de_cliente`, `Banco`, `Numero_de_cuenta`, `Fecha_De_inicio`, `Fecha_De_Pago`, `Inversión_Inicial`,
     `Pago_mensual`,`Por_ciento_Inversión`, `Corredor_de_Bolsa`, `Por_ciento_Corredor`, `Tasa_pregunta`,
      `Tasa_value`, `Dirección`, `Foto`, `Autor`,`Fecha_char`) VALUES ('$Id_secundary','$Nombre','$Cédula','$Teléfono','$Email',
        '$password','$Cliente','$Banco','$Numero_cuenta','$fecha','$fecha_Pago','$Inversión'
      ,'$Pago_mensual','$Inversión_porciento','$Corredor_Bolsa','$Por_ciento_Corredor','$Cambio_de_tasa',
        '$Pagar_Tasa','$Dirección','$img','$autor','$date')";

        if ($mysli=mysqli_query($conexion,$sql)) {
        // email
        $nombre_dueño='Sporous Capital';
        $to = 'nbetances@sporouscapital.com.do,sabad@sporouscapital.com.do,alvarouribe28@gmail.com,elnova205@gmail.com';
        $subject = "Registro Cliente!";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;"."\r\n";
        $headers .= "From: <info@sporouscapital.com.do>\r\n";
        $mail="
         <style>
         *{font-family: Century Gothic;}
         </style>
         <body style='text-align: center;font-size: x-large;padding: 20px;margin: 20px;'>
         <center class='card shadow-none'><p>&nbsp;<img src='https://oficinavirtual.sporouscapital.com.do/assets/images/logo-dark.png'width='350' height='100'></p>
         <hr>
         <p>Hola  <strong> $nombre_dueño </strong>, se ha creado un cliente llamado <strong>".$Nombre."</strong>, pordador/a de la cedula <strong>'".$Cédula."'</strong>, con una inversion inicial de <strong>'$".$Inversión."'</strong>  bajo la modalidad de contrato <strong>'".$Cliente."'</strong><br></p>
          <p>Los datos de acceso del cliente son:<br> Usuario: ".$Cédula." o ".$Email."<Br>
          La contraseña: ".$password." <br></p>
         <p>Cliente Creado por ".$autor."</p>
         <p><br>Atentamente, Sporous Staff<br>
           <hr>
         <p><em>Este es un aviso automatico, no responda a este email.&nbsp;</em></p>
         <p>&nbsp;</p></center>
         </body>";
        mail($to, $subject, $mail, $headers);




                $to = $Email;
                $subject = "Activación de cuenta!";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;"."\r\n";
                $headers .= "From: <info@sporouscapital.com.do>\r\n";
                $mail="
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css' integrity='sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd' crossorigin='anonymous'>

                 <style>
                 *{font-family: Century Gothic;}
                 </style>
                 <body style='text-align: center;font-size: x-large;padding: 20px;margin: 20px;'>
                 <center class='card shadow-none'><p>&nbsp;<img src='https://oficinavirtual.sporouscapital.com.do/assets/images/logo-dark.png'width='350' height='100'></p>
                 <hr>
                 <p>Hola señor <strong> $Nombre </strong>, Su cuenta se ha activado, Ya puede iniciar session  desde nuestra pagina oficial.</strong><br></p>
                 <p>
                   <a href='https://netbanking.sporouscapital.com.do/' class='btn btn-primary btn-lg active'  role='button' aria-pressed='true' style='   border: none;
                     padding: 8px;
                     border-radius: 11px;
                     background: #30419b;
                     color: white;
                     margin: 5px;'>Entrar</a> </p>
                  <p>Sus datos de acceso son:<br> Usuario: ".$Cédula." o ".$Email."<Br>
                  La contraseña: ".$password." <br></p>
                 <p><br>Atentamente, Sporous Staff<br>
                   <hr>
                 <p><em>Este es un aviso automatico, no responda a este email.&nbsp;</em></p>
                 <p>&nbsp;</p></center>
                 </body>";
                mail($to, $subject, $mail, $headers);
        }else {
          ?>
            <script type="text/javascript">
                alertify.error('Sistema: Error el usuario no fue Añadido a la base de datos, comunicate con sistema...');
            </script>
          <?php
        }
      }

 ?>





<!--
  ____   __             _  ___            ____   ___ ____   ___
 |___ \ / /_           / |/ _ \          |___ \ / _ \___ \ / _ \
   __) | '_ \   _____  | | | | |  _____    __) | | | |__) | | | |
  / __/| (_) | |_____| | | |_| | |_____|  / __/| |_| / __/| |_| |
 |_____|\___/          |_|\___/          |_____|\___/_____|\___/


-->
