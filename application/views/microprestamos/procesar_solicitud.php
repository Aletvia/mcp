    <!-- container -->
		<div style="margin-top:15px;margin-bottom:15px"  class="row">
			<h1 class="h2 ">Procesar la solicitud</h1>
			<div class="col">
			<!--button onclick="editar()" class="btn btn-success d-inline float-right" style="color:white;font-weight:bold"><i class="fa fa-pencil"></i> Editar</button-->
			<a class="btn btn-light d-inline float-right" style="font-weight:bold"   href="<?= base_url() ?>index.php/Microprestamos/solicitudes"><i class="fa fa-arrow-left"></i> Regresar al catálogo</a>
			</div>
		</div>
		<div>
			<?php
			foreach ($solicitud as $u) {
				$cumpleanos = new DateTime($u->fecha_nacimiento);
				$hoy = new DateTime();
				$anios = $hoy->diff($cumpleanos);
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
								<input value="<?= $u->curp ?>" id="c" name="c" type="text" class="form-control input-sm" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" disabled  placeholder="CURP">
							</div>
							<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<span class="input-group-prepend">
									<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-genderless"></i>&nbspGénero&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
								</span>
								<select id="gender" name="gender" class="form-control input-sm" disabled>
									<option value=""><?= $u->genero ?></option>
									<option value="Mujer">Mujer</option>
									<option value="Hombre">Hombre</option>
								</select>
							</div>
						</div>
						<h5>Nacimiento:</h5>
						<div class="row">
							<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<span class="input-group-prepend">
									<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-calendar"></i>&nbspFecha&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
								</span>
								<select id="b" name="b" class="form-control input-sm" disabled>
									<option value=""><?= $u->fecha_nacimiento  ?></option>
								</select>
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
									<option value=""><?= $u->nacimiento_estado ?></option>
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
										<button   onclick="CargarFoto('<?= base_url() ?>assets/css/img/user.png')"
											type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
											<i class="fa fa-eye"></i>&nbspVer</button>
										</div>
										<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<button   onclick="CargarFoto('<?= base_url() ?>assets/css/img/user.png')"
												type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
												<i class="fa fa-download"></i>&nbspDescargar</button>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
											Credencial
										</label>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
												<button   onclick="CargarFoto('<?= base_url() ?>assets/css/img/user.png')"
													type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
													<i class="fa fa-eye"></i>&nbspVer</button>
												</div>
												<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<button   onclick="CargarFoto('<?= base_url() ?>assets/css/img/user.png')"
														type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
														<i class="fa fa-download"></i>&nbspDescargar</button>
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
												<input value="<?= $u->anios_domicilio ?>" id="home_y" name="home_y" type="text" class="form-control input-sm" disabled  >
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
													<option value=""><?= $u->municipio ?></option>
												</select>
											</div>
										</div>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
												<span class="input-group-prepend">
													<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-globe"></i>&nbspEstado&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
												</span>
												<select id="state_a" name="state_a" class="form-control input-sm" disabled>
													<option value=""><?= $u->estado ?></option>
												</select>
											</div>
											<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
												<span class="input-group-prepend">
													<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i>&nbspCorreo&nbsp&nbsp&nbsp&nbsp&nbsp</div>
												</span>
												<input value="<?= $u->correo ?>" id="email" name="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" disabled  placeholder="Correo">
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
													<option value=""><?= $u->dependientes ?></option>
													<option value="1 niño">1 niño</option>
													<option value="2 niños">2 niños</option>
													<option value="3 niños">3 niños</option>
													<option value="4 o + niños">4 o + niños</option>
													<option value="Padres">Padres</option>
													<option value="Familiares">Familiares</option>
													<option value="Cónyugue">Cónyugue</option>
													<option value="Independiente">Independiente</option>
												</select>
											</div>
											<div style="margin-bottom: 15px" class="input-group center col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<span class="input-group-prepend">
													<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-money"></i>&nbspSalario&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
												</span>
												<select id="salary" name="salary" class="form-control input-sm" disabled>
													<option value=""><?= $u->lab_salario_mensual ?></option>
													<option value="3000.00">3000.00</option>
													<option value="4000.00">4000.00</option>
													<option value="5000.00">5000.00</option>
													<option value="6000.00">6000.00</option>
													<option value="7000.00">7000.00</option>
													<option value="8000.00">8000.00</option>
													<option value="9000.00">9000.00</option>
													<option value="10000.00">10000.00</option>
													<option value="15000.00">15000.00</option>
													<option value="20000.00">20000.00</option>
													<option value="25000.00">25000.00</option>
												</select>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<div class="input-group" style="display: flex;justify-content: center;" >
													<label for="checkbox">Labora actualmente&nbsp
														<input id="work" name="work" type="checkbox" required <?php if($u->trabaja==1){ ?>checked="true"<?php } ?> >
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
													<option value="Otro">Otro</option>
												</select>
											</div>
											<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
												<input value="<?= $u->lab_ocupacion ?>" id="occupation_1" name="occupation_1" type="text" class="form-control input-sm" disabled  placeholder="">
											</div>
										<?php }else{ ?>
										<select id="occupation" name="occupation" class="form-control input-sm" disabled>
											<option value="<?= $u->lab_ocupacion ?>"><?= $u->lab_ocupacion ?></option>
											<option value="Profesionista">Profesionista</option>
											<option value="Estudiante">Estudiante</option>
											<option value="Comerciante">Comerciante</option>
											<option value="Empleado">Empleado</option>
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
													<option value=""><?= $u->nivel_estudios ?></option>
													<option value="Primaria">Primaria</option>
													<option value="Secundaria">Secundaria</option>
													<option value="Preparatoria o Bachillerato">Preparatoria o Bachillerato</option>
													<option value="Técnico">Técnico</option>
													<option value="Licenciatura">Licenciatura</option>
													<option value="Maestría">Maestría</option>
													<option value="Doctorado">Doctorado</option>
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
												<input value="<?= $u->lab_anios_experiencia ?>"  id="experience" name="experience" type="number" class="form-control input-sm" disabled  placeholder="">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
												<div class="input-group" style="display: flex;justify-content: center;" >
													<label >Pago por banco&nbsp
														<input id="pay_bank" name="pay_bank" type="checkbox" required <?php if($u->lab_pagos_x_banco==1){ ?>checked="true"<?php } ?> >
													</label>
												</div>
											</div>
											<div style="margin-bottom: 15px" class="input-group col-lg-10 col-md-9 col-sm-12 col-xs-12">
												<span class="input-group-prepend">
													<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Descripción del puesto</div>
												</span>
												<textarea id="description_w" name="description_w" class="form-control input-sm" disabled>
													<?= $u->lab_descripcion_empleo  ?>
												</textarea>
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
															<option value=""><?= $u->pregunta_1 ?></option>
															<option value="por horas">por horas</option>
															<option value="por días">por días</option>
															<option value="por mes">por mes</option>
															<option value="de acuerdo al trabajo">de acuerdo al trabajo</option>
															<option value="como fluya el día">como fluya el día</option>
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
															<option value=""><?= $u->pregunta_2 ?></option>
															<option value="rojo">rojo</option>
															<option value="azul">azul</option>
															<option value="blanco">blanco</option>
															<option value="negro">negro</option>
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
															<option value=""><?= $u->pregunta_3 ?></option>
															<option value="Si">Si</option>
															<option value="No">No</option>
															<option value="Camino">Camino</option>
															<option value="Ninguno">Ninguno</option>
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
															<option value=""><?= $u->pregunta_4 ?></option>
															<option value="Dinero">Dinero</option>
															<option value="Familia">Familia</option>
															<option value="Yo">Yo</option>
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
													<input id="acept_t_p" type="checkbox" required name="acept_t_p" <?php if($u->his_tarjeta_credito==1){ ?>checked="true"<?php } ?> >
												</label>
											</div>
											<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
												<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Tienes o tuviste un crédito automotriz&nbsp
													<input id="acept_t_p" type="checkbox" required name="acept_t_p" <?php if($u->his_credito_auto==1){ ?>checked="true"<?php } ?> >
												</label>
											</div>
										</div>
											<div class="row">
												<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Tienes o tuviste crédito con una empresa telefónica&nbsp
														<input id="acept_t_p" type="checkbox" required name="acept_t_p" <?php if($u->his_credito_tel==1){ ?>checked="true"<?php } ?> >
													</label>
												</div>
											</div>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
												<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Califica como consideres que se encuentre tu historial crediticio.
													<input value="<?= $u->his_cal_his_cred ?>" id="y" name="y" type="number" min="1" max="10" class="form-control input-sm" disabled  placeholder="">
												</label>
											</div>
											<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
												<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Describe porque.
													<textarea id="m" name="m" class="form-control input-sm" disabled>
														<?= $u->his_desc_cal  ?>
													</textarea>
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
														<input value="<?= "1000.000" ?>"  id="rode" name="rode" min="1000" max="2000" type="number" class="form-control input-sm" disabled  placeholder="">
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
														<input value="<?= "1018.88" ?>"  id="total" name="total" type="number" class="form-control input-sm" disabled  placeholder="">
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
															?>
															<option value="<?= $j ?> días"> <?= $j ?> días</option>
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
															<option value=""><?= "" ?></option>
															<option value="Mayor crédito">Mayor crédito</option>
															<option value="Que sume a mi buro de crédito a favor">Que sume a mi buro de crédito a favor</option>
															<option value="Mayores servicios (menciónalos) y poner un cuadro para que escriban.">Mayores servicios (menciónalos) y poner un cuadro para que escriban.</option>
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
															<option value=""><?= "" ?></option>
															<option value="Flujo de efectivo">Flujo de efectivo</option>
															<option value="Esperando pago de cliente">Esperando pago de cliente</option>
															<option value="Esperando quincena">Esperando quincena</option>
															<option value="Deuda">Deuda</option>
															<option value="Otro">Otro</option>
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
												<textarea id="use" name="use" class="form-control input-sm" disabled>
													<?= ""  ?>
												</textarea>
											</div>
										</div>
										<div class="row">
											<div style="margin-bottom: 15px" class="input-group  col-lg-6 col-md-6 col-sm-12 col-xs-12">
												<span class="input-group-prepend">
													<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Estatus de la solicitud&nbsp</div>
												</span>
												<select id="status" name="status" class="form-control input-sm" disabled>
													<option value=""><?= "" ?></option>
												</select>
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
																		<button   onclick="CargarFoto('<?= base_url() ?>assets/css/img/user.png')"
																			type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
																			<i class="fa fa-eye"></i>&nbspVer</button>
																		</div>
																		<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
																			<button   onclick="CargarFoto('<?= base_url() ?>assets/css/img/user.png')"
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
																				<button   onclick="CargarFoto('<?= base_url() ?>assets/css/img/user.png')"
																					type="button" id="registrar" style="font-weight:bold;width:100%" class="btn btn-secondary">
																					<i class="fa fa-eye"></i>&nbspVer</button>
																				</div>
																				<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
																					<button   onclick="CargarFoto('<?= base_url() ?>assets/css/img/user.png')"
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
													function editar() {
														var form = document.getElementById("act");
														form.submit()
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
