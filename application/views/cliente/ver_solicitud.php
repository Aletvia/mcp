    <!-- container -->
		<div style="margin-top:15px;margin-bottom:15px"  class="row">
			<h1 class="h2 ">Detalle de la solicitud</h1>
			<div class="col">
			<!--button onclick="editar()" class="btn btn-success d-inline float-right" style="color:white;font-weight:bold"><i class="fa fa-pencil"></i> Editar</button-->
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
						<a class="nav-link active" id="sol-tab" data-toggle="tab" href="#sol" role="tab" aria-controls="sol" aria-selected="true">Solicitud</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " id="dep-tab" data-toggle="tab" href="#dep" role="tab" aria-controls="dep" aria-selected="false">Depósito</a>
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
				<div class="tab-content" id="myTabContent" style="margin-top: 15px">
					<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">

				<div class="row">
				<input type="hidden" id="us" name="us" value="<?= $u->id_usuarios ?>">
				<input type="hidden" id="cl" name="cl" value="<?= $u->id_cliente ?>">
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-calendar"></i>&nbspRegistrado </div>
						</span>
						<select id="d_reg" name="d_reg" class="form-control input-sm" disabled>
							<option value=""><?= $u->fecha_registro ?></option>
						</select>
					</div>
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>
						<input value="<?= $u->nombre_completo ?>" id="n" name="n" type="text" class="form-control input-sm" disabled  placeholder="Nombre completo">
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-id-card"></i>&nbspCURP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>
						<input onchange="confirmar_c()" value="<?= strtoupper($u->curp)?>" id="c" name="c" type="text" class="form-control input-sm" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" disabled  placeholder="CURP">
					</div>
					<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-genderless"></i>&nbspGénero&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>
						<select id="gender" name="gender" class="form-control input-sm" disabled>
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
						<input value= "<?= date("Y", $timestamp)  ?>" onchange="calcular()" id="y" name="y" type="number" min="1950" class="form-control input-sm" disabled  placeholder="Año">
						<label style="font-size:20px;height:30px">&nbsp/&nbsp</label>
						<select id="mt" name="mt" class="form-control input-sm" disabled onchange="calcular()"
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
					<select style="height:38px" onchange="calcular()" id="d" name="d" class="form-control input-sm" disabled onchange="municipios()" >
						<option value="">Día</option>
						<?php
						for ($j=1;$j<32;$j++){
							?>
							<option value="<?= $j ?>" <?php if(date("d", $timestamp)==$j){?>selected<?php }?>> <?= $j ?></option>
						<?php }?>
					</select>
					<input type="hidden" id="b" name="b" value="">
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
					<select id="state_b" name="state_b" class="form-control input-sm" disabled>
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
						<select id="nationality" name="nationality" class="form-control input-sm" disabled>
							<option value=""><?= $u->nacionalidad?></option>
							<option value="Mexicano">Mexicano</option>
							<option value="Otro">Extranjero viviendo en México</option>
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
										<button   <?php if($u->ft!=null && $u->ft!=""){?>
										onclick="CargarFoto('<?= base_url()."uploads/fotos/".$u->ft ?>')"
										<?php }else{?>disabled<?php }?>
											type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
											<i class="fa fa-eye"></i>&nbspVer</button>
										</div>
										<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<button   
												type="button" disabled id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
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
											<button   
												type="button" disabled id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
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
										<input value="<?= $u->anios_domicilio ?>" id="home_y" name="home_y" type="number" min=0 class="form-control input-sm" disabled  >
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-road"></i>&nbspCalle&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->calle ?>" id="street" name="street" type="text" class="form-control input-sm" disabled  >
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspInterior&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->no_interior ?>" id="inside_n" name="inside_n" type="text" class="form-control input-sm" disabled  >
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspExterior&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->no_exterior ?>" id="outside_n" name="outside_n" type="text" class="form-control input-sm" disabled  >
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-building"></i>&nbspColonia&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->colonia ?>" id="colony" name="colony" type="text" class="form-control input-sm" disabled  >
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-map-marker"></i>&nbspMunicipio&nbsp</div>
										</span>
										<select id="m" name="m" class="form-control input-sm" disabled>
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
										<select id="state_a" name="state_a" class="form-control input-sm" disabled onchange="municipios()" >
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
											<input onchange="confirmar_e()" value="<?= $u->correo ?>" id="e" name="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" disabled  placeholder="Correo">
										</div>
									</div>
									<div class="row">
										<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-phone"></i>&nbspTeléfono 1</div>
											</span>
											<input value="<?= $u->telefono1 ?>" id="phone1" name="phone1" type="text" class="form-control input-sm" disabled  >
										</div>
										<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<span class="input-group-prepend">
												<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-phone"></i>&nbspTeléfono 2</div>
											</span>
											<input value="<?= $u->telefono2 ?>" id="phone2" name="phone2" type="text" class="form-control input-sm" disabled  >
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
											<select id="dependents" name="dependents" class="form-control input-sm" disabled>
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
											<select id="salary" name="salary" class="form-control input-sm" disabled>
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
													<input id="work" name="work" type="checkbox" value="true" disabled <?php if($u->trabaja==1){ ?>checked="true"<?php } ?> >
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
												<select id="occupation" name="occupation" class="form-control input-sm" disabled>
													<option value="Otro">Otro</option>
													<option value="Profesionista">Profesionista</option>
													<option value="Estudiante">Estudiante</option>
													<option value="Comerciante">Comerciante</option>
													<option value="Empleado">Empleado</option>
												</select>
											</div>
											<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
												<input value="<?= $u->lab_ocupacion ?>" id="occupation_1" name="occupation_1" type="text" class="form-control input-sm" disabled  placeholder="">
											</div>
										<?php }else{ ?>
											<select id="occupation" name="occupation" class="form-control input-sm" disabled >
												<option value="Profesionista" <?php if("Profesionista"==$u->lab_ocupacion){?>selected<?php }?>>Profesionista</option>
												<option value="Estudiante" <?php if("Estudiante"==$u->lab_ocupacion){?>selected<?php }?>>Estudiante</option>
												<option value="Comerciante" <?php if("Comerciante"==$u->lab_ocupacion){?>selected<?php }?>>Comerciante</option>
												<option value="Empleado" <?php if("Empleado"==$u->lab_ocupacion){?>selected<?php }?>>Empleado</option>
												<option value="Otro">Otro</option>
											</select>
										</div>
										<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
											<input value="" id="occupation_1" name="occupation_1" type="text" class="form-control input-sm" disabled  placeholder="">
										</div>
									<?php } ?>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Educación&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<select id="study_l" name="study_l" class="form-control input-sm" disabled>
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
										<input value="<?= $u->lab_nombre_empresa ?>" id="company" name="company" type="text" class="form-control input-sm" disabled  placeholder="">
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Tipo de industria&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->lab_industria ?>" id="industry" name="industry" type="text" class="form-control input-sm" disabled  placeholder="">
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Puesto que ocupa&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->lab_puesto ?>" id="job" name="job" type="text" class="form-control input-sm" disabled  placeholder="">
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Años de experiencia&nbsp&nbsp&nbsp&nbsp&nbsp</div>
										</span>
										<input value="<?= $u->lab_anios_experiencia ?>"  id="experience" name="experience" type="number" min=0 class="form-control input-sm" disabled  placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
										<div class="input-group" style="display: flex;justify-content: center;" >
											<label >Pago por banco&nbsp
												<input id="pay_bank" name="pay_bank" type="checkbox" value="true" disabled <?php if($u->lab_pagos_x_banco==1){ ?>checked="true"<?php } ?> >
											</label>
										</div>
									</div>
									<div style="margin-bottom: 15px" class="input-group col-lg-10 col-md-9 col-sm-12 col-xs-12">
										<span class="input-group-prepend">
											<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Descripción del puesto</div>
										</span>
										<textarea id="description_w" name="description_w" class="form-control input-sm" disabled><?= $u->lab_descripcion_empleo  ?></textarea>
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
												<select id="question_1" name="question_1" class="form-control input-sm" disabled>
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

												<select id="question_2" name="question_2" class="form-control input-sm" disabled>
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
												<select id="question_3" name="question_3" class="form-control input-sm" disabled>
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

												<select id="question_4" name="question_4" class="form-control input-sm" disabled>
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
											<input id="credit_cd" type="checkbox" value="true" disabled name="credit_cd" <?php if($u->his_tarjeta_credito==1){ ?>checked="true"<?php } ?> >
										</label>
									</div>
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Tienes o tuviste un crédito automotriz&nbsp
											<input id="credit_cr" type="checkbox" value="true" disabled name="credit_cr" <?php if($u->his_credito_auto==1){ ?>checked="true"<?php } ?> >
										</label>
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Tienes o tuviste crédito con una empresa telefónica&nbsp
											<input id="credit_ph" type="checkbox" value="true" disabled name="credit_ph" <?php if($u->his_credito_tel==1){ ?>checked="true"<?php } ?> >
										</label>
									</div>
								</div>
								<div class="row">
									<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Califica como consideres que se encuentre tu historial crediticio.
											<input value="<?= $u->his_cal_his_cred ?>" id="history_q" name="history_q" type="number" min="1" max="10" class="form-control input-sm" disabled  placeholder="">
										</label>
									</div>
									<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Describe porque.
											<textarea id="desc_h" name="desc_h" class="form-control input-sm" disabled><?= $u->his_desc_cal  ?></textarea>
										</label>
									</div>
								</div>
							</div>
									<!--SOLICITUD////////////////////////////////////////////////////////////////////////////-->
									<div class="tab-pane fade show active" id="sol" role="tabpanel" aria-labelledby="sol-tab">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
												<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
													Monto del préstamo
												</label>
												<div class="row">
													<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<input value="<?= $u->monto ?>"  id="rode" name="rode" min="1000" max="2000" type="number" class="form-control input-sm" disabled  placeholder="">
													</div>
												</div>
											</div>

											<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
												<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
													Interés generado
												</label>
												<div class="row">
													<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<input value="<?= "18.88" ?>"  id="interest" name="interest" type="number" class="form-control input-sm" disabled  placeholder="">
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
												<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
													Total
												</label>
												<div class="row">
													<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<input value="<?= $u->monto+18.88 ?>"  id="total" name="total" type="number" class="form-control input-sm" disabled  placeholder="">
													</div>
												</div>
											</div>

											<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
												<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
													Tiempo del préstamo
												</label>
												<div class="row">
													<div style="margin-bottom: 15px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<select style="height:45px" id="time" name="time" class="form-control input-sm" disabled onchange="" >
															<option value="">1 día</option>
															<?php
															for ($j=2;$j<31;$j++){
																$d=$j+" días"; 
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
														<select id="benefits" name="benefits" class="form-control input-sm" disabled>
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
														<select id="cause" name="cause" class="form-control input-sm" disabled>
															<option value="Flujo de efectivo" <?php if($u->ocasion=="Flujo de efectivo"){?>selected<?php }?>>Flujo de efectivo</option>
															<option value="Esperando pago de cliente" <?php if($u->ocasion=="Esperando pago de cliente"){?>selected<?php }?>>Esperando pago de cliente</option>
															<option value="Esperando quincena" <?php if($u->ocasion=="Esperando quincena"){?>selected<?php }?>>Esperando quincena</option>
															<option value="Deuda">Deuda <?php if($u->ocasion=="Deuda"){?>selected<?php }?></option>
															<option value="Otro">Otro <?php if($u->ocasion=="Otro"){?>selected<?php }?></option>
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
												<textarea id="use" name="use" class="form-control input-sm" disabled><?= $u->desc_uso  ?></textarea>
											</div>
										</div>
										<div class="row">
													<div style="margin-bottom: 15px" class="input-group  col-lg-6 col-md-6 col-sm-12 col-xs-12">
														<span class="input-group-prepend">
															<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
																Estatus actual&nbsp</div>
															</span>
															<input value="<?= $u->status ?>" id="reference" name="reference" type="text" class="form-control input-sm" disabled  >
														</div>
										</div>
									</div>
									<!--DEPOSITO////////////////////////////////////////////////////////////////////////////-->
									<div class="tab-pane fade" id="dep" role="tabpanel" aria-labelledby="dep-tab">

										<div class="row">
											<div style="margin-bottom: 15px" class="input-group  col-lg-7 col-md-7 col-sm-12 col-xs-12">
												<span class="input-group-prepend">
													<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
														¿Dónde te vamos a depositar?</div>
													</span>
													<select id="where" name="where" class="form-control input-sm" disabled>
														<option value="Tarjeta"><?= "Tarjeta de débito / nomina" ?></option>
															<option value="Transferencia interbancaria"><?= "Transferencia interbancaria (18 dígitos)" ?></option>
													</select>
												</div>
												<div style="margin-bottom: 15px" class="input-group  col-lg-5 col-md-5 col-sm-12 col-xs-12">
													<span class="input-group-prepend">
														<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
															Seleccione su banco</div>
														</span>
														<select id="bank" name="bank" class="form-control input-sm" disabled>
															<option value=""><?= "" ?></option>
														</select>
													</div>
												</div>
												<div class="row">
													<div style="margin-bottom: 15px" class="input-group  col-lg-7 col-md-7 col-sm-12 col-xs-12">
														<span class="input-group-prepend">
															<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
																Referencia&nbsp&nbsp&nbsp&nbsp</div>
															</span>
															<input value="<?= "" ?>" id="reference" name="reference" type="text" class="form-control input-sm" disabled  >
														</div>
														<div style="margin-bottom: 15px" class="input-group  col-lg-5 col-md-5 col-sm-12 col-xs-12">
															<span class="input-group-prepend">
																<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
																	Tiempo estimado&nbsp&nbsp&nbsp&nbsp</div>
																</span>
																<input value="<?= "" ?>" id="estimated_t" name="estimated_t" type="text" class="form-control input-sm" disabled  >
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
																		onclick="descargar('<?= base_url()."uploads/cldr/".$u->cl ?>')"
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
																					onclick="descargar('<?= base_url()."uploads/cmprbnt/".$u->cm ?>')"
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
													function desargar(img) {
														
													}
													function CargarFoto(img){
														derecha=(screen.width)/2;
														arriba=(screen.height)/2;
														string="toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+(screen.width)/2+",height="+(screen.height)/2+",left=10,top=10";
														var w = window.open(img,"DescriptiveWindowName",string);
														if(w.document){
															w.document.title="dfdfdfg";
														}
														//w.document.write('<html><head><meta name="viewport" content="width=device-width, minimum-scale=0.1"> <title>Credencial</title><link href="<?= base_url() ?>assets/css/img/favicon.png" rel="icon"></head><body style="margin: 0px; background: #0e0e0e;"><img style="-webkit-user-select: none;cursor: zoom-in;max-width:100%;max-height:100%;" src="http://localhost/Microprestamos123/assets/css/img/user.png" ></body></html>');
													}
													</script>
													<!-- container -->
												</body>
												</html>
