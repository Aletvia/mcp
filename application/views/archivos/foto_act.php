<html>
	<head>
	<title>Actualizar foto</title>
	</head>
	<body>

		<?php echo $error;?>

		<?php echo form_open_multipart('Archivos/do_upload');?>

		<input type="file" name="userfile" size="20" />

		<br /><br />

		<input type="submit" value="upload" />

		</form>

	</body>
</html>