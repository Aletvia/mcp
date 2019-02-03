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
    <!-- container -->
	<?php foreach ($imagen as $u) {
		//echo($u->foto);?>
	
	 <img src="data:image/jpg;base64,<?php echo base64_encode($u->foto); ?>" />
	 
	<?php }?>
	 
    <!-- container -->
</body>
</html>