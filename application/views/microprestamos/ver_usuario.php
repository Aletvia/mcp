    <!-- container -->
		<div style="margin-top:15px;margin-bottom:15px"  class="row">
			<h1 class="h2 ">Detalle del Usuario</h1>
			<div class="col">
			<!--button onclick="editar()" class="btn btn-success d-inline float-right" style="color:white;font-weight:bold"><i class="fa fa-pencil"></i> Editar</button-->
			<a class="btn btn-light d-inline float-right" style="font-weight:bold"   href="<?= base_url() ?>index.php/Microprestamos/usuarios"><i class="fa fa-arrow-left"></i> Regresar al catálogo</a>
			</div>
		</div>
		<div>
			<?php
			foreach ($usr as $u) { 
			?>
				<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<span class="input-group-prepend">
						<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre</div>
					</span>				
					<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="Nombre completo">             
				</div>
				
				<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i>&nbspCorreo&nbsp</div>
							</span>										
							<input value="<?= $u->correo ?>" id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" disabled  placeholder="Correo">                                        
				</div>
				
				<div style="margin-bottom: 25px" class="input-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-users"></i>&nbspTipo&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->tipo ?></option>
							</select>
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
