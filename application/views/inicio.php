<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Microprestamos</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link href="<?= base_url() ?>assets/css/img/favicon.png" rel="icon">
  <link href="<?= base_url() ?>assets/css/img/apple-touch-icon.png" rel="microprestamos123">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Raleway:400,300,700,900" rel="stylesheet">

  <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/php-mail-form/validate.js"></script>
<script src="<?= base_url() ?>assets/chart/chart.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>

<body>
  <!-- Fixed navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="https://microprestamos123.com/">
          <img src="<?= base_url() ?>assets/css/img/apple-touch-icon.png" alt="Microprestamos123" >
        </a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="index.html">Inicio</a></li>
          <li><a data-toggle="modal" data-target="#Register" href="#Register">Registro</a></li>
          <li><a data-toggle="modal" data-target="#myModal" href="#myModal">Iniciar sesión</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

  <div id="headerwrap">
    <div class="container">
      <div class="row centered">
        <div class="col-lg-6 " style="margin-top:35px" >
          <div class="fl_l w_70 slider_personalloan">
            <div class="slider-form">
              <h3>Solicita tu préstamo</h3>
              <div class="row" id="personalloan_0_form">
                <div class="step amount col-lg-6 col-md-6 col-sm-12 col-xs-12"><!--MONTO------>
                  <label class="fl_l_m_10"> Monto </label>
                  <div class="slider_cont">
                    <span id="txt_monto" class="fl_l_m_16 amount_display">$1500.00</span>
                  </div>
                  <div class="""slidecontainer" style="margin-top:10px" >
                    <input type="range" min="1000" max="2000" value="1500" class="slider" id="monto">
                  </div>
                </div><!--MONTO------>
                <div class="step stepPeriod col-lg-6 col-md-6 col-sm-12 col-xs-12"><!--PLAZO------>
                  <label class="fl_l_m_10">Plazo </label>
                  <div class="slider_cont">
                    <span id="txt_tiempo" class="fl_l_m_16 period_display">15 días</span>
                  </div>
                  <div class="""slidecontainer" style="margin-top:10px" >
                    <input type="range" min="1" max="30" value="15" class="slider" id="tiempo">
                  </div>
                </div><!--PLAZO------>
              </div>
            </div>
            <!---CALCULOS------>
            <div class="slider-form " style="margin-top:30px" >
              <div class="row centered" id="personalloan_0_form">
                <div class=" col-lg-3 col-md-3 col-sm-12 col-xs-12"><!--MONTO------>
                  <div class="fl_l_m_15">
                    <label class="fl_l_m_10"> Préstamo </label>
                    <div class="slider_cont">
                      <span id="txt_prestamo" class=" amount_display">$1500.00</span>
                    </div>
                  </div>
                </div><!--MONTO------>
                <div class=" col-lg-1 col-md-1 col-sm-12 col-xs-12"><!--+------>
                  <div class="fl_l_m_14">
                    <label class="fl_l_m_10">&nbsp</label>
                    <div class="slider_cont">
                      <span id="txt_prestamo" class=" amount_display"><b>+</b></span>
                    </div>
                  </div>
                </div><!--+------>
                <div class=" col-lg-3 col-md-3 col-sm-12 col-xs-12"><!--PLAZO------>
                  <div class="fl_l_m_15">
                    <label class="fl_l_m_10">Interés </label>
                    <div class="slider_cont">
                      <span id="txt_interes" class=" period_display">$207.08</span>
                    </div>
                  </div>
                </div><!--PLAZO------>
                <div class=" col-lg-1 col-md-1 col-sm-12 col-xs-12"><!--=------>
                  <div class="fl_l_m_14">
                    <label class="fl_l_m_10">&nbsp</label>
                    <div class="slider_cont">
                      <span id="txt_prestamo" class=" amount_display"><b>=</b></span>
                    </div>
                  </div>
                </div><!--=------>
                <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12"><!--PLAZO------>
                  <div class="fl_l_m_15">
                    <label class="fl_l_m_10">Total </label>
                    <div class="slider_cont">
                      <span id="txt_total" class=" period_display">$1207.08</span>
                    </div>
                  </div>
                </div><!--PLAZO------>
              </div><!--ROW----->
              <div class="row" style="margin-top:30px" >
                <button onclick="enviar_solicitud()" class="btn btn-success d-inline float-right" style="color:white;font-weight:bold">&nbsp&nbsp&nbspENVÍA TU SOLICITUD&nbsp&nbsp&nbsp</button>
              </div>
              <div class="row" style="margin-top:20px" >
                <span id="txt_total" class=" period_display">Tasa fija anual: <b>428.4%</b></span>
              </div>
            </div><!--slider-form-->
          </div><!--slider_personalloan------->
        </div><!--col-lg-6 --------->
      </div>
    </div>
    <!-- row -->
  </div>
  <!-- container -->
</div>
<!-- headerwrap -->

<div style="background: #56ab2f;color:white;padding-top: 7px;padding-bottom: 0px;" 	>
  <div class="centered">
    <p>Horario de atención telefónica 00:00 a 00:00 horas de Lunes a Viernes.</p>
  </div>
  <!-- row -->
  <!-- container -->
</div>


<div class="container w">
  <div class="row centered">
    <br><br>
    <div class="col-lg-4">
      <i class="fa fa-heart"></i>
      <h4>PASO 1</h4>
      <p class="j">
        Descripción breve del paso.Descripción breve del paso.Descripción breve del paso.Descripción breve del paso.
      </p>
    </div>
    <!-- col-lg-4 -->

    <div class="col-lg-4">
      <i class="fa fa-laptop"></i>
      <h4>PASO 2</h4>
      <p class="j">
        Descripción breve del paso.Descripción breve del paso.Descripción breve del paso.Descripción breve del paso.
      </p>
    </div>
    <!-- col-lg-4 -->

    <div class="col-lg-4">
      <i class="fa fa-trophy"></i>
      <h4>PASO 3</h4>
      <p class="j">
        Descripción breve del paso.Descripción breve del paso.Descripción breve del paso.Descripción breve del paso.
      </p>
    </div>
    <!-- col-lg-4 -->
  </div>
  <!-- row -->
  <br>
  <br>
</div>
<!-- container -->


<div id="r">
  <div class="container">
    <div class="row centered">
      <div class="col-lg-8 col-lg-offset-2">
        <h4>Requisitos para pedir un préstamo.</h4>
        <p><i class="fa fa-check"></i>
          &nbspDescripción del requisito, descripción del requisito, descripción del requisito.<br>
          <i class="fa fa-check"></i>
          &nbspDescripción del requisito, descripción del requisito, descripción del requisito.<br>
          <i class="fa fa-check"></i>
          &nbspDescripción del requisito, descripción del requisito, descripción del requisito.<br>
          <i class="fa fa-check"></i>
          &nbspDescripción del requisito, descripción del requisito, descripción del requisito.</p>
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- FEATURE SECTION -->
  <div class="container wb">
    <div class="row">
      <br><br>
      <div class="col-lg-5 col-lg-offset-1">
        <h4>Servicios especializados</h4>
        <p class="j">By being true to the brand we represent, we elevate the audiences’ relationship to it. Like becomes love becomes a passion. Passion becomes advocacy. And we see the brand blossom from within, creating a whole story the audience embraces. That’s
          when the brand can truly flex its muscles.</p>
          <p><br/><br/></p>
        </div>
        <div class="col-lg-5">
          <h4>Beneficios a cuenta habientes</h4>
          <p class="j">By being true to the brand we represent, we elevate the audiences’ relationship to it. Like becomes love becomes a passion. Passion becomes advocacy. And we see the brand blossom from within, creating a whole story the audience embraces. That’s
            when the brand can truly flex its muscles.</p>
            <p><br/><br/></p>
          </div>
          <div class="col-lg-10 col-lg-offset-1">
            <h4>Preguntas frecuentes</h4>
            <h4 class="j">Redacción de pregunta, redacción de pregunta, redacción de pregunta, redacción de pregunta.</h4>
            <p class="j">Respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta.</p>

            <h4 class="j">Redacción de pregunta, redacción de pregunta, redacción de pregunta, redacción de pregunta.</h4>
            <p class="j">Respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta.</p>

            <h4 class="j">Redacción de pregunta, redacción de pregunta, redacción de pregunta, redacción de pregunta.</h4>
            <p class="j">Respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta.</p>

            <h4 class="j">Redacción de pregunta, redacción de pregunta, redacción de pregunta, redacción de pregunta.</h4>
            <p class="j">Respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta.</p>

            <h4 class="j">Redacción de pregunta, redacción de pregunta, redacción de pregunta, redacción de pregunta.</h4>
            <p class="j">Respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta, respuesta a pregunta.</p>

          </div>
        </div>
        <!-- row -->
      </div>
      <!-- container -->

      <div id="dg">
        <div class="container">
          <div class="row centered">
            <h4 style="color:white">Descarga nuestra aplicación</h4>
            <p style="color:white">Disponible para iOS y Android solo para cuenta habientes digitales de microprestamos123.com</p>
            <br>
            <div class="col-lg-4">
              <div class="tilt">
                <a href="#"><img src="<?= base_url() ?>assets/css/img/p01.png" alt=""></a>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="tilt">
                <a href="#"><img src="<?= base_url() ?>assets/css/img/p03.png" alt=""></a>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="tilt">
                <a href="#"><img src="<?= base_url() ?>assets/css/img/p02.png" alt=""></a>
              </div>
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- DG -->

      <div id="lg">
        <div class="container">
          <div class="row centered">
            <div class="col-lg-3 col-lg-offset-3">
              <img src="<?= base_url() ?>assets/css/img/logo_circulo.png" alt="">
            </div>
            <div class="col-lg-3">
              <img src="<?= base_url() ?>assets/css/img/logo_buro.png" alt="">
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- dg -->

      <!-- PORTFOLIO SECTION -->

      <!-- FOOTER -->
      <div id="f">
        <div class="container">
          <div class="row centered">
            <a onclick="window.open('https://www.youtube.com/channel/UCyoo7W_cJYXIUKF1gPj5Ajw','_blank');"><i class="fa fa-youtube"></i></a>
            <a onclick="window.open('https://www.instagram.com/microprestamos123/?hl=es-la','_blank');"><i class="fa fa-instagram"></i></a>
            <a onclick="window.open('https://www.facebook.com/microprestamo123/?modal=admin_todo_tour','_blank');"><i class="fa fa-facebook"></i></a>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- Footer -->

      <!-- MODAL FOR CONTACT -->
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" style="color:white" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel" style="color:white">Inicia Sesión</h4>
            </div>
            <div class="modal-body">
              <div class="row centered">

                <form id="form-sign" class="contact-form php-mail-form" action="<?= base_url() ?>index.php/Welcome/entrar" method="POST">

                  <div class="form-group">
                    <label for="contact-email">Correo electrónico</label>
                    <input type="email" name="em" class="form-control" id="em" placeholder="" data-rule="email" data-msg="Please enter a valid email">
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <label for="contact-subject">Contraseña</label>
                    <input type="password" name="pw" class="form-control" id="pw" placeholder="" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                    <div class="validate"></div>
                  </div>

                  <div class="loading"></div>
                  <div class="error-message">La información es incorrecta</div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <div class="form-send">
                    <button onclick="confirm()"  type="button" class="btn btn-large">Entrar</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- REGISTER FOR CONTACT -->
      <!-- Register -->
      <div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" style="color:white" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel" style="color:white">¡Regístrate!</h4>
            </div>
            <div class="modal-body">
              <div class="row centered">

                <form id="regform" class="contact-form php-mail-form" method="POST">

                  <div class="form-group">
                    <label for="contact-email">Nombre</label>
                    <input type="text" name="n" id="n" class="form-control" >
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <label for="contact-subject">CURP</label>
                    <input type="text" name="c" id="c"
                    pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"
                    class="form-control" >
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <label for="contact-email">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" >
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <label for="contact-subject">Contraseña</label>
                    <input type="password" name="p" id="p" class="form-control" >
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <label for="contact-subject">Contraseña</label>
                    <input type="password" name="pr" id="pr" class="form-control" >
                    <div class="validate"></div>
                  </div>
                  <div class="input-group" style="display: flex;justify-content: center;">
                    <input id="acept_t_p" type="checkbox" required name="acept_t_p" value="1">
                    <label for="checkbox">Acepto<a href="#">Términos de servicio</a> y <a href="#">Políticas de privacidad</a></label>
                  </div>

                  <div class="loading"></div>
                  <div class="error-message">La información es incorrecta.</div>
                  <div class="sent-message">Entrando</div>

                  <div class="form-send">
                    <button onclick="validar()"  type="button" class="btn btn-success">Enviar</button>
                    <br>
                    <b style="font-size: 15px;">¿Ya tienes una cuenta?<button type="button" class="btn btn-link" onclick="cambiar()">Inicia sesión</button></b>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.Register-content -->
        </div>
        <!-- /.Register-dialog -->
      </div>
      <!-- /.Register -->

      <div id="copyrights">
        <div class="container">
          <div class="credits j">
            Leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal.
            Leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal.
            Leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal.
            Leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal.
            Leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal, leyenda legal.
          </div>
          <p><br>
            &copy; Copyrights <strong>Microprestamos123</strong>. Todos los derechos reservados.
          </p>
        </div>
      </div>

      <form id="act" action="<?= base_url() ?>index.php/Welcome/informacion_solicitud" method="post">
        <input value="207.08"  id="interes" name="interes" type="hidden" >
        <input value="15"  id="time" name="time" type="hidden" >
        <input value="1500"  id="rode" name="rode" type="hidden" >
        <input value=""  id="us" name="us" type="hidden" >
      </form>
      <input value=""  id="sol" name="sol" type="hidden" >
      <script>
      var i = document.getElementById("interes");
      var t = document.getElementById("time");
      var r = document.getElementById("rode");
      var slider = document.getElementById("monto");
      var output = document.getElementById("txt_monto");
      var i1 = document.getElementById("txt_interes");
      var tt = document.getElementById("txt_total");
      var output_p = document.getElementById("txt_prestamo");
      var form1 = document.getElementById("act")
      output.innerHTML = slider.value;

      slider.oninput = function() {
        r.value=  this.value;
        output.innerHTML = "$"+this.value+".00";
        output_p.innerHTML = "$"+this.value+".00";
        calc();
      }
      var slider_t = document.getElementById("tiempo");
      var output_t = document.getElementById("txt_tiempo");
      output.innerHTML = slider.value;

      slider_t.oninput = function() {
        t.value= this.value;
        output_t.innerHTML = this.value+" días";
        calc();
      }

      function calc() {
        $.ajax({
          url:'<?= base_url() ?>index.php/Welcome/int',
          type : 'POST',
          data : { 'r' : r.value,'tm':t.value },
          success: function(rres){
            var arr = rres.split(",");
            i1.innerHTML="$"+arr[0];
            i.value=arr[0];
            tt.innerHTML="$"+arr[1];
          }
        });
      }
      function cambiar() {
        $('#Register').modal('hide');
        $('#myModal').modal('show');
      }
      function enviar_solicitud() {
        document.getElementById("sol").value=1;
        $('#Register').modal('show');
      }
      function confirm(){
        var p = document.getElementById("em").value
        var p2 = document.getElementById("pw").value
        var form = document.getElementById("form-sign")
        var frm=$( "#form-sign" );
        var datos = frm.serialize();
        datos = datos.replace("%40", "@");
        $.ajax({
          url:'<?= base_url() ?>index.php/Welcome/enviar',
          type : 'POST',
          data : datos,
          success: function(comp){
            console.log("respuesta: "+comp);
            var arr = comp.split(",");
            if(arr[0]!='Aprobado'){
              alert(arr[0]);
            }else{
              if(document.getElementById("sol").value==1)
              {
                //terminar solicitud
                document.getElementById("us").value=arr[1];
                form1.submit();
              }else{
                form.submit();
              }
            }
          }
        });
      }
      function validar() {
        var p = document.getElementById("p").value
        var p2 = document.getElementById("pr").value
        var form = document.getElementById("regform")
        var frm=$( "#regform" );
        var datos = frm.serialize();
        datos = datos.replace("%40", "@");
        var ch = document.getElementById("acept_t_p")
        if (p != p2){
          alert("Las contraseñas son diferentes.")
          return false
        }else {
          var nMay = 0, nMin = 0, nNum = 0
          var t1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
          var t2 = "abcdefghijklmnopqrstuvwxyz"
          var t3 = "0123456789"
          for (i=0;i<p.length;i++) {
            if ( t1.indexOf(p.charAt(i)) != -1 ) {nMay++}
            if ( t2.indexOf(p.charAt(i)) != -1 ) {nMin++}
            if ( t3.indexOf(p.charAt(i)) != -1 ) {nNum++}
          }
          if ( nMay>0 && nMin>0 && nNum>0 && p.length>7)
          {
            if(ch.checked){
              $.ajax({
                url:'<?= base_url() ?>index.php/Welcome/reg',
                type : 'POST',
                data : datos,
                success: function(comp){
                  var arr = comp.split(",");
                  console.log("respuesta: "+comp)
                  alert(arr[0]);
                  if(arr[0]=="Su registro se ha realizado con éxito."){
                    if(document.getElementById("sol").value==1)
                    {
                      //terminar solicitud
                      document.getElementById("us").value=arr[1];
                      form1.submit();
                    }else{
                      $('#Register').modal('hide');
                    }
                  }
                }
              });
            }else{
              alert("Debe aceptar los Términos y Políticas");
              return;
            }
          }
          else
          { alert("Su password debe contener minimo 8 caracteres con mayúsculas, minúscula y números."); form.p.focus(); return; }
        }
      }
      </script>

    </body>
    </html>
