  var idSession=$('#Variable_x_no_utilizable_ignore').val();


 // __     __    _ _     _            _                         _____                          _            _
 // \ \   / /_ _| (_) __| | __ _  ___(_) ___  _ __   ___  ___  |  ___|__  _ __ _ __ ___  _   _| | __ _ _ __(_) ___
 //  \ \ / / _` | | |/ _` |/ _` |/ __| |/ _ \| '_ \ / _ \/ __| | |_ / _ \| '__| '_ ` _ \| | | | |/ _` | '__| |/ _ \
 //   \ V / (_| | | | (_| | (_| | (__| | (_) | | | |  __/\__ \ |  _| (_) | |  | | | | | | |_| | | (_| | |  | | (_) |
 //    \_/ \__,_|_|_|\__,_|\__,_|\___|_|\___/|_| |_|\___||___/ |_|  \___/|_|  |_| |_| |_|\__,_|_|\__,_|_|  |_|\___/
 //

$('#Tasa_cambioid').attr('disabled', 'true');
function Tasa_cambio(e) {
  if (e=='no') {
    $('#Tasa_cambioid').val();
    alertify.error('La tasa no se esta aplicando');
    $('#Tasa_cambioid').attr('disabled', 'true');
    $('#Tasa_cambioid').val('No Aplica');
  }else {
    alertify.success('La tasa se esta aplicando, ingrese la tasa de cambio.');
    $('#Tasa_cambioid').val('');
    $('#Tasa_cambioid').removeAttr('disabled');
  }
};
function ReTasa_cambio(e,value) {
  if (e=='no') {
    $('#Tasa_cambioid').val();
    alertify.error('La tasa no se esta aplicando');
    $('#Tasa_cambioid').attr('disabled', 'true');
    $('#Tasa_cambioid').val('No Aplica');
  }else {
    alertify.success('La tasa se esta aplicando, ingrese la tasa de cambio.');
    if (value=='No Aplica.') {
      $('#Tasa_cambioid').val('');
    }else {
      $('#Tasa_cambioid').val(value);
    }
    $('#Tasa_cambioid').removeAttr('disabled');
  }
};

$('#Numero_cuenta').val('No Aplica');
$('#Numero_cuenta').attr('disabled','true');
function validad_corredor(e) {
  if (e=='No') {
    alertify.error('El Cliente se no esta sujeto a ningun corredor de bolsa.');
    $('#Numero_cuenta').val('No Aplica');
    $('#Numero_cuenta').attr('disabled','true');
  }else {
    alertify.success('Corredor de bolsa seleccionado correctamente');
    $('#Numero_cuenta').removeAttr('disabled');
    $('#Numero_cuenta').val('');

  }
};
function Revalidad_corredor(e,value) {
  if (e=='No') {
    alertify.error('El Cliente se no esta sujeto a ningun corredor de bolsa.');
    $('#Numero_cuenta').val('No Aplica');
    $('#Numero_cuenta').attr('disabled','true');
  }else {
    alertify.success('Corredor de bolsa seleccionado correctamente');
    $('#Numero_cuenta').removeAttr('disabled');
    if (value=='No Aplica') {
        $('#Numero_cuenta').val('');
      }else {
        $('#Numero_cuenta').val(value);
      }
  }
};

$('#Banco').attr('disabled', 'true');
$('#Banco').val('No Aplica');

function Validad_Banco(e) {
if (e=='No') {
  $('#Banco').val('No Aplica');
  $('#Banco').attr('disabled', 'true');
  alertify.error('El Cliente No cuenta con un banco, esta información es importante.');
}else {
  alertify.success('Banco Selecionado correctamente.');
  $('#Banco').removeAttr('disabled');
  $('#Banco').val('');
}
};

function ReValidad_Banco(e,value) {
  if (e=='No') {
  $('#Banco').val('No Aplica');
  $('#Banco').attr('disabled', 'true');
  alertify.error('El Cliente No cuenta con un banco, esta información es importante.');
}else {
  alertify.success('Banco Selecionado correctamente.');
  $('#Banco').removeAttr('disabled');
if (value=='No Aplica') {
    $('#Banco').val('');
  }else {
    $('#Banco').val(value);
  }
  };
};

$('#PAgo_por_mes').attr('disabled', 'true');
$('#PAgo_por_mes').val('No Aplica');

function revalidad_PAgo_por_mes(e,value) {
  if (e=='Pago Fijo') {
    $('#PAgo_por_mes').removeAttr('disabled');
    if (value=='No Aplica') {
      $('#PAgo_por_mes').val('');
    }else {
      $('#PAgo_por_mes').val(value);
    }
  }else {
    $('#PAgo_por_mes').attr('disabled', 'true');
    $('#PAgo_por_mes').val('No Aplica');
  };
};



function validad_PAgo_por_mes(e) {
  if (e=='Pago Fijo') {

    $('#PAgo_por_mes').removeAttr('disabled')
    $('#PAgo_por_mes').val('');
  }else {
    $('#PAgo_por_mes').attr('disabled', 'true');
    $('#PAgo_por_mes').val('No Aplica');
  }
}

$('#Cedula').attr('disabled', 'true');
$('#Nombre').attr('disabled', 'true');
$('#Email').attr('disabled', 'true');

function validar_tipo_cliente(e) {
  if (e=='Todos') {
    $('#Cedula').attr('disabled', 'true');
    $('#Cedula').val('');

    $('#Nombre').attr('disabled', 'true');
    $('#Nombre').val('');

    $('#Email').attr('disabled', 'true');
    $('#Email').val('');
    $('#id_cliente').attr('disabled', 'true');
    $('#id_cliente').val('');

  }else {
    $('#Cedula').removeAttr('disabled');
    $('#id_cliente').removeAttr('disabled');

    $('#Nombre').removeAttr('disabled');
    $('#Email').removeAttr('disabled');
  }
};
  $('#Parametro1').attr('disabled', 'true');
  $('#Parametro2').attr('disabled', 'true');
function validar_tipo_busqueda(e) {
  if (e=='Todos') {
    $('#Parametro1').attr('disabled', 'true');
      $('#Parametro2').attr('disabled', 'true');
      $('#Parametro1').val('');
        $('#Parametro2').val('');
      }else {
        $('#Parametro1').removeAttr('disabled');
        $('#Parametro2').removeAttr('disabled');
      }
};
function All_permiso(e) {
    e=document.getElementById('All');
    if (e.checked==true) {
    $('#permiso_clientes').prop("checked", true);
    $('#permiso_Corredor').prop("checked", true);
    $('#Aplicar_Pagos').prop("checked", true);
    }else {
      $('#permiso_clientes').prop("checked", false);
      $('#permiso_Corredor').prop("checked", false);
      $('#Aplicar_Pagos').prop("checked", false);
    }
}
$('#retiro_calculadora').attr('disabled', 'true');
function Calculadora_validar(e) {
  if (e=='Pago Fijo') {
    $('#retiro_calculadora').removeAttr('disabled');
  }else {
    $('#retiro_calculadora').attr('disabled', 'true');

  }
}


// validadcion formulario password


function mostrar_psw1() {
  if ($('#show1_state').val()==0) {
  var x = $('input[name=password_anterior]').attr('type', 'text');
  $('#show1').attr('class', 'fas fa-eye-slash');
  $('#show1_state').val(1);
}else {
  var x = $('input[name=password_anterior]').attr('type', 'password');
  $('#show1').attr('class', 'fas fa-eye');
  $('#show1_state').val(0);
}
};
function mostrar_psw2() {
if ($('#show2_state').val()==0) {
var x = $('input[name=password_new]').attr('type', 'text');
$('#show2').attr('class', 'fas fa-eye-slash');
$('#show2_state').val(1);
}else {
var x = $('input[name=password_new]').attr('type', 'password');
$('#show2').attr('class', 'fas fa-eye');
$('#show2_state').val(0);
}
};
function mostrar_psw3() {
if ($('#show3_state').val()==0) {
var x = $('input[name=password_confirm]').attr('type', 'text');
$('#show3').attr('class', 'fas fa-eye-slash');
$('#show3_state').val(1);
}else {
var x = $('input[name=password_confirm]').attr('type', 'password');
$('#show3').attr('class', 'fas fa-eye');
$('#show3_state').val(0);
}
};
function mostrar_psw1_login() {
  if ($('#show1_login_state').val()==0) {
  var x = $('input[name=password_login]').attr('type', 'text');
  $('#show1_login').attr('class', 'fas fa-eye-slash');
  $('#show1_login_state').val(1);
  }else {
  var x = $('input[name=password_login]').attr('type', 'password');
  $('#show1_login').attr('class', 'fas fa-eye');
  $('#show1_login_state').val(0);
  }
}

 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //  _____                          _            _              __                  _                           //////
 // |  ___|__  _ __ _ __ ___  _   _| | __ _ _ __(_) ___        / _|_   _ _ __   ___(_) ___  _ __   ___  ___     //////
 // | |_ / _ \| '__| '_ ` _ \| | | | |/ _` | '__| |/ _ \      | |_| | | | '_ \ / __| |/ _ \| '_ \ / _ \/ __|    //////
 // |  _| (_) | |  | | | | | | |_| | | (_| | |  | | (_) |     |  _| |_| | | | | (__| | (_) | | | |  __/\__ \    //////
 // |_|  \___/|_|  |_| |_| |_|\__,_|_|\__,_|_|  |_|\___/      |_|  \__,_|_| |_|\___|_|\___/|_| |_|\___||___/    //////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// crreacion de Surtidores ajax envio pox
$('#Registrar_cliente_form').submit(function(e){
  var checkBox = document.getElementById("Check_Articulo");
  var formData = new FormData($(this)[0]);
    $.ajax({
        url: "vistas/acciones/cliente/Registrar_cliente.php",
        type: "POST",
        data: formData,
        async: false,
        beforeSend:function() {
          $('#Enviar_formulario').attr('disabled', 'true');
          alertify.success('Sistema: Enviando el formulario...');
        },
        success: function (msg) {
          $('#contenido').fadeOut(100).html(msg).fadeIn(500);
          // si no se quiere que te reenvie al listado
          if (checkBox.checked == true){
            alertify.confirm("Sistema: ¿puedo resetear el formulario? <br><center>Preciona 'OK' para Eliminar. </center>",function(){
            $('#Registrar_cliente_form')[0].reset();
            window.scrollTo(500, 0);
          });
              } else {
                alertify.success('Sistema: Enviando la lista de cliente');
                setTimeout(function () {
                window.scrollTo(500, 0);
              }, 500);
                Listado_Cliente(idSession);
            }
              setTimeout(function () {
                alertify.success('Sistema: Formulario Recibido');
                $('#Enviar_formulario').removeAttr('disabled');
            }, 800);

        }, error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#Enviar_formulario').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});
// formulario Actualizaciones perfil_cliente
$('#Actualizar_cliente_form').submit(function(e){
  var formData = new FormData($(this)[0]);
    $.ajax({
        url: "vistas/acciones/cliente/Actualizar_cliente_form.php",
        type: "POST",
        data: formData,
        async: false,
        beforeSend:function() {
          $('#Enviar_formulario').attr('disabled', 'true');
          alertify.success('Sistema: Enviando el formulario...');
        },success:function(html) {
          $('#contenido').fadeOut(100).html(html).fadeIn(500);
          $('#Enviar_formulario').removeAttr('disabled');
          window.scrollTo(500, 0);

        }, error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#Enviar_formulario').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});
// formulario crear Corredores
$('#Registrar_Corredor_de_bolsa_form').submit(function(e){
  var checkBox = document.getElementById("Check_Articulo");
  var formData = new FormData($(this)[0]);
    $.ajax({
        url: "vistas/acciones/corredor/Registrar_corredor.php",
        type: "POST",
        data: formData,
        async: false,
        beforeSend:function() {
          $('#Enviar_formulario').attr('disabled', 'true');
          alertify.success('Sistema: Enviando el formulario...');
        },
        success: function (msg) {
          $('#contenido').fadeOut(100).html(msg).fadeIn(500);
          // si no se quiere que te reenvie al listado
          if (checkBox.checked == true){
            alertify.confirm("Sistema: ¿puedo resetear el formulario? <br> <center>Preciona 'OK' para Eliminar. </center>",function(){
            $('#Registrar_Corredor_de_bolsa_form')[0].reset();
            window.scrollTo(500, 0);
          });
              } else {
                // alertify.error('Sistema: Mantenimiento...');
                setTimeout(function () {
                window.scrollTo(500, 0);
              }, 500);
              Listado_corredor_de_bolsa(idSession);
                // Registrar_corredor_De_bolsa();
            }
              setTimeout(function () {
                alertify.success('Sistema: Formulario Recibido');
                $('#Enviar_formulario').removeAttr('disabled');
            }, 800);
        }, error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#Enviar_formulario').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});

// formulario Actualizaciones perfil_corredor
$('#Actualizar_corredor_form').submit(function(e){
  var formData = new FormData($(this)[0]);
  var inpusts=$('.form-control').val();
    $.ajax({
        url: "vistas/acciones/corredor/Actualizar_corredor_form.php",
        type: "POST",
        data: formData,
        async: false,
        beforeSend:function() {
          $('#Enviar_formulario').attr('disabled', 'true');
          alertify.success('Sistema: Enviando el formulario...');
        },success:function(html) {
          $('#contenido').fadeOut(100).html(html).fadeIn(500);
          $('#Enviar_formulario').removeAttr('disabled');
          window.scrollTo(500, 0);
          alertify.success('Sistema: Usuario Agregado...');
        }, error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#Enviar_formulario').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});
// vistas/acciones/admin/Registrar_admin.php
// crear Administrador
$('#Registrar_admin_form').submit(function(e){
  var formData = new FormData($(this)[0]);
  var inpusts=$('.form-control').val();
    $.ajax({
        url: "vistas/acciones/admin/Registrar_admin.php",
        type: "POST",
        data: formData,
        async: false,
        beforeSend:function() {
          $('#Enviar_formulario').attr('disabled', 'true');
          alertify.success('Sistema: Enviando el formulario...');
        },success:function(html) {
          $('#contenido').fadeOut(0).html(html).fadeIn(500);
          $('#Enviar_formulario').removeAttr('disabled');
          window.scrollTo(500, 0);
          $('#Registrar_admin_form')[0].reset();

        }, error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#Enviar_formulario').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});


 /////////////////////////////////////////////////////////////////////////
 //  _     _     _            _          ____ _ _            _         ///
 // | |   (_)___| |_ __ _  __| | ___    / ___| (_) ___ _ __ | |_ ___   ///
 // | |   | / __| __/ _` |/ _` |/ _ \  | |   | | |/ _ \ '_ \| __/ _ \  ///
 // | |___| \__ \ || (_| | (_| | (_) | | |___| | |  __/ | | | ||  __/  ///
 // |_____|_|___/\__\__,_|\__,_|\___/   \____|_|_|\___|_| |_|\__\___|  ///
 //                                                                    ///
 /////////////////////////////////////////////////////////////////////////

 $('#search_cliente_jquery_form').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/cliente/search_cliente.php",
         type: "POST",
         data: formData,
         async: false,beforeSend:function() {
           $('#search_cliente_jquery_buttom').attr('disabled', 'true');
         },
          success:function(e) {
            $('#search_cliente_jquery').fadeOut(0).html(e).fadeIn(1000);
            // tiempo para evitar que spamen este botom y evitar error con data table
            setTimeout(function () {
            $('#search_cliente_jquery_buttom').removeAttr('disabled');
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
 });



 //  _ _     _            _                                     _
 // | (_)___| |_ __ _  __| | ___     ___ ___  _ __ _ __ ___  __| | ___  _ __
 // | | / __| __/ _` |/ _` |/ _ \   / __/ _ \| '__| '__/ _ \/ _` |/ _ \| '__|
 // | | \__ \ || (_| | (_| | (_) | | (_| (_) | |  | | |  __/ (_| | (_) | |
 // |_|_|___/\__\__,_|\__,_|\___/   \___\___/|_|  |_|  \___|\__,_|\___/|_|
 //



 $('#search_Corredor_de_bolsa_jquery_form').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/corredor/search_corredor.php",
         type: "POST",
         data: formData,
         async: false,beforeSend:function() {
           $('#search_cliente_jquery_buttom').attr('disabled', 'true');
         },
          success:function(e) {
            $('#search_Corredor_de_bolsa_jquery').fadeOut(0).html(e).fadeIn(1000);
            // tiempo para evitar que spamen este botom y evitar error con data table
            setTimeout(function () {
            $('#search_Corredor_de_bolsa_jquery_buttom').removeAttr('disabled');
          }, 800);
          },error:function() {
           setTimeout(function () {
             alertify.error('Sistema: La pagina solicitada esta colgada');
             $('#search_Corredor_de_bolsa_jquery_buttom').removeAttr('disabled');
         }, 800);
         },
         cache: false,
         contentType: false,
         processData: false
     });
     e.preventDefault();
 });



 //  _     _     _            _             _                              _                 ____ _ _            _
 // | |   (_)___| |_ __ _  __| | ___     __| | ___   _ __   ___  _ __ ___ (_)_ __   __ _    / ___| (_) ___ _ __ | |_ ___
 // | |   | / __| __/ _` |/ _` |/ _ \   / _` |/ _ \ | '_ \ / _ \| '_ ` _ \| | '_ \ / _` |  | |   | | |/ _ \ '_ \| __/ _ \
 // | |___| \__ \ || (_| | (_| | (_) | | (_| |  __/ | | | | (_) | | | | | | | | | | (_| |  | |___| | |  __/ | | | ||  __/
 // |_____|_|___/\__\__,_|\__,_|\___/   \__,_|\___| |_| |_|\___/|_| |_| |_|_|_| |_|\__,_|___\____|_|_|\___|_| |_|\__\___|
 //                                                                                    |_____|
 //
 $('#search_nomina_jquery_form').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/nominas/nomina_clientes_listado.php",
         type: "POST",
         data: formData,
         async: false,beforeSend:function() {
           $('#search_nomina_jquery_buttom').attr('disabled', 'true');
         },
          success:function(e) {
            $('#search_nomina_jquery').fadeOut(0).html(e).fadeIn(1000);
            // tiempo para evitar que spamen este botom y evitar error con data table
            setTimeout(function () {
            $('#search_nomina_jquery_buttom').removeAttr('disabled');
          }, 800);
          },error:function() {
           setTimeout(function () {
             alertify.error('Sistema: La pagina solicitada esta colgada');
             $('#search_nomina_jquery_buttom').removeAttr('disabled');
         }, 800);
         },
         cache: false,
         contentType: false,
         processData: false
     });
     e.preventDefault();
 });
 $('#search_nomina_corredor_jquery_form').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/nominas/nomina_corredor_listado.php",
         type: "POST",
         data: formData,
         async: false,beforeSend:function() {
           $('#search_nomina_jquery_buttom').attr('disabled', 'true');
         },
          success:function(e) {
            $('#search_nomina_corredor_jquery').fadeOut(0).html(e).fadeIn(1000);
            // tiempo para evitar que spamen este botom y evitar error con data table
            setTimeout(function () {
            $('#search_nomina_jquery_buttom').removeAttr('disabled');
          }, 800);
          },error:function() {
           setTimeout(function () {
             alertify.error('Sistema: La pagina solicitada esta colgada');
             $('#search_nomina_jquery_buttom').removeAttr('disabled');
         }, 800);
         },
         cache: false,
         contentType: false,
         processData: false
     });
     e.preventDefault();
 });

 //  _                                      _ _            _
 // | |__   ___  _ __ _ __ __ _ _ __    ___| (_) ___ _ __ | |_ ___
 // | '_ \ / _ \| '__| '__/ _` | '__|  / __| | |/ _ \ '_ \| __/ _ \
 // | |_) | (_) | |  | | | (_| | |    | (__| | |  __/ | | | ||  __/
 // |_.__/ \___/|_|  |_|  \__,_|_|     \___|_|_|\___|_| |_|\__\___|
 //
 //

 function Eliminar_cliente(id_cliente) {
   alertify.confirm("Sistema: ¿Realmente quieres Eliminar Este Cliente? <br> <center>Preciona 'OK' para Eliminar. </center>",
   function(){
   alertify.success('Sistema:Eliminando del sistema...');
   $.ajax({
     type:'POST',
     data:'id='+id_cliente,
     url:'vistas/acciones/cliente/Eliminar_cliente.php',
     success:function(msg) {
       $('#Alerta_new_surtidora').html(msg);
       // para crear tiempo para la recarga de la vista
         setTimeout(function () {
         }, 500);
     }
   })
   },
   function(){
   alertify.error('Sistema: Cancelado');
   });
 };


 //  ____                               ____                        _
 // | __ )  ___  _ __ _ __ __ _ _ __   / ___|___  _ __ _ __ ___  __| | ___  _ __
 // |  _ \ / _ \| '__| '__/ _` | '__| | |   / _ \| '__| '__/ _ \/ _` |/ _ \| '__|
 // | |_) | (_) | |  | | | (_| | |    | |__| (_) | |  | | |  __/ (_| | (_) | |
 // |____/ \___/|_|  |_|  \__,_|_|     \____\___/|_|  |_|  \___|\__,_|\___/|_|
 //

function Eliminar_corredor(e) {
  alertify.confirm("Sistema: ¿Realmente quieres Eliminar Este corredor? <br>  <center>Preciona 'OK' para Eliminar. <br><br> <center><i class='fas fa-exclamation-triangle fa-3x m-2 text-warning animated bounce infinite'></i></center></center> <cite>Nota: Al eliminar el corredor no afectara los cliente que previamente tengan el nombre de dicho corredor en su registro, pero no aparecera en la lista para selecionarlo para futuros cliente o modificaciones. </cite><br>",
    function () {
      alertify.success('Sistema:Eliminando del sistema...');

      $.ajax({
        type:'POST',
        data:'id='+e,
        url:'vistas/acciones/corredor/eliminar_corredor.php',
        success:function(msg) {
          $('#Alerta_new_surtidora').html(msg);
          // para crear tiempo para la recarga de la vista
            setTimeout(function () {
                Listado_corredor_de_bolsa(idSession);
            }, 500);
        }
      })
    },function () {
       alertify.error('Sistema: Cancelado');
    });
};





 //
 //                                      _ _            _
 //  _ __   __ _  __ _  __ _ _ __    ___| (_) ___ _ __ | |_ ___
 // | '_ \ / _` |/ _` |/ _` | '__|  / __| | |/ _ \ '_ \| __/ _ \
 // | |_) | (_| | (_| | (_| | |    | (__| | |  __/ | | | ||  __/
 // | .__/ \__,_|\__, |\__,_|_|     \___|_|_|\___|_| |_|\__\___|
 // |_|          |___/
 ///


 function Nomina_cliente_pagar(e) {
   $('.progress-bar').css('width', 0+'%');
   alertify.confirm("<center><i class='fas fa-exclamation fa-4x text-warning animated shake '></i><br><br> Sistema: Esta apunto de aplicar un pago. ¿Esta seguro? <br> El cliente recibira un correo notificandole que se le aplico el pago.<br><br><br> Sistema: Selecione foto de la factura de esta transacción (peso maximo 3MB) <br><input type='file' id='file' value=''><Br><Br>Sistema: Por favor llene esta casilla..<BR><input type='text' id='Numero_tiker'placeholder='Numero de transacción'  class='form-control'><br>Sistema: Selecione fecha si, desea almacenar el pago como que se realizó en una fecha específica. <Br>  <input type='date' id='fecha' name='fecha' class='form-control' value='' /> ",
     function () {
       $('#carga_progreso').modal('show');
       img=document.getElementById('file').files[0];
       fecha=$('#fecha').val();
       numero_tran=$('#Numero_tiker').val();
       formData = new FormData();
       formData.append("photo", img);
       formData.append("fecha", fecha);
       formData.append("Numero_factura", numero_tran);
       formData.append("id", e);
       $.ajax({
         type:'POST',
          dataType: "html",
         data:formData,
         url:' vistas/acciones/nominas/pay_clienteV1_cliente.php',
         cache: false,
         contentType: false,
         processData: false,
         xhr: function () {
        var xhr = $.ajaxSettings.xhr();
         xhr.upload.onprogress = function (e) {
            // For uploads
            if (e.lengthComputable) {
                var percentComplete =(e.loaded / e.total);
                console.log($por=Math.round(percentComplete * 100));
                $('.progress-bar').attr('data-progress',$por );
                $('.progress-bar').css('width', $por+'%');
            }
        };
        return xhr;
    },
         beforeSend:function (e) {
           alertify.success('Sistema: Procesando datos....');
         },
         success:function(msg) {
           $('#Alerta_new_surtidora').html(msg);
           // para crear tiempo para la recarga de la vista
           alertify.success('Sistema: Todo los datos Recibido');
             setTimeout(function () {
               $('#carga_progreso').modal('toggle');
             }, 500);
         }
       })
     },function () {
        alertify.error('Sistema: Pago Cancelado');
     });
 };
 function Nomina_gestor_pagar(e) {
   $('.progress-bar').css('width', 0+'%');
   alertify.confirm("<center><i class='fas fa-exclamation fa-4x text-warning animated shake '></i><br><br> Sistema: Esta apunto de aplicar un pago. ¿Esta seguro? <br> El Gestor de Capital recibira un correo notificandole que se le aplico el pago.<br><br><br> Sistema: Selecione foto de la factura de esta transacción (peso maximo 3MB) <br><input type='file' id='file' value=''><Br><Br>Sistema: Por favor llene esta casilla..<BR><input type='text' id='Numero_tiker' class='form-control'> ",
     function () {
       $('#carga_progreso').modal('show');
       img=document.getElementById('file').files[0];
       numero_tran=$('#Numero_tiker').val();
       formData = new FormData();
       formData.append("photo", img);
       formData.append("Numero_factura", numero_tran);
       formData.append("id", e);
       $.ajax({
         type:'POST',
          dataType: "html",
         data:formData,
         url:' vistas/acciones/nominas/pay_gestor_capitalv1.php',
         cache: false,
         contentType: false,
         processData: false,
         xhr: function () {
        var xhr = $.ajaxSettings.xhr();
         xhr.upload.onprogress = function (e) {
            // For uploads
            if (e.lengthComputable) {
                var percentComplete =(e.loaded / e.total);
                console.log($por=Math.round(percentComplete * 100));
                $('.progress-bar').attr('data-progress',$por );
                $('.progress-bar').css('width', $por+'%');
            }
        };
        return xhr;
    },
         beforeSend:function (e) {
           alertify.success('Sistema: Procesando datos....');
         },
         success:function(msg) {
           $('#Alerta_new_surtidora').html(msg);
           // para crear tiempo para la recarga de la vista
           alertify.success('Sistema: Todo los datos Recibido');
             setTimeout(function () {
               $('#carga_progreso').modal('toggle');
             }, 500);
         }
       })
     },function () {
        alertify.error('Sistema: Pago Cancelado');
     });
 };

 //
 //  _____     _     _          ____ _ _            _             _   _                       _
 // |_   _|_ _| |__ | | __ _   / ___| (_) ___ _ __ | |_ ___      | \ | | ___  _ __ ___  _ __ (_)_ __   __ _
 //   | |/ _` | '_ \| |/ _` | | |   | | |/ _ \ '_ \| __/ _ \     |  \| |/ _ \| '_ ` _ \| '_ \| | '_ \ / _` |
 //   | | (_| | |_) | | (_| | | |___| | |  __/ | | | ||  __/     | |\  | (_) | | | | | | | | | | | | | (_| |
 //   |_|\__,_|_.__/|_|\__,_|  \____|_|_|\___|_| |_|\__\___|     |_| \_|\___/|_| |_| |_|_| |_|_|_| |_|\__,_|
 //

function tabla_query_nomina(e) {
  $.ajax({
    type:'POST',
    data:'id='+e,
    url:'vistas/nomina/tabla_nomina.php',
    success:function(msg) {
      $('#tabla_query_nomina').html(msg);
    }
  })
};

function tabla_query_Aumento(e) {
  $.ajax({
    type:'POST',
    data:'id='+e,
    url:'vistas/utilidades/tabla_aumento.php',
    success:function(msg) {
      $('#tabla_query_Aumento').html(msg);
    }
  })
};

 // __     __    _ _     _                    _      _
 // \ \   / /_ _| (_) __| | __ _ _ __   _ __ (_) ___| | __
 //  \ \ / / _` | | |/ _` |/ _` | '__| | '_ \| |/ __| |/ /
 //   \ V / (_| | | | (_| | (_| | |    | | | | | (__|   <
 //    \_/ \__,_|_|_|\__,_|\__,_|_|    |_| |_|_|\___|_|\_\
 //

function Validar_nick(e) {
  $.ajax({
    type:'POST',
    data:'id='+e,
    url:'vistas/acciones/admin/validar_disponibilidad.php',
    success:function(msg) {
      $('#contenido').html(msg);
    }
  })
}

 //
 //     _   _                 _
 //    / \ | |_ ___ _ __   __| | ___ _ __
 //   / _ \| __/ _ \ '_ \ / _` |/ _ \ '__|
 //  / ___ \ ||  __/ | | | (_| |  __/ |
 // /_/   \_\__\___|_| |_|\__,_|\___|_|
 //
 //

function Atender(e) {
  alertify.confirm('Sistema: ¿Se Comunico con el cliente?',function () {
    $.ajax({
      type:'POST',
      data:'id='+e,
      url:'vistas/acciones/utilidades/atender_contactos.php',
      success:function(msg) {
        $('#contenido').html(msg);
          información();
      }
  });
  })
};

 //            _            _
 //   ___ __ _| | ___ _   _| | __ _ _ __
 //  / __/ _` | |/ __| | | | |/ _` | '__|
 // | (_| (_| | | (__| |_| | | (_| | |
 //  \___\__,_|_|\___|\__,_|_|\__,_|_|
 //
 $('#form_calculadora_funcion').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/utilidades/calculadora_funcion.php",
         type: "POST",
         data: formData,
         async: false,beforeSend:function() {
           $('#search_cliente_jquery_buttom').attr('disabled', 'true');
         },
          success:function(e) {
            $('#Calcuadora_vistas').fadeOut(0).html(e).fadeIn(1000);
            // tiempo para evitar que spamen este botom y evitar error con data table
            setTimeout(function () {
              // $('#form_calculadora_funcion')[0].reset();
            $('#search_cliente_jquery_buttom').removeAttr('disabled');
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
 });

 //
 //                      _     _                                                        _
 //   ___ __ _ _ __ ___ | |__ (_) __ _ _ __   _ __   __ _ ___ _____      _____  _ __ __| |
 //  / __/ _` | '_ ` _ \| '_ \| |/ _` | '__| | '_ \ / _` / __/ __\ \ /\ / / _ \| '__/ _` |
 // | (_| (_| | | | | | | |_) | | (_| | |    | |_) | (_| \__ \__ \\ V  V / (_) | | | (_| |
 //  \___\__,_|_| |_| |_|_.__/|_|\__,_|_|    | .__/ \__,_|___/___/ \_/\_/ \___/|_|  \__,_|
 //                                          |_|
 //

  $('#form_cambio_contraseña_admin').submit(function(e){
    var formData = new FormData($(this)[0]);
    if ($('input[name=password_anterior]').val()==$('#password').val()) {

    if ($('input[name=password_confirm]').val()==$('input[name=password_new]').val()) {

      $.ajax({
          url: "vistas/acciones/admin/Cambiar_contraseña.php",
          type: "POST",
          data: formData,
          async: false,beforeSend:function() {
            $('#search_cliente_jquery_buttom').attr('disabled', 'true');
          },
           success:function(e) {
             $('#Change_vista').fadeOut(0).html(e).fadeIn(1000);
             // tiempo para evitar que spamen este botom y evitar error con data table
             setTimeout(function () {
             $('#search_cliente_jquery_buttom').removeAttr('disabled');
             $('#cambio_contraseña').modal('toggle');
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
      $('#form_cambio_contraseña_admin')[0].reset();
    }else {
      // aca mensaje
      alertify.error('Sistema: Las contraseña, no coinciden.');
    }
  }else {
    alertify.error('Sistema: La contraseña Actual es incorrecta.');
  }
  });

 //
 //   ____                _     _               __       _
 //  / ___|__ _ _ __ ___ | |__ (_) __ _ _ __   / _| ___ | |_ ___
 // | |   / _` | '_ ` _ \| '_ \| |/ _` | '__| | |_ / _ \| __/ _ \
 // | |__| (_| | | | | | | |_) | | (_| | |    |  _| (_) | || (_) |
 //  \____\__,_|_| |_| |_|_.__/|_|\__,_|_|    |_|  \___/ \__\___/
 //
 //

 function Change_photo() {
   $('.progress-bar').css('width', 0+'%');
   alertify.confirm("<center><i class='fas fa-exclamation fa-4x text-warning animated shake '></i><br><br> Sistema: Esta apunto Cambiar su foto de perfil. ¿Esta seguro? <br>Sistema: Selecione la nueva foto de perfil (peso maximo recomendado 3MB) <br><input type='file' id='file' value='' accept='image/jpeg'></center> ",
     function () {
       $('#carga_progreso').modal('show');
       img=document.getElementById('file').files[0];
       formData = new FormData();
       formData.append("photo", img);
       formData.append("id", idSession);
       $.ajax({
         type:'POST',
          dataType: "html",
         data:formData,
         url:' vistas/acciones/admin/cambiar_foto.php',
         cache: false,
         contentType: false,
         processData: false,
         xhr: function () {
        var xhr = $.ajaxSettings.xhr();
         xhr.upload.onprogress = function (e) {
            // For uploads
            if (e.lengthComputable) {
                var percentComplete =(e.loaded / e.total);
                console.log($por=Math.round(percentComplete * 100));
                $('.progress-bar').attr('data-progress',$por );
                $('.progress-bar').css('width', $por+'%');
            }
        };
        return xhr;
    },
         beforeSend:function (e) {
           alertify.success('Sistema: Procesando datos....');

         },
         success:function(msg) {
           $('#Alerta_new_surtidora').html(msg);
           // para crear tiempo para la recarga de la vista
           alertify.success('Sistema: Todo los datos Recibido');
             setTimeout(function () {
               $('#carga_progreso').modal('toggle');
             }, 500);
         }
       })
     },function () {
        alertify.error('Sistema: Pago Cancelado');
     });
 };


  //     _                              _               ___                         _
  //    / \  _   _ _ __ ___   ___ _ __ | |_ __ _ _ __  |_ _|_ ____   _____ _ __ ___(_) ___  _ __
  //   / _ \| | | | '_ ` _ \ / _ \ '_ \| __/ _` | '__|  | || '_ \ \ / / _ \ '__/ __| |/ _ \| '_ \
  //  / ___ \ |_| | | | | | |  __/ | | | || (_| | |     | || | | \ V /  __/ |  \__ \ | (_) | | | |
  // /_/   \_\__,_|_| |_| |_|\___|_| |_|\__\__,_|_|    |___|_| |_|\_/ \___|_|  |___/_|\___/|_| |_|
  //


  
    $('#search_Aumentar_inversion_jquery_form').submit(function(e){
      var checkBox = document.getElementById("Check_Articulo");
      var formData = new FormData($(this)[0]);
        $.ajax({
            url: "vistas/acciones/utilidades/Listas_Aumentar.php",
            type: "POST",
            data: formData,
            async: false,beforeSend:function() {
              $('#search_cliente_jquery_buttom').attr('disabled', 'true');
            },
             success:function(e) {
               $('#search_cliente_jquery').fadeOut(0).html(e).fadeIn(1000);
               // tiempo para evitar que spamen este botom y evitar error con data table
               setTimeout(function () {
               $('#search_cliente_jquery_buttom').removeAttr('disabled');
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
    });

 //     _                              _              ___                         _   __
 //    / \  _   _ _ __ ___   ___ _ __ | |_ __ _ _ __ |_ _|_ ____   _____ _ __ ___(_) /_/  _ __
 //   / _ \| | | | '_ ` _ \ / _ \ '_ \| __/ _` | '__| | || '_ \ \ / / _ \ '__/ __| |/ _ \| '_ \
 //  / ___ \ |_| | | | | | |  __/ | | | || (_| | |    | || | | \ V /  __/ |  \__ \ | (_) | | | |
 // /_/   \_\__,_|_| |_| |_|\___|_| |_|\__\__,_|_|___|___|_| |_|\_/ \___|_|  |___/_|\___/|_| |_|
 //                                             |_____|
 //
