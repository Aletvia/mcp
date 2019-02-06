<!-- container -->
<div style="margin-top:15px;margin-bottom:15px"  class="row">
	<h1 class="h2 ">Procesar la solicitud</h1>
	<div class="col">
		<button onclick="editar()" class="btn btn-success d-inline float-right" style="color:white;font-weight:bold"><i class="fa fa-add"></i> Procesar solicitud</button>
		<a class="btn btn-light d-inline float-right" style="font-weight:bold"   href="<?= base_url() ?>index.php/Clientes/solicitudes"><i class="fa fa-arrow-left"></i> Regresar al catálogo</a>
	</div>
</div>
<div>
	<?php
	foreach ($solicitud as $u) {
		$curp=$u->curp;
		$email=$u->correo;
		$cumpleanos = new DateTime($u->fecha_nacimiento);
		$hoy = new DateTime();
		$anios = $hoy->diff($cumpleanos);
		$timestamp = strtotime($u->fecha_nacimiento);
		$php_date = getdate($timestamp);
		?>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link " id="sol-tab" data-toggle="tab" href="#sol" role="tab" aria-controls="sol" aria-selected="true">Solicitud</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" id="dep-tab" data-toggle="tab" href="#dep" role="tab" aria-controls="dep" aria-selected="false">Depósito</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Cliente</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="direct-tab" data-toggle="tab" href="#direct" role="tab" aria-controls="profile" aria-selected="false">Contacto</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Laboral</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">Adicional</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Historial</a>
			</li>
		</ul>
		<form id="act" name="act"
		action="<?= base_url() ?>index.php/Clientes/editar_s" method="post">
		<div class="tab-content" id="myTabContent" style="margin-top: 15px">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">

				<div class="row">
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-calendar"></i>&nbspRegistrado </div>
						</span>
						<input type="hidden" id="us" name="us" value="<?= $u->id_usuarios ?>">
						<input type="hidden" id="cl" name="cl" value="<?= $u->id_cliente ?>">
						<input type="hidden" id="sl" name="sl" value="<?= $u->id_solicitud ?>">
						<select id="d_reg" name="d_reg" class="form-control input-sm" disabled>
							<option value=""><?= $u->fecha_registro ?></option>
						</select>
					</div>
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>
						<input value="<?= $u->nombre_completo ?>" id="n" name="n" type="text" class="form-control input-sm" required  placeholder="Nombre completo">
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-id-card"></i>&nbspCURP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>
						<input onchange="confirmar_c()" value="<?= strtoupper($u->curp)?>" id="c" name="c" type="text" class="form-control input-sm" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" required  placeholder="CURP">
					</div>
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-genderless"></i>&nbspGénero&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>
						<select id="gender" name="gender" class="form-control input-sm" required>
							<option value="Mujer"  <?php if($u->genero=="Mujer"){?>selected<?php }?>>Mujer</option>
							<option value="Hombre" <?php if($u->genero=="Hombre"){?>selected<?php }?>>Hombre</option>
						</select>
					</div>
				</div>
				<h5>Nacimiento:</h5>
				<div class="row">
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-calendar"></i>&nbspFecha&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>
						<input value= "<?= date("Y", $timestamp)  ?>" onchange="calcular()" id="y" name="y" type="number" min="1950" class="form-control input-sm" required  placeholder="Año">
						<label style="font-size:20px;height:30px">&nbsp/&nbsp</label>
						<select id="mt" name="mt" class="form-control input-sm" required onchange="calcular()"
						style="height:38px">
						<option value="">Mes</option>
						<option value="1" <?php if(date("m", $timestamp)==1){?>selected<?php }?>>Enero</option>
						<option value="2" <?php if(date("m", $timestamp)==2){?>selected<?php }?>>Febrero</option>
						<option value="3" <?php if(date("m", $timestamp)==3){?>selected<?php }?>>Marzo</option>
						<option value="4" <?php if(date("m", $timestamp)==4){?>selected<?php }?>>Abril</option>
						<option value="5" <?php if(date("m", $timestamp)==5){?>selected<?php }?>>Mayo</option>
						<option value="6" <?php if(date("m", $timestamp)==6){?>selected<?php }?>>Junio</option>
						<option value="7" <?php if(date("m", $timestamp)==7){?>selected<?php }?>>Julio</option>
						<option value="8" <?php if(date("m", $timestamp)==8){?>selected<?php }?>>Agosto</option>
						<option value="9" <?php if(date("m", $timestamp)==9){?>selected<?php }?>>Septiembre</option>
						<option value="10" <?php if(date("m", $timestamp)==10){?>selected<?php }?>>Octubre</option>
						<option value="11" <?php if(date("m", $timestamp)==11){?>selected<?php }?>>Noviembre</option>
						<option value="12" <?php if(date("m", $timestamp)==12){?>selected<?php }?>>Diciembre</option>
					</select>
					<label style="font-size:20px;height:30px">&nbsp/&nbsp</label>
					<select style="height:38px" onchange="calcular()" id="d" name="d" class="form-control input-sm" required onchange="municipios()" >
						<option value="">Día</option>
						<?php
						for ($j=1;$j<32;$j++){
							?>
							<option value="<?= $j ?>" <?php if(date("d", $timestamp)==$j){?>selected<?php }?>> <?= $j ?></option>
						<?php }?>
					</select>
					<input type="hidden" id="b" name="b" value="<?= $u->fecha_nacimiento?>">
				</div>
				<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<span class="input-group-prepend">
						<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-birthday-cake"></i>&nbspEdad&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
					</span>
					<input value="<?= $anios->y ?>" id="age" name="age" type="text" class="form-control input-sm" disabled  >
				</div>
			</div>
			<div class="row">
				<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<span class="input-group-prepend">
						<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-map-marker"></i>&nbspEstado&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
					</span>
					<select id="state_b" name="state_b" class="form-control input-sm" required>
						<option value="33">Estado</option>
						<option value="33">Otro</option>
						<?php
						foreach ($estados as $e) {
							if($e->id_estado!=33){?>
								<option value="<?= $e->estado ?>" <?php if($u->nacimiento_estado==$e->estado){ ?>selected<?php } ?>> <?= $e->estado; ?></option>
							<?php }}?>
						</select>
					</div>
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Nacionalidad&nbsp</div>
						</span>
						<select id="nationality" name="nationality" class="form-control input-sm" required>
							<option value="Mexicano" <?php if("Mexicano"==$u->nacionalidad){?>selected<?php }?>>Mexicano</option>
							<option value="Extranjero viviendo en México" <?php if("Extranjero viviendo en México"==$u->nacionalidad){?>selected<?php }?>>Extranjero viviendo en México</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
							Foto
						</label>
						<div class="row">
							<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<button
									<?php if($u->ft!=null && $u->ft!=""){?>
										onclick="CargarFoto('<?= base_url()."uploads/fotos/".$u->ft ?>')"
									<?php }else{?>disabled<?php }?>
									type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
									<i class="fa fa-eye"></i>&nbspVer</button>
								</div>
								<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<button   onclick="subir('Foto')"
										type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
										<i class="fa fa-upload"></i>&nbspSubir</button>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
									Credencial
								</label>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<button
											<?php if($u->cr!=null && $u->cr!=""){?>
												onclick="CargarFoto('<?= base_url()."uploads/cdcls/".$u->cr ?>')"
											<?php }else{?>disabled<?php }?>
											type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
											<i class="fa fa-eye"></i>&nbspVer</button>
										</div>
										<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<button   onclick="subir('Credencial')"
												type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
												<i class="fa fa-upload"></i>&nbspSubir</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--CONTACTO////////////////////////////////////////////////////////////////////////////-->
							<div class="tab-pane fade" id="direct" role="tabpanel" aria-labelledby="direct-tab" >
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspAños en el domicilio</div>
										</span>
										<input value="<?= $u->anios_domicilio ?>" id="home_y" name="home_y" type="number" min=0 class="form-control input-sm" required  >
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-road"></i>&nbspCalle&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->calle ?>" id="street" name="street" type="text" class="form-control input-sm" required  >
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspInterior&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->no_interior ?>" id="inside_n" name="inside_n" type="text" class="form-control input-sm" required  >
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspExterior&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->no_exterior ?>" id="outside_n" name="outside_n" type="text" class="form-control input-sm" required  >
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-building"></i>&nbspColonia&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->colonia ?>" id="colony" name="colony" type="text" class="form-control input-sm" required  >
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-map-marker"></i>&nbspMunicipio&nbsp</div>
										</span>
										<select id="m" name="m" class="form-control input-sm" required>
											<option value="33">Municipio</option>
											<?php
											foreach ($municipios as $mu) {?>
												<option value="<?= $mu->id ?>" <?php if($u->municipio==$mu->mun){ ?>selected<?php } ?>> <?= $mu->mun ?></option>
											<?php }?>
											<option value=""><?= $u->municipio ?></option>
										</select>
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-globe"></i>&nbspEstado&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<select id="state_a" name="state_a" class="form-control input-sm" required onchange="municipios()" >
											<option value="33">Estado</option>
											<option value="33">Otro</option>
											<?php
											foreach ($estados as $e) {
												if($e->id_estado!=33){?>
													<option value="<?= $e->id_estado ?>" <?php if($u->estado==$e->estado){ ?>selected<?php } ?>> <?= $e->estado; ?></option>
												<?php }}?>
											</select>
										</div>
										<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i>&nbspCorreo&nbsp&nbsp&nbsp&nbsp&nbsp</div>
											</span>
											<input onchange="confirmar_e()" value="<?= $u->correo ?>" id="e" name="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" required  placeholder="Correo">
										</div>
									</div>
									<div class="row">
										<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-phone"></i>&nbspTeléfono 1</div>
											</span>
											<input value="<?= $u->telefono1 ?>" id="phone1" name="phone1" type="text" class="form-control input-sm" required  >
										</div>
										<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-phone"></i>&nbspTeléfono 2</div>
											</span>
											<input value="<?= $u->telefono2 ?>" id="phone2" name="phone2" type="text" class="form-control input-sm" required  >
										</div>
									</div>
								</div>
								<!--EMPLEO////////////////////////////////////////////////////////////////////////////-->
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" >
									<div class="row">
										<div style="margin-bottom: 15px" class="input-group center col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspDependientes</div>
											</span>
											<select id="dependents" name="dependents" class="form-control input-sm" required>
												<option value="">Seleccione una opción</option>
												<option value="1 niño" <?php if("1 niño"==$u->dependientes){?>selected<?php }?>>1 niño</option>
												<option value="2 niños" <?php if("2 niños"==$u->dependientes){?>selected<?php }?>>2 niños</option>
												<option value="3 niños" <?php if("3 niños"==$u->dependientes){?>selected<?php }?>>3 niños</option>
												<option value="4 o + niños" <?php if("4 o + niños"==$u->dependientes){?>selected<?php }?>>4 o + niños</option>
												<option value="Padres"> <?php if("Padres"==$u->dependientes){?>selected<?php }?>Padres</option>
												<option value="Familiares" <?php if("Familiares"==$u->dependientes){?>selected<?php }?>>Familiares</option>
												<option value="Cónyugue" <?php if("Cónyugue"==$u->dependientes){?>selected<?php }?>>Cónyugue</option>
												<option value="Independiente" <?php if("Independiente"==$u->dependientes){?>selected<?php }?>>Independiente</option>
											</select>
										</div>
										<div style="margin-bottom: 15px" class="input-group center col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-money"></i>&nbspSalario&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
											</span>
											<select id="salary" name="salary" class="form-control input-sm" required>
												<option value="">Selecciona una opción</option>
												<option value="3000.00" <?php if(3000==$u->lab_salario_mensual){?>selected<?php }?>>3000.00</option>
												<option value="4000.00" <?php if(4000==$u->lab_salario_mensual){?>selected<?php }?>>4000.00</option>
												<option value="5000.00" <?php if(5000==$u->lab_salario_mensual){?>selected<?php }?>>5000.00</option>
												<option value="6000.00" <?php if(6000==$u->lab_salario_mensual){?>selected<?php }?>>6000.00</option>
												<option value="7000.00" <?php if(7000==$u->lab_salario_mensual){?>selected<?php }?>>7000.00</option>
												<option value="8000.00" <?php if(8000==$u->lab_salario_mensual){?>selected<?php }?>>8000.00</option>
												<option value="9000.00" <?php if(9000==$u->lab_salario_mensual){?>selected<?php }?>>9000.00</option>
												<option value="10000.00" <?php if(10000==$u->lab_salario_mensual){?>selected<?php }?>>10000.00</option>
												<option value="15000.00" <?php if(15000==$u->lab_salario_mensual){?>selected<?php }?>>15000.00</option>
												<option value="20000.00" <?php if(20000==$u->lab_salario_mensual){?>selected<?php }?>>20000.00</option>
												<option value="25000.00" <?php if(25000==$u->lab_salario_mensual){?>selected<?php }?>>25000.00</option>
											</select>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="input-group" style="display: flex;justify-content: center;" >
												<label for="checkbox">Labora actualmente&nbsp
													<input id="work" name="work" type="checkbox" value="true" required <?php if($u->trabaja==1){ ?>checked="true"<?php } ?> >
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Ocupación&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
											</span>

											<?php if($u->lab_ocupacion!="Profesionista" &&
											$u->lab_ocupacion!="Estudiante" &&
											$u->lab_ocupacion!="Comerciante" &&
											$u->lab_ocupacion!="Empleado"){ ?>
												<select id="occupation" name="occupation" class="form-control input-sm" required>
													<option value="Otro">Otro</option>
													<option value="Profesionista">Profesionista</option>
													<option value="Estudiante">Estudiante</option>
													<option value="Comerciante">Comerciante</option>
													<option value="Empleado">Empleado</option>
												</select>
											</div>
											<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
												<input value="<?= $u->lab_ocupacion ?>" id="occupation_1" name="occupation_1" type="text" class="form-control input-sm" required  placeholder="">
											</div>
										<?php }else{ ?>
											<select id="occupation" name="occupation" class="form-control input-sm" required >
												<option value="Profesionista" <?php if("Profesionista"==$u->lab_ocupacion){?>selected<?php }?>>Profesionista</option>
												<option value="Estudiante" <?php if("Estudiante"==$u->lab_ocupacion){?>selected<?php }?>>Estudiante</option>
												<option value="Comerciante" <?php if("Comerciante"==$u->lab_ocupacion){?>selected<?php }?>>Comerciante</option>
												<option value="Empleado" <?php if("Empleado"==$u->lab_ocupacion){?>selected<?php }?>>Empleado</option>
												<option value="Otro">Otro</option>
											</select>
										</div>
										<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
											<input value="" id="occupation_1" name="occupation_1" type="text" class="form-control input-sm" required  placeholder="">
										</div>
									<?php } ?>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Educación&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<select id="study_l" name="study_l" class="form-control input-sm" required>
											<option value="">Selecciona una opción</option>
											<option value="Primaria" <?php if("Primaria"==$u->nivel_estudios){?>selected<?php }?>>Primaria</option>
											<option value="Secundaria" <?php if("Secundaria"==$u->nivel_estudios){?>selected<?php }?>>Secundaria</option>
											<option value="Preparatoria o Bachillerato" <?php if("Preparatoria o Bachillerato"==$u->nivel_estudios){?>selected<?php }?>>Preparatoria o Bachillerato</option>
											<option value="Técnico" <?php if("Técnico"==$u->nivel_estudios){?>selected<?php }?>>Técnico</option>
											<option value="Licenciatura" <?php if("Licenciatura"==$u->nivel_estudios){?>selected<?php }?>>Licenciatura</option>
											<option value="Maestría" <?php if("Maestría"==$u->nivel_estudios){?>selected<?php }?>>Maestría</option>
											<option value="Doctorado" <?php if("Doctorado"==$u->nivel_estudios){?>selected<?php }?>>Doctorado</option>
										</select>
									</div>
								</div>
								<h5>Datos de la empresa:</h5>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Nombre de la empresa</div>
										</span>
										<input value="<?= $u->lab_nombre_empresa ?>" id="company" name="company" type="text" class="form-control input-sm" required  placeholder="">
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Tipo de industria&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->lab_industria ?>" id="industry" name="industry" type="text" class="form-control input-sm" required  placeholder="">
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Puesto que ocupa&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->lab_puesto ?>" id="job" name="job" type="text" class="form-control input-sm" required  placeholder="">
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Años de experiencia&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->lab_anios_experiencia ?>"  id="experience" name="experience" type="number" min=0 class="form-control input-sm" required  placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
										<div class="input-group" style="display: flex;justify-content: center;" >
											<label >Pago por banco&nbsp
												<input id="pay_bank" name="pay_bank" type="checkbox" value="true" required <?php if($u->lab_pagos_x_banco==1){ ?>checked="true"<?php } ?> >
											</label>
										</div>
									</div>
									<div style="margin-bottom: 15px" class="input-group col-lg-10 col-md-9 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Descripción del puesto</div>
										</span>
										<textarea id="description_w" name="description_w" class="form-control input-sm" required><?= $u->lab_descripcion_empleo  ?></textarea>
									</div>
								</div>
							</div>
							<!--ADICIONALES////////////////////////////////////////////////////////////////////////////-->
							<div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab" >
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Como organizas tu vida
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<select id="question_1" name="question_1" class="form-control input-sm" required>
													<option value="">Seleccione una opción</option>
													<option value="Por horas" <?php if("Por horas"==$u->pregunta_1){?>selected<?php }?>>Por horas</option>
													<option value="Por días" <?php if("Por días"==$u->pregunta_1){?>selected<?php }?>>Por días</option>
													<option value="Por mes" <?php if("Por mes"==$u->pregunta_1){?>selected<?php }?>>Por mes</option>
													<option value="De acuerdo al trabajo" <?php if("De acuerdo al trabajo"==$u->pregunta_1){?>selected<?php }?>>De acuerdo al trabajo</option>
													<option value="Como fluya el día" <?php if("Como fluya el día"==$u->pregunta_1){?>selected<?php }?>>Como fluya el día</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Como consideras tu personalidad en colores
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

												<select id="question_2" name="question_2" class="form-control input-sm" required>
													<option value="">Seleccione una opción</option>
													<option value="Rojo" <?php if("Rojo"==$u->pregunta_2){?>selected<?php }?>>Rojo</option>
													<option value="Azul" <?php if("Azul"==$u->pregunta_2){?>selected<?php }?>>Azul</option>
													<option value="Blanco" <?php if("Blanco"==$u->pregunta_2){?>selected<?php }?>>Blanco</option>
													<option value="Negro" <?php if("Negro"==$u->pregunta_2){?>selected<?php }?>>Negro</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Realizas alguna actividad deportiva
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<select id="question_3" name="question_3" class="form-control input-sm" required>
													<option value="">Seleccione una opción</option>
													<option value="Si" <?php if("Si"==$u->pregunta_3){?>selected<?php }?>>Si</option>
													<option value="No" <?php if("No"==$u->pregunta_3){?>selected<?php }?>>No</option>
													<option value="Camino" <?php if("Camino"==$u->pregunta_3){?>selected<?php }?>>Camino</option>
													<option value="Ninguno" <?php if("Ninguno"==$u->pregunta_3){?>selected<?php }?>>Ninguno</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Intereses
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

												<select id="question_4" name="question_4" class="form-control input-sm" required>
													<option value="">Seleccione una opción</option>
													<option value="Dinero" <?php if("Dinero"==$u->pregunta_4){?>selected<?php }?>>Dinero</option>
													<option value="Familia" <?php if("Familia"==$u->pregunta_4){?>selected<?php }?>>Familia</option>
													<option value="Yo" <?php if("Yo"==$u->pregunta_4){?>selected<?php }?>>Yo</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--HISTORIAL////////////////////////////////////////////////////////////////////////////-->
							<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Tienes o tuviste tarjeta de crédito&nbsp
											<input id="credit_cd" type="checkbox" value="true" required name="credit_cd" <?php if($u->his_tarjeta_credito==1){ ?>checked="true"<?php } ?> >
										</label>
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Tienes o tuviste un crédito automotriz&nbsp
											<input id="credit_cr" type="checkbox" value="true" required name="credit_cr" <?php if($u->his_credito_auto==1){ ?>checked="true"<?php } ?> >
										</label>
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Tienes o tuviste crédito con una empresa telefónica&nbsp
											<input id="credit_ph" type="checkbox" value="true" required name="credit_ph" <?php if($u->his_credito_tel==1){ ?>checked="true"<?php } ?> >
										</label>
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Califica como consideres que se encuentre tu historial crediticio.
											<input value="<?= $u->his_cal_his_cred ?>" id="history_q" name="history_q" type="number" min="1" max="10" class="form-control input-sm" required  placeholder="">
										</label>
									</div>
									<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Describe porque.
											<textarea id="desc_h" name="desc_h" class="form-control input-sm" required><?= $u->his_desc_cal  ?></textarea>
										</label>
									</div>
								</div>
							</div><!--SOLICITUD////////////////////////////////////////////////////////////////////////////-->
							<div class="tab-pane fade " id="sol" role="tabpanel" aria-labelledby="sol-tab">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Monto del préstamo
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<input onchange="calc()" value="<?= $u->monto ?>"  id="rode" name="rode" min="1000" max="2000" type="number" class="form-control input-sm" required  placeholder="">
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Interés generado
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<input value="<?= $u->interes ?>"  id="interest" name="interest" type="number" class="form-control input-sm" disabled  placeholder="">
												<input value="<?= $u->interes ?>"  id="interes" name="interes" type="hidden" >
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Total
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<input value="<?= $u->monto+$u->interes ?>"  id="total" name="total" type="number" class="form-control input-sm" disabled  placeholder="">
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Tiempo del préstamo
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<select onchange="calc()" style="height:45px" id="time" name="time" class="form-control input-sm" required onchange="" >
													<?php
													for ($j=1;$j<31;$j++){
														$d=$j." días";
														?>
														<option value="<?= $j ?> días" <?php if($u->tiempo==$d){?>selected<?php }?>> <?= $j ?> días</option>
													<?php }?>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Beneficios esperados una vez aceptado el crédito
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<select id="benefits" name="benefits" class="form-control input-sm" required>
													<option value="Mayor crédito" <?php if($u->beneficios=="Mayor crédito"){?>selected<?php }?>>Mayor crédito</option>
													<option value="Que sume a mi buro de crédito a favor" <?php if($u->beneficios=="Que sume a mi buro de crédito a favor"){?>selected<?php }?>>Que sume a mi buro de crédito a favor</option>
													<option value="Mayores servicios (menciónalos) y poner un cuadro para que escriban." <?php if($u->beneficios=="Mayores servicios (menciónalos) y poner un cuadro para que escriban."){?>selected<?php }?>>Mayores servicios (menciónalos) y poner un cuadro para que escriban.</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Ocasión porque pedir crédito
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<select id="cause" name="cause" class="form-control input-sm" required>
													<option value="Flujo de efectivo" <?php if($u->ocasion=="Flujo de efectivo"){?>selected<?php }?>>Flujo de efectivo</option>
													<option value="Esperando pago de cliente" <?php if($u->ocasion=="Esperando pago de cliente"){?>selected<?php }?>>Esperando pago de cliente</option>
													<option value="Esperando quincena" <?php if($u->ocasion=="Esperando quincena"){?>selected<?php }?>>Esperando quincena</option>
													<option value="Deuda" <?php if($u->ocasion=="Deuda"){?>selected<?php }?>>Deuda</option>
													<option value="Otro" <?php if($u->ocasion=="Otro"){?>selected<?php }?>>Otro</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<label class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Describe como utilizaras tu préstamo
										</label>
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 25px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<textarea id="use" name="use" class="form-control input-sm" required><?= $u->desc_uso  ?></textarea>
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group  col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
												Estatus actual&nbsp</div>
											</span>
											<input value="<?= $u->status ?>" id="statac" name="statac" type="text" class="form-control input-sm" disabled  >
										</div>
									</div>
								</div>
								<!--DEPOSITO////////////////////////////////////////////////////////////////////////////-->
								<div class="tab-pane fade show active" id="dep" role="tabpanel" aria-labelledby="dep-tab">

									<div class="row">
										<div style="margin-bottom: 15px" class="input-group  col-lg-7 col-md-7 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
													¿Dónde te vamos a depositar?</div>
												</span>
												<select id="where" name="where" class="form-control input-sm" required>
													<option value="">Seleccione una opción</option>
													<option value="Tarjeta" <?php if($u->tipo_deposito=="Tarjeta"){?>selected<?php }?>>Tarjeta de débito / nomina</option>
													<option value="Transferencia interbancaria"<?php if($u->tipo_deposito=="Transferencia interbancaria"){?>selected<?php }?>>Transferencia interbancaria (18 dígitos)</option>
												</select>
											</div>
											<div style="margin-bottom: 15px" class="input-group  col-lg-5 col-md-5 col-sm-12 col-xs-12">
												<span class="input-group-prepend">
													<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
														Banco</div>
													</span>
													<select id="bank" name="bank" class="form-control input-sm" required>
														<option value="">Seleccione una opción</option>
														<?php
														foreach ($bancos as $b) {	?>
															<option value="<?= $b->banco ?>" <?php if($u->banco==$b->banco){ ?>selected<?php } ?>> <?= $b->banco; ?></option>
														<?php }?>
													</select>
												</div>
											</div>
											<div class="row">
												<div style="margin-bottom: 15px" class="input-group  col-lg-7 col-md-7 col-sm-12 col-xs-12">
													<span class="input-group-prepend">
														<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
															Referencia&nbsp&nbsp&nbsp&nbsp</div>
														</span>
														<input value="<?= $u->referencia ?>" id="reference" name="reference" type="text" class="form-control input-sm" required  >
													</div>
													<div style="margin-bottom: 15px" class="input-group  col-lg-5 col-md-5 col-sm-12 col-xs-12">
														<span class="input-group-prepend">
															<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
																Tiempo estimado&nbsp&nbsp&nbsp&nbsp</div>
															</span>
															<input value="<?= $u->tiempo_estimado ?>" disabled id="estimated_t" name="estimated_t" type="text" class="form-control input-sm"  >
														</div>
													</div>
													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
																Calendario
															</label>
															<div class="row">
																<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
																	<button   <?php if($u->cl!=null && $u->cl!=""){?>
																		onclick="CargarFoto('<?= base_url()."uploads/cldr/".$u->cl ?>')"
																	<?php }else{?>disabled<?php }?>
																	type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
																	<i class="fa fa-eye"></i>&nbspVer</button>
																</div>
																<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
																	<button   <?php if($u->cl!=null && $u->cl!=""){?>
																		onclick="descargar('<?= "cldr/".$u->cl ?>')"
																	<?php }else{?>disabled<?php }?>
																	type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
																	<i class="fa fa-download"></i>&nbspDescargar</button>
																</div>
															</div>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
																Comprobante
															</label>
															<div class="row">
																<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
																	<button
																	<button
																	<?php if($u->cm!=null && $u->cm!=""){?>
																		onclick="CargarFoto('<?= base_url()."uploads/cmprbnt/".$u->cm ?>')"
																	<?php }else{?>disabled<?php }?>
																	type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
																	<i class="fa fa-eye"></i>&nbspVer</button>
																</div>
																<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
																	<button
																	<?php if($u->cm!=null && $u->cm!=""){?>
																		onclick="descargar('<?="cmprbnt/".$u->cm ?>')"
																	<?php }else{?>disabled<?php }?>
																	type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
																	<i class="fa fa-download"></i>&nbspDescargar</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php }?>
									</div>
								</div><!--container-->
								<script>
								function descargar(img) {
										window.open("<?= base_url() ?>index.php/Archivos/download?n="+img, '_blank');
								}
								function calc() {
									var r = document.getElementById("rode").value
									var i1 = document.getElementById("interes")
										var i = document.getElementById("interest")
											var tt = document.getElementById("total")
												var tm = document.getElementById("time").value
												$.ajax({
													url:'<?= base_url() ?>index.php/Welcome/int',
													type : 'POST',
													data : { 'r' : r,'tm':tm },
													success: function(rres){
														var arr = rres.split(",");
														i1.value=arr[0];
														i.value=arr[0];
														tt.value=arr[1];
													}
												});
								}
								function editar() {
									var a = document.getElementById("benefits").value
									var b = document.getElementById("rode").value
									var c = document.getElementById("time").value
									var d = document.getElementById("cause").value
									var e = document.getElementById("use").value
									var f = document.getElementById("where").value
									var g = document.getElementById("bank").value
									var h = document.getElementById("reference").value
									if(a=="" || b=="" || c=="" || d=="" || e=="" || f=="" || g=="" || h=="" ){
										alert("Corrobore que todos los campos de la pestaña Solicitud y Depósito estén completos");
									}else{
										if(b>2000){
											alert("El monto no puede sobrepasar los 2000.00 MXN")
										}else{
											var form = document.getElementById("act");
											form.submit()
										}
									}
								}
								function CargarFoto(img){
									arriba=(screen.height)/2;
									string="toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+(screen.width)/2+",height="+(screen.height)/2+",left=10,top=10";
									var w = window.open(img,"DescriptiveWindowName",string);


								}
								function subir(tipo){
									derecha=(screen.width)/2;
									arriba=(screen.height)/2;
									string="toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+(screen.width)/2+",height="+(screen.height)/2+",left=10,top=10";
									var w = window.open("<?= base_url() ?>index.php/Archivos/"+tipo,"DescriptiveWindowName",string);
								}
								function calcular() {
									var y = document.getElementById("y").value
									var d = document.getElementById("d").value
									var m = document.getElementById("mt").value
									var a = document.getElementById("age").value
									date = new Date(`${y}-${m}-${d}`)
										var hoy=new Date();
										var ageDifMs = hoy - date.getTime();
										var ageDate = new Date(ageDifMs);
										var edad=Math.abs(ageDate.getUTCFullYear() - 1970);
										if(m<hoy.getMonth()){
											edad=edad+1;
										}
										document.getElementById("age").value=edad;
										document.getElementById("b").value=y+"/"+m+"/"+d;
								}
								function confirmar_c(){
									var c = document.getElementById("c").value
									$.ajax({
										url:'<?= base_url() ?>index.php/Welcome/confirmar_c',
										type : 'POST',
										data : { 'c' : c },
										success: function(comp){
											if(comp!='Aprobado'){
												alert(comp);
												document.getElementById("c").value='<?= strtoupper($curp) ?>'
											}
										}
									});
								}
								function confirmar_e(){
									var e = document.getElementById("e").value
									$.ajax({
										url:'<?= base_url() ?>index.php/Welcome/confirmar_e',
										type : 'POST',
										data : { 'e' : e },
										success: function(comp){
											if(comp!='Aprobado'){
												alert(comp);
												document.getElementById("e").value='<?= $email ?>'
											}
										}
									});
								}
								function municipios() {
									var p = document.getElementById("state_a").value
									var m = document.getElementById("m")
									$.ajax({
										url:'<?= base_url() ?>index.php/Welcome/municipios',
										type : 'POST',
										data : { 'es' : p },
										success: function(cities){
											$('#m').empty();
											$.each(cities,function(id,municipio)
											{
												m.append(new Option(municipio.mun, municipio.id));
											});
										}
									});
								}
								</script>
								<!-- container -->
							</body>
							</html>
