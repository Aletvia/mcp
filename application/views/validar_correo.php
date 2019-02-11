<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Microprestamos123</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link href="<?= base_url() ?>assets/css/img/favicon.png" rel="icon">
  <link href="<?= base_url() ?>assets/css/img/apple-touch-icon.png" rel="microprestamos123">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Raleway:400,300,700,900" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- Fixed navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="https://microprestamos123.com/"><img src="<?= base_url() ?>assets/css/img/apple-touch-icon.png" alt="Microprestamos123" ></a>
      </div>
    </div>
  </div>

  <div class="contenedor d-flex justify-content-center" >
    <div class="j col-lg-10 col-lg-offset-1 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 ">

        <div class="centered col-lg-12 col-md-12 col-sm-12 col-xs-10 col-xs-offset-1">
          <h1 class="bgwt col-lg-12 col-md-12 col-sm-12 col-xs-10 col-xs-offset-1">
            <div class="row">
              <div class="centered col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <img  style="width:150px;margin-top:0px"  class="centered" src="<?= base_url() ?>assets/css/img/logobg.png" alt="Microprestamos123">
              </div>
              <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <h1 style="margin-top:30px"  >Tu correo electrónico ha sido validado con éxito.</h2>
                  <p>Muchas gracias por validar tu correo electrónico. La cuenta que acabas de validar será utilizada para contactarte en caso de ser necesario.</p>
              </div>
            </div>
          </div>
          <!-- preregister -->
        </div>
      </div>
        <!-- container -->

        <!-- JavaScript Libraries -->
        <script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/php-mail-form/validate.js"></script>
        <script src="<?= base_url() ?>assets/chart/chart.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script>
        function validar() {
          var y = document.getElementById("y").value
          var d = document.getElementById("d").value
          var m = document.getElementById("mt").value
          var p = document.getElementById("p").value
          var p2 = document.getElementById("pc").value
          var fn = document.getElementById("b")
          var form = document.getElementById("loginform")
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
              date = new Date(`${y}-${m}-${d}`)
              const isValidDate = (Boolean(+date) && date.getDate() == d)
              if(isValidDate && y>1949){
                if(ch.checked){
                  fn.value=y+"/"+m+"/"+d;
                  form.submit()
                }else{
                  alert("Debe aceptar los Términos y Políticas"); form.ch.focus(); return;
                }
              }else{
                alert("Verifica la fecha de nacimiento"); form.y.focus(); return;
              }
            }
            else
            { alert("Su password debe contener minimo 8 caracteres con mayúsculas, minúscula y números."); form.p.focus(); return; }
          }
        }

        function municipios() {
          var p = document.getElementById("es").value
          var m = document.getElementById("m")
          $.ajax({
            url:'<?= base_url() ?>index.php/Welcome/municipios',
            type : 'POST',
            data : { 'es' : p },
            success: function(cities)
            {
              $('#m').empty();
              $.each(cities,function(id,municipio)
              {
                m.append(new Option(municipio.mun, municipio.id));
              });
            }
          });
        }
        </script>
        <!-- Template Main Javascript File -->
        <script src="<?= base_url() ?>assets/js/main.js"></script>

      </body>
      </html>
