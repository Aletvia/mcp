<!DOCTYPE html>
<html lang="en">

	<script>
	alert('<?=$mj?>');
  </script>
<head>
  <meta charset="utf-8">
  <title>Microprestamos123</title>
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

<body>
-- Fixed navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="https://microprestamos123.com/"><img src="<?= base_url() ?>assets/css/img/apple-touch-icon.png" alt="Microprestamos123" ></a>
      </div>
    </div>
  </div>
  
    <div class="container" >
	<h1 class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1  col-xs-12">
	Realiza tu Pre registro y disfruta de sus beneficios así como la tasa de interés más baja durante todo el 2019 exclusivamente para nuestros usuarios en etapa de pre registro.</h1>

		<h1 class="bgwt col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1  col-xs-12">
		<br><br>Prestamos hasta $2,000.00 Rápido, fácil y simple.<br>Lanzamiento 19 de Marzo del 2019<br><br><br></h1>

		<div id="preregister"  style="margin-top:30px;" class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12" >
			<div style="padding-top:30px" class="panel-body " >
					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form id="loginform" class="form-horizontal" role="form" style="margin-top:90px"
					action="<?= base_url() ?>index.php/Welcome/cadastrar" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group col-sm-offset-2 col-sm-8 col-xs-12 col-md-6 col-md-offset-3">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="n" type="text" class="form-control input-sm" name="n" required  placeholder="Nombre completo">                                        
                            </div>
                                
                            <div style="margin-bottom: 25px" class="input-group col-sm-offset-2 col-sm-8 col-xs-12 col-md-6 col-md-offset-3">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                        <input pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" id="c" type="text" class="form-control input-sm" name="c" required  placeholder="CURP">                                        
                            </div>
									
                            <div style="margin-bottom: 25px" class="input-group col-sm-offset-2 col-sm-8 col-xs-12 col-md-6 col-md-offset-3">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" required  placeholder="Correo">                                        
                            </div>
									
                            <div style="margin-bottom: 25px" class="input-group col-sm-offset-2 col-sm-8 col-xs-12 col-md-6 col-md-offset-3">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="p" pattern="^([A-Za-z0-9]{8,})$" type="password" class="form-control input-sm" name="p" required  placeholder="Contraseña">
                            </div>
                                    
                            <div style="margin-bottom: 25px" class="input-group col-sm-offset-2 col-sm-8 col-xs-12 col-md-6 col-md-offset-3">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="pc" pattern="^([A-Za-z0-9]{8,})$" type="password" class="form-control input-sm" name="pc" required  placeholder="Confirmar contraseña">
                            </div>
						
                            <div style="margin-bottom: 25px" class="input-group col-sm-offset-2 col-sm-8 col-md-6 col-md-offset-3">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        <input id="b" type="date" class="form-control input-sm" name="b" min="1940-04-01" required >
										<span class="validity"></span>
                            </div>
							
                            <!--div style="margin-bottom: 25px" class="input-group col-sm-offset-2 col-sm-8 col-md-6 col-md-offset-3">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                        <select id="es" name="es" class="form-control input-sm" required >
										<option value="">Estado</option>
										<?php
											foreach ($estados as $e) { ?>
											<option value="<?= $e->id_estado ?>"> <?= $e->estado; ?></option>
										<?php }?>
										</select>
                            </div-->
							
                            <div style="margin-bottom: 25px" class="input-group col-sm-offset-2 col-sm-8 col-xs-12 col-md-6 col-md-offset-3">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <select id="m" name="m" class="form-control input-sm" required >
										<option value="">Municipio</option>
										<?php
											foreach ($municipios as $m) { ?>
											<option value="<?= $m->id_municipio ?>"> <?= $m->municipio; ?></option>
										<?php }?>
										</select>
                            </div>
                                
                            <div class="input-group col-sm-offset-2 col-sm-8 col-xs-12 col-md-6 col-md-offset-3">
                                      <div class="checkbox">
                                        <label>
                                          <input id="acept_t_p" type="checkbox" title="ffifififif" required name="acept_t_p" value="1"> <label for="checkbox">Acepto<a href="#">Términos de servicio</a> y <a href="#">Políticas de privacidad</a></label>
                                        </label>
                                      </div>
                             </div>


                            <div style="margin-top:10px" class="form-group">
							<!-- Button -->
								<div class="col-sm-10 col-sm-offset-1  col-xs-12 col-md-6 col-md-offset-3 controls text-center">
								<button  onclick="validar()" type="button" id="registrar" style="width:100%" class="button registrar">Pre-registro</button>
								</div>
                            </div>
							    
                    </form>               
				</div>  
		</div>
      <!-- preregister -->
	  <h5 class="centered col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1  col-xs-12">
			Próximamente descarga nuestra APP solo para ususarios.<br></h5>
		<div style="margin-bottom:50px;margin-top:20px" class="centered col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1  col-xs-8 col-xs-offset-2">
			<img class="col-xs-12 " src="<?= base_url() ?>assets/css/img/applestore.png" alt="Apple Store">
			<img <div class="slide a">class="col-xs-12 " src="<?= base_url() ?>assets/css/img/playstore.png" alt="Play Store">
		</div>
		<div style="margin-bottom:50px" class="centered col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
			<img  style="height:90px;" src="<?= base_url() ?>assets/css/img/p1.png" alt="Registro">
			<img style="height:90px;" src="<?= base_url() ?>assets/css/img/p2.png" alt="Aprobación">
			<img style="height:90px;" src="<?= base_url() ?>assets/css/img/p3.png" alt="Depósito">
		</div>
    </div>
    <!-- container -->

  <!-- JavaScript Libraries -->
  <script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/php-mail-form/validate.js"></script>
  <script src="<?= base_url() ?>assets/chart/chart.js"></script>
<script>
    function validar() {
        var p = document.getElementById("p").value
        var p2 = document.getElementById("pc").value
		var form = document.getElementById("loginform")
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
		form.submit()
		else 
		{ alert("Su password debe contener minimo 8 caracteres con mayúsculas, minúscula y números."); form.texto1.focus(); return; }
      }
    }

  </script>
  <!-- Template Main Javascript File -->
  <script src="<?= base_url() ?>assets/js/main.js"></script>

</body>
</html>
