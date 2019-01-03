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
		<div class="subcontenedor">
			<h1 class="col-lg-12 col-md-12 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
			Realiza tu Pre registro y disfruta de sus beneficios así como la tasa de interés más baja durante todo el 2019 exclusivamente para nuestros usuarios en etapa de pre registro.</h1>

			<div class="col-lg-12 col-md-12 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				<h1 class="bgwt col-lg-12 col-md-12 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				<br>Prestamos hasta $2,000.00 Rápido, fácil y simple.<br>Lanzamiento 19 de Marzo del 2019<br><br></h1>
			</div>
			<div class="centered">
				<img  style="width:150px;margin-top:30px"  class="centered" src="<?= base_url() ?>assets/css/img/logobg.png" alt="Microprestamos123">
			</div>
			<div class="col-lg-12 col-md-12 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				<div class="contenedorForm" style="margin-top:-70px">
					
					<div class="contenedorInputs d-flex justify-content-center flex-wrap">
						<form id="loginform" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"
						action="<?= base_url() ?>index.php/Welcome/registro" method="post">
										
								<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div class="input-group-text bg-white border-right-0">&nbsp<i class="fa fa-user"></i>&nbsp</div>
											</span>										
											<input id="n" type="text" class="form-control input-sm" name="n" required  placeholder="Nombre completo">                                        
								</div>
									
								<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div class="input-group-text bg-white border-right-0"><i class="fa fa-id-card"></i></div>
											</span>										
											<input pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" id="c" type="text" class="form-control input-sm" name="c" required  placeholder="CURP">                                        
								</div>
										
								<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div class="input-group-text bg-white border-right-0">&nbsp<i class="fa fa-envelope"></i></div>
											</span>										
											<input id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" required  placeholder="Correo">                                        
								</div>
										
								<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div class="input-group-text bg-white border-right-0">&nbsp<i class="fa fa-key"></i></div>
											</span>										
											<input id="p" pattern="^([A-Za-z0-9]{8,})$" type="password" class="form-control input-sm" name="p" required  placeholder="Contraseña">
								</div>
										
								<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div class="input-group-text bg-white border-right-0">&nbsp<i class="fa fa-key"></i></div>
											</span>										
											<input id="pc" pattern="^([A-Za-z0-9]{8,})$" type="password" class="form-control input-sm" name="pc" required  placeholder="Confirmar contraseña">
								</div>
							
								<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div class="input-group-text bg-white border-right-0">&nbsp<i class="fa fa-birthday-cake"></i></div>
											</span>										
											<input id="b" type="date" class="form-control input-sm" name="b" min="1940-04-01" required >
											<span class="validity"></span>
								</div>
								
								<div style="margin-bottom: 25px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div class="input-group-text bg-white border-right-0"><i class="fa fa-globe"></i>&nbsp</div>
											</span>	
											<select id="es" name="es" class="form-control input-sm" required onchange="municipios()" >
											<option value="33">Estado</option>
											<option value="33">Otro</option>
											<?php
												foreach ($estados as $e) { 
												if($e->id_estado!=33){?>
												<option value="<?= $e->id_estado ?>"> <?= $e->estado; ?></option>
												<?php }}?>
											</select>
								</div>
								
								<div style="margin-bottom: 25px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div class="input-group-text bg-white border-right-0">&nbsp<i class="fa fa-map-marker"></i>&nbsp</div>
											</span>										
											<select id="m" name="m" class="form-control input-sm" required >
											<option value="1"><i class="glyphicon glyphicon-map-marker"></i> Municipio</option>
											
											</select>
								</div>
									
								<div class="input-group" style="display: flex;justify-content: center;">
									<input id="acept_t_p" type="checkbox" required name="acept_t_p" value="1"> 
									<label for="checkbox">Acepto<a href="#">Términos de servicio</a> y <a href="#">Políticas de privacidad</a></label>
								</div>


								<div style="margin-top:10px;" class="form-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- Button -->
									<div class="controls text-center">
										<button  onclick="validar()" type="button" id="registrar" style="width:100%" class="button registrar">Pre-registro</button>
									</div>
								</div>
									
						</form>    
					</div>
				</div>
			</div>
			<h5 class="center col-lg-12 col-md-12 col-sm-12 col-xs-12">
			Próximamente descarga nuestra APP solo para ususarios.<br>
			</h5>
			<div id="store" style="margin-bottom:50px;margin-top:20px;" 
			class="centered col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<img class="img-fluid" src="<?= base_url() ?>assets/css/img/stores.png" alt="Apple Store">
			</div>
			<div style="margin-bottom:50px" class="centered">
				<img  style="height:90px;" src="<?= base_url() ?>assets/css/img/p1.png" alt="Registro">
				<img style="height:90px;" src="<?= base_url() ?>assets/css/img/p2.png" alt="Aprobación">
				<img style="height:90px;" src="<?= base_url() ?>assets/css/img/p3.png" alt="Depósito">
			</div> 
		</div>			
      <!-- preregister -->
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
        var p = document.getElementById("p").value
        var p2 = document.getElementById("pc").value
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
			if(ch.checked){
				form.submit()
			}else{
				alert("Debe aceptar los Términos y Políticas"); form.ch.focus(); return;
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