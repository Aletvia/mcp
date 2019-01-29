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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/css/style_in.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">
          <img src="<?= base_url() ?>assets/css/img/apple-touch-icon.png" alt="">
        </a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>index.php/Microprestamos/usuarios">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>index.php/Microprestamos/clientes">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>index.php/Microprestamos/solicitudes">Solicitudes</a>
        </li>
        <!--li class="nav-item">
          <a class="nav-link" href="#">Solicitudes</a>
        </li-->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>index.php/Microprestamos/log_out">Cerrar sesión</a>
        </li>
    </ul>
  </div>
</nav>


  <!--div class="navbar navbar-inverse navbar-fixed-top">
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
          <li><a href="<?= base_url() ?>index.php/Microprestamos/usuarios">Usuarios</a></li>
          <li><a href="<?= base_url() ?>index.php/Microprestamos/clientes">Clientes</a></li>
          <li><a href="<?= base_url() ?>index.php/Microprestamos/clientes">Solicitudes</a></li>
          <li><a href="<?= base_url() ?>index.php/Microprestamos/log_out">Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
  </div-->
<br>

    <!-- container -->
    <div class="container w" >
