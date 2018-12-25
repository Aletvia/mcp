    <!-- container -->
		<div style="margin-top:15px;margin-bottom:15px"  class="row">
			<h1 class="h2 ">Detalle del Cliente</h1>
			<div class="col">
			<!--button onclick="editar()" class="btn btn-success d-inline float-right" style="color:white;font-weight:bold"><i class="fa fa-pencil"></i> Editar</button-->
			<a class="btn btn-light d-inline float-right" style="font-weight:bold"   href="<?= base_url() ?>index.php/Microprestamos/clientes"><i class="fa fa-arrow-left"></i> Regresar al catálogo</a>
			</div>
		</div>
		<div>
			<?php
			foreach ($cli as $u) { 
			$fecha = strtotime($u->fecha_nacimiento);
			$anios = $fecha / (60*60*24*365);
			$anios = floor($anios);
			?>
				<div class="row">
					<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>				
						<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="Nombre completo">             
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom: 25px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<span class="input-group-prepend">
									<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i>&nbspCorreo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
								</span>										
								<input value="<?= $u->correo ?>" id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" disabled  placeholder="Correo">                                        
					</div>
					<div style="margin-bottom: 25px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<span class="input-group-prepend">
									<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-id-card"></i>&nbspCURP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
								</span>										
								<input value="<?= $u->curp ?>"  pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" id="c" type="text" class="form-control input-sm" name="c" disabled  placeholder="CURP">                                        
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom: 25px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-globe"></i>&nbspEstado&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->estado ?></option>
							</select>
					</div>
					<div style="margin-bottom: 25px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-map-marker"></i>&nbspMunicipio&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->municipio ?></option>
							</select>
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom: 25px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-birthday-cake"></i>&nbspEdad&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $anios  ?></option>
							</select>
					</div>
					<div style="margin-bottom: 25px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-calendar"></i>&nbspRegistrado </div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->fecha_registro ?></option>
							</select>
					</div>
				</div>
				
		<form id="act" method="post" action="<?= base_url() ?>index.php/Microprestamos/editar_usuario">
			<input type="hidden" id="us" name="us" value="<?= $u->id_usuarios ?>"/>
		</form>
			<?php }?>
		</div>
    </div>
	<script>
		function editar() {
			var form = document.getElementById("act");
			form.submit()
		}
	</script>
    <!-- container -->
</body>
</html>
