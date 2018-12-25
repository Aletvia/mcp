<?php
			foreach ($usr->result() as $c) { 
				$correo = $c->correo;
				$tipo = $c->tipo;
				$status = "inactivo";
				$nombre_completo = $c->nombre_completo;
				$fecha_registro = $c->fecha_registro;
				$contrasenia = $c->contrasenia;
				$id_usuarios = $c->id_usuarios;	 
			}
?>

		<form id="act" method="post">
			<input type="hidden" id="correo" name="correo" value="<?=$correo?>"/>
			<input type="hidden" id="tipo" name="tipo" value="<?=$tipo?>"/>
			<input type="hidden" id="status" name="status" value="<?=$status?>"/>
			<input type="hidden" id="nombre_completo" name="nombre_completo" value="<?=$nombre_completo?>"/>
			<input type="hidden" id="fecha_registro" name="fecha_registro" value="<?=$fecha_registro?>"/>
			<input type="hidden" id="id_usuarios" name="id_usuarios" value="<?=$id_usuarios?>"/>
		</form>