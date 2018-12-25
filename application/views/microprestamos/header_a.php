<!DOCTYPE html>
<html lang="es">
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
  
  <link href="<?= base_url() ?>assets/css/style_in.css" rel="stylesheet">

</head>

<body>
	<!-- Fixed navbar     <img src="<?= base_url() ?>assets/css/img/apple-touch-icon.png" alt="Microprestamos123" width="30" height="30" class="d-inline-block align-top" alt=""></a>-->
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
          <img src="<?= base_url() ?>assets/css/img/apple-touch-icon.png" alt="">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <!--li class="nav-item active">
          <a class="nav-link" href="#">Inicio
                <span class="sr-only">(current)</span>
              </a>
        </li-->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>index.php/Microprestamos/usuarios">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>index.php/Microprestamos/clientes">Clientes</a>
        </li>
        <!--li class="nav-item">
          <a class="nav-link" href="#">Solicitudes</a>
        </li-->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>index.php/Microprestamos/log_out">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- container -->
    <div class="container" >