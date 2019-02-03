<html>
<head>
<title>Archivo actualizado</title>
</head>
<body>

<h3><?= $this->session->userdata('nombre')?> tu archivo ha sido actualizado!</h3>
<img src="<? = base_url()."uploads/fotos/".$imagen ?>"/>

</body>
</html>