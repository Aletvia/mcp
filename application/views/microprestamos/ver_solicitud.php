    <!-- container -->
		<div style="margin-top:15px;margin-bottom:15px"  class="row">
			<h1 class="h2 ">Detalle de la solicitud</h1>
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
								<select id="m" name="m" class="form-control input-sm" disabled>
									<option value=""><?= $u->fecha_registro ?></option>
								</select>
							</div>
							<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<span class="input-group-prepend">
									<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp</div>
								</span>
								<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="Nombre completo">
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
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->fecha_nacimiento  ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-birthday-cake"></i>&nbspEdad&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $anios->y  ?></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-map-marker"></i>&nbspEstado&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->nacimiento_estado ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Nacionalidad&nbsp</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
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
				<!--EMPLEO////////////////////////////////////////////////////////////////////////////-->
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" >
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-hashtag"></i>&nbspDependientes</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->dependientes ?></option>
								<option value="1 niño">1 niño</option>
								<option value="2 niños">2 niños</option>
								<option value="3 niños">3 niños</option>
								<option value="4 o + niños">4 o + niños</option>
								<option value="Padres">Padres</option>
								<option value="Familiares">Familiares</option>
								<option value="Independiente">Independiente</option>
								<option value="Casado">Casado</option>
								<option value="15000.00">15000.00</option>
								<option value="20000.00">20000.00</option>
								<option value="25000.00">25000.00</option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-money"></i>&nbspSalario&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
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
								<input id="acept_t_p" type="checkbox" required name="acept_t_p" value="1">
							</label>
						</div>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Ocupación&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->lab_salario_mensual ?></option>
								<option value="Profesionista">Profesionista</option>
								<option value="Estudiante">Estudiante</option>
								<option value="Comerciante">Comerciante</option>
								<option value="Empleado">Empleado</option>
								<option value="Otro">Otro</option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<input value="<?= $u->lab_industria ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="">
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Educación&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->lab_salario_mensual ?></option>
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
							<input value="<?= $u->lab_nombre_empresa ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="">
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Tipo de industria&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<input value="<?= $u->lab_industria ?>" id="n" type="text" class="form-control input-sm" name="n" disabled  placeholder="">
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Puesto que ocupa&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<input value="<?= $u->lab_puesto ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  placeholder="">
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Años de experiencia&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<input value="<?= $u->lab_anios_experiencia ?>"  id="c" type="number" class="form-control input-sm" name="c" disabled  placeholder="">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
							<div class="input-group" style="display: flex;justify-content: center;" >
								<label for="checkbox">Pago por banco&nbsp
									<input id="acept_t_p" type="checkbox" required name="acept_t_p" value="1">
								</label>
							</div>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-10 col-md-9 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Descripción del puesto</div>
							</span>
							<textarea id="m" name="m" class="form-control input-sm" disabled>
								<?= $u->lab_descripcion_empleo  ?>
							</textarea>
						</div>
					</div>
				</div>
				<!--ADICIONALES////////////////////////////////////////////////////////////////////////////-->
				<div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab" >
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="checkbox">&nbspComo organizas tu vida</label>
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->dependientes ?></option>
								<option value="por horas">por horas</option>
								<option value="por días">por días</option>
								<option value="por mes">por mes</option>
								<option value="de acuerdo al trabajo">de acuerdo al trabajo</option>
								<option value="como fluya el día">como fluya el día</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">&nbspComo organizas tu vida</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->dependientes ?></option>
								<option value="por horas">por horas</option>
								<option value="por días">por días</option>
								<option value="por mes">por mes</option>
								<option value="de acuerdo al trabajo">de acuerdo al trabajo</option>
								<option value="como fluya el día">como fluya el día</option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">&nbspComo consideras tu personalidad en colores</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->lab_salario_mensual ?></option>
								<option value="rojo">rojo</option>
								<option value="azul">azul</option>
								<option value="blanco">blanco</option>
								<option value="negro">negro</option>
							</select>
						</div>
					</div>
				</div>
				<!--HISTORIAL////////////////////////////////////////////////////////////////////////////-->
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Tienes o tuviste tarjeta de crédito&nbsp
								<input id="acept_t_p" type="checkbox" required name="acept_t_p" value="1">
							</label>
						</div>
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Tienes o tuviste un crédito automotriz&nbsp
								<input id="acept_t_p" type="checkbox" required name="acept_t_p" value="1">
							</label>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Como consideras que se encuentre tu historial crediticio.
								<input id="acept_t_p" type="checkbox" required name="acept_t_p" value="1">
							</label>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group center col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Como consideras que se encuentre tu historial crediticio.
								<textarea id="m" name="m" class="form-control input-sm" disabled>
									<?= $u->lab_descripcion_empleo  ?>
								</textarea>
							</label>
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label for="checkbox" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Describe porque.
								<textarea id="m" name="m" class="form-control input-sm" disabled>
									<?= $u->lab_descripcion_empleo  ?>
								</textarea>
							</label>
						</div>
					</div>
				</div>
				<!--SOLICITUD////////////////////////////////////////////////////////////////////////////-->
				<div class="tab-pane fade show active" id="sol" role="tabpanel" aria-labelledby="sol-tab">
					<div class="row">
						<div  class="input-group center col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
							Monto del préstamo
							</label>
						</div>
						<div class="input-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<label style="text-align: center;" class="col-lg-12 center col-md-12 col-sm-12 col-xs-12">
							Interés generado
							</label>
						</div>
						<div class="input-group center col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<label style="text-align: center;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							Total
							</label>
						</div>
						<div class="input-group center col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<label style="text-align: center;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							Tiempo del préstamo
							</label>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<input value="<?= $u->lab_anios_experiencia ?>"  id="c" type="number" class="form-control input-sm" name="c" disabled  placeholder="">
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<input value="<?= $u->lab_anios_experiencia ?>"  id="c" type="number" class="form-control input-sm" name="c" disabled  placeholder="">
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<input value="<?= $u->lab_anios_experiencia ?>"  id="c" type="number" class="form-control input-sm" name="c" disabled  placeholder="">
						</div>
						<div style="margin-bottom: 15px" class="input-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<input value="<?= $u->lab_anios_experiencia ?>"  id="c" type="number" class="form-control input-sm" name="c" disabled  placeholder="">
						</div>
					</div>
					<div class="row">
							<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Describe como utilizaras tu préstamo.
							</label>
					</div>
					<div class="row">
						<div style="margin-bottom: 25px" class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<textarea id="m" name="m" class="form-control input-sm" disabled>
									<?= $u->lab_descripcion_empleo  ?>
								</textarea>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group  col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">Estatus de la solicitud&nbsp</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->estado ?></option>
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
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->estado ?></option>
							</select>
						</div>
						<div style="margin-bottom: 15px" class="input-group  col-lg-5 col-md-5 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
								Seleccione su banco</div>
							</span>
							<select id="m" name="m" class="form-control input-sm" disabled>
								<option value=""><?= $u->estado ?></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div style="margin-bottom: 15px" class="input-group  col-lg-7 col-md-7 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
								Transferencia interbancaria&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<input value="<?= $u->telefono1 ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  >
						</div>
						<div style="margin-bottom: 15px" class="input-group  col-lg-5 col-md-5 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0">
								Tiempo estimado&nbsp&nbsp&nbsp&nbsp</div>
							</span>
							<input value="<?= $u->telefono1 ?>" id="e" type="text" class="form-control input-sm" name="e" disabled  >
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
