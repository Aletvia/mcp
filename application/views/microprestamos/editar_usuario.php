    <!-- container -->
		<div style="margin-top:15px;margin-bottom:15px"  class="row">
			<h1 class="h2 ">Detalle del Usuario</h1>
			<div class="col">
			<a class="btn btn-light d-inline float-right" style="font-weight:bold"   href="<?= base_url() ?>index.php/Microprestamos/usuarios"><i class="fa fa-arrow-left"></i> Regresar al catálogo</a>
			</div>
		</div>
		<div>
		<form id="loginform" 
			action="<?= base_url() ?>index.php/Microprestamos/añadir_usuario" method="post">
			<?php
			foreach ($usr as $u) { 
			?>
				<div style="margin-bottom: 25px" class="input-group row col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<span class="input-group-prepend">
						<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre</div>
					</span>				
					<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" required  placeholder="Nombre completo">             
				</div>
				
				<div style="margin-bottom: 25px" class="input-group row col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i>&nbspCorreo</div>
							</span>										
							<input value="<?= $u->correo ?>" id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" required  placeholder="Correo">                                        
				</div>
				
				<div class="row">
				<div style="margin-bottom: 25px" class="input-group center col-lg-5 col-md-5 col-sm-5 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-key"></i>&nbspContraseña</div>
							</span>										
							<input id="p" pattern="^([A-Za-z0-9]{8,})$" type="password" class="form-control input-sm" name="p" required  placeholder="Contraseña">
				</div>
						
				<div style="margin-bottom: 25px" class="input-group center col-lg-5 col-md-5 col-sm-5 col-xs-12">
							<span class="input-group-prepend">
								<div class="input-group-text bg-white border-right-0"><i class="fa fa-key"></i>&nbspRepite contraseña</div>
							</span>										
							<input id="pc" pattern="^([A-Za-z0-9]{8,})$" type="password" class="form-control input-sm" name="pc" required  placeholder="Confirmar contraseña">
				</div>
				</div>
				
				<div class="row">
				<div style="margin-bottom: 25px" class="input-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-users"></i>&nbspTipo</div>
							</span>										
							<select id="t" name="t" class="form-control input-sm" required >
								<option value="Administrador">Administrador</option>
								<option value="Agente">Agente</option>
								<!--option value="Cliente">Cliente</option-->
							</select>
				</div>
				<div style="margin-bottom: 25px" class="input-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<button  type="submit" style="font-weight:bold" type="button" id="agregar" class="btn btn-success col"><i class="fa fa-pencil"></i> Editar</button>
				</div>
				<div style="margin-bottom: 25px" class="input-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<button  type="submit" style="font-weight:bold" type="button" id="agregar" class="btn btn-success col"><i class="fa fa-pencil"></i> Editar</button>
				</div>
				</div>
			<?php }?>
			</form>
		</div>
    </div>
    <!-- container -->
</body>
</html>
