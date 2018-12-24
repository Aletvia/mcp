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
		<div class="subcontenedor">
			<div class="centered">
			<img  style="width:150px;margin-top:30px"  class="centered" src="<?= base_url() ?>assets/css/img/logobg.png" alt="Microprestamos123">
			</div>
			<div class="contenedorForm " style="margin-top:-70px">
				
				<div class="contenedorInputs d-flex justify-content-center flex-wrap">
					<form id="loginform" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"
					action="<?= base_url() ?>index.php/Microprestamos/enviar" method="post">
                                    									
                            <div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span class="input-group-prepend">
											<div class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i></div>
										</span>										
                                        <input id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" required autofocus placeholder="Correo">                                        
                            </div>
									
                            <div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span class="input-group-prepend">
											<div class="input-group-text bg-white border-right-0"><i class="fa fa-key"></i></div>
										</span>										
                                        <input id="p" pattern="^([A-Za-z0-9]{8,})$" type="password" class="form-control input-sm" name="p" required  placeholder="Contraseña">
                            </div>
						

                            <div style="margin-top:10px;" class="form-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- Button -->
								<div class="controls text-center">
									<button  type="submit" id="singin" style="width:100%" class="button registrar">Iniciar sesión</button>
								</div>
                            </div>
							    
                    </form>    
				</div>
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
  <!-- Template Main Javascript File -->
  <script src="<?= base_url() ?>assets/js/main.js"></script>

</body>
</html>
