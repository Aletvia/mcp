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
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="direct-tab" data-toggle="tab" href="#direct" role="tab" aria-controls="profile" aria-selected="false">Contacto</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Laboral</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Historial</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent" style="margin-top: 15px">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="d-flex flex-row">
						<div class="p-2">
						<img src="<?= base_url() ?>assets/css/img/user.png" style="height:90px;" class="rounded float-right" alt="Foto de usuario">
						</div>
						<div class="d-flex p-2">
							<div style="margin-bottom: 15px" class="input-group row col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<span class="input-group-prepend">
									<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-calendar"></i>&nbspRegistrado </div>
								</span>										
								<select id="m" name="m" class="form-control input-sm" disabled>
									<option value=""><?= $u->fecha_registro ?></option>
								</select>
							</div>
							<div style="margin-bottom: 15px" class="input-group row col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<span class="input-group-prepend">
									<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp</div>
								</span>				
								<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="Nombre completo">             
							</div>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-id-card"></i>&nbspCURP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->curp ?>"  pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" id="c" type="text" class="form-control input-sm" name="c" disabled  placeholder="CURP">                                        
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-genderless"></i>&nbspGénero&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->genero ?></option>
							</select>
						</div>
					</div>
					<h5>Nacimiento:</h5>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-globe"></i>&nbspEstado&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->estado ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-map-marker"></i>&nbspMunicipio&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->municipio ?></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-calendar"></i>&nbspFecha&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->fecha_nacimiento  ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-birthday-cake"></i>&nbspEdad&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $anios  ?></option>
							</select>
						</div>
					</div>
				</div>
				<!--////////////////////////////////////////////////////////////////////////////-->
				<div class="tab-pane fade" id="direct" role="tabpanel" aria-labelledby="direct-tab" >		
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspAños en el domicilio</div>
							</span>
							<input value="<?= $u->anios_domicilio ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  >							
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-road"></i>&nbspCalle&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->calle ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  >                                        
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspInterior&nbsp&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->no_interior ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  >
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspExterior&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->no_exterior ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  >                                        
						</div>
					</div>	
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-building"></i>&nbspColonia&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->colonia ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  >                                        
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-map-marker"></i>&nbspMunicipio&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->municipio ?></option>
							</select>
						</div>
					</div>			
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-globe"></i>&nbspEstado&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->estado ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i>&nbspCorreo&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->correo ?>" id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" disabled  placeholder="Correo">                                        
						</div>
					</div>					
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-phone"></i>&nbspTeléfono 1</div>
							</span>
							<input value="<?= $u->telefono1 ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  >							
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-phone"></i>&nbspTeléfono 2</div>
							</span>	
							<input value="<?= $u->telefono2 ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  >							
						</div>
					</div>		
				</div>
				<!--////////////////////////////////////////////////////////////////////////////-->
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" >
				<div class="row">
					<div class="input-group" style="display: flex;justify-content: center;">
						<label for="checkbox">Labora actualmente&nbsp
							<input id="acept_t_p" type="checkbox" required name="acept_t_p" value="1"> 
						</label>						
					</div>
					<div style="margin-bottom: 15px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>				
						<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="Nombre completo">             
					</div>
					<div style="margin-bottom: 15px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>				
						<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="Nombre completo">             
					</div>
				</div>
				 <div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>				
							<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="Nombre completo">             
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i>&nbspCorreo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->correo ?>" id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" disabled  placeholder="Correo">                                        
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-id-card"></i>&nbspCURP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->curp ?>"  pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" id="c" type="text" class="form-control input-sm" name="c" disabled  placeholder="CURP">                                        
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-globe"></i>&nbspEstado&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->estado ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-map-marker"></i>&nbspMunicipio&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->municipio ?></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-birthday-cake"></i>&nbspEdad&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $anios  ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-calendar"></i>&nbspRegistrado </div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->fecha_registro ?></option>
							</select>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>				
							<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="Nombre completo">             
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i>&nbspCorreo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->correo ?>" id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" disabled  placeholder="Correo">                                        
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-id-card"></i>&nbspCURP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<input value="<?= $u->curp ?>"  pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" id="c" type="text" class="form-control input-sm" name="c" disabled  placeholder="CURP">                                        
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-globe"></i>&nbspEstado&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->estado ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-map-marker"></i>&nbspMunicipio&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->municipio ?></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-birthday-cake"></i>&nbspEdad&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $anios  ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-calendar"></i>&nbspRegistrado </div>
							</span>										
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->fecha_registro ?></option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
    </div><!--container-->
	<script>
		function editar() {
			var form = document.getElementById("act");
			form.submit()
		}
	</script>
    <!-- container -->
</body>
</html>
