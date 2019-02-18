<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
	public $keycrypt;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('consultas_model');
		$this->load->helper('url');
		$this->load->database('default');
		$this->keycrypt = $this->config->item("aes_encryption_key");
		$this->load->helper(array('form', 'url'));
	}
	public function verificar_sesion() {
		if($this->session->userdata('logueado')==false){
			redirect('Welcome/inicio');
		}
	}
	function log_out()
	{
		$this->session->sess_destroy();
		// null the session (just in case):
		$this->session->set_userdata(array('nombre' => '', 'correo' => '', 'tipo' => '', 'id' => '', 'logueado' => false));
		redirect('Clientes/login');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function enviar()
	{
		$nick=$this->input->post('e');
		$pass = $this->input->post('p');
		$contraseña=openssl_encrypt($pass,'AES-128-ECB',$this->keycrypt);
		$data['usr'] = $this->consultas_model->get_l($nick,$contraseña);
		if(count($data['usr'])==1){
			$this->session->set_userdata('nombre',$data['usr'][0]->nombre_completo);
			$this->session->set_userdata('tipo',$data['usr'][0]->tipo);
			$this->session->set_userdata('correo',$data['usr'][0]->correo);
			$this->session->set_userdata('id',$data['usr'][0]->id_usuarios);
			$this->session->set_userdata('logueado',true);
			$this->session->set_userdata($datos);
			redirect('Clientes/usuarios');
		}else{
			redirect('Clientes/login');
		}
	}
	//--------------------CLIENTE
	public function datos_usuario()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Cliente'){
			$data['cli'] = $this->consultas_model->get_c($this->session->userdata('id'));
			$data['estados'] = $this->consultas_model->get_e();
			$data['municipios'] = $this->consultas_model->get_m($data['cli'][0]->id_estado);
			$this->load->view('cliente/header');
			$this->load->view('cliente/editar_cliente',$data);
		}
	}
	public function editar_c()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Cliente'){
			$e=$this->input->post('e');
			$c = $this->consultas_model->consulta_get_where("usuarios",$this->input->post('us'),"id_usuarios");
			$dat['correo'] = $e;
			$dat['tipo'] = "Cliente";
			$dat['status'] = "activo";
			$dat['nombre_completo'] = $this->input->post('n');
			$dat['id_usuarios'] = $c->id_usuarios;
			$pass = $this->input->post('p');
			//if($pass==""){
			$dat['contrasenia'] = $c->contrasenia;
			/*}else{
			$dat['contrasenia'] = openssl_encrypt($pass,'AES-128-ECB',$this->keycrypt);
		}*/
		$this->consultas_model->update_r('usuarios',$c->id_usuarios,$dat,'id_usuarios');


		////////////////////CLIENTE
		$dats['usuarios_id_usuarios'] = $this->input->post('us');
		$dats['id_cliente'] = $this->input->post('cl');
		$dats['	municipios_id_municipio'] = $this->input->post('m');
		$dats['curp'] = $this->input->post('c');
		$dats['genero'] = $this->input->post('gender');
		$dats['fecha_nacimiento'] = $this->input->post('b');
		$dats['nacimiento_estado'] = $this->input->post('state_b');
		$dats['nacionalidad'] = $this->input->post('nationality');
		$dats['anios_domicilio'] = $this->input->post('home_y');
		$dats['calle'] = $this->input->post('street');
		$dats['no_interior'] = $this->input->post('inside_n');
		$dats['no_exterior'] = $this->input->post('outside_n');
		$dats['colonia'] = $this->input->post('colony');
		$dats['telefono1'] = $this->input->post('phone1');
		$dats['telefono2'] = $this->input->post('phone2');
		$dats['dependientes'] = $this->input->post('dependents');
		$dats['lab_salario_mensual'] = $this->input->post('salary');
		if($this->input->post('work')=="true")
		$dats['trabaja'] = 1;
		$ocuacion = $this->input->post('occupation');
		if($ocuacion=='Otro'){
			$dats['lab_ocupacion'] = $this->input->post('occupation_1');
		}else{
			$dats['lab_ocupacion'] = $this->input->post('occupation');
		}
		$dats['nivel_estudios'] = $this->input->post('study_l');
		$dats['lab_nombre_empresa'] = $this->input->post('company');
		$dats['lab_industria'] = $this->input->post('job');
		if($this->input->post('experience')==""){
			$dats['lab_anios_experiencia'] = 0;
		}else{
			$dats['lab_anios_experiencia'] = $this->input->post('experience');
		}
		if($this->input->post('pay_bank')=="true")
		$dats['lab_pagos_x_banco'] = 1;
		$dats['lab_descripcion_empleo'] = $this->input->post('description_w');
		$dats['pregunta_1'] = $this->input->post('question_1');
		$dats['pregunta_2'] = $this->input->post('question_2');
		$dats['pregunta_3'] = $this->input->post('question_3');
		$dats['pregunta_4'] = $this->input->post('question_4');
		if($this->input->post('credit_cd')=="true")
		$dats['his_credito_auto'] = 1;
		if($this->input->post('credit_cr')=="true")
		$dats['his_credito_auto'] = 1;
		if($this->input->post('credit_ph')=="true")
		$dats['his_credito_tel'] = 1;
		$dats['his_cal_his_cred'] = $this->input->post('history_q');
		$dats['his_desc_cal'] = $this->input->post('desc_h');

		$this->consultas_model->update_r('clientes',$this->input->post('cl'),$dats,'id_cliente');
		redirect('Clientes/datos_usuario');
	}else{
		//
	}
}
//-----------------------SOLICITUDES
public function solicitudes()
{
	$this->verificar_sesion();

	$var = $this->session->userdata;
	$tipo=$var['tipo'];
	if($tipo=='Cliente'){
		$data['solicitudes'] = $this->consultas_model->get_s($this->session->userdata('id'));
		if($data['solicitudes']!=null)
		$data['count'] = count($data['solicitudes']);
		else
		$data['count'] =0;
		$this->load->view('cliente/header');
		$this->load->view('cliente/solicitudes',$data);
	}
}
public function agregar_solicitud()
{
	$this->verificar_sesion();
	$var = $this->session->userdata;
	$tipo=$var['tipo'];
	if($tipo=='Cliente'){
		$data['cli'] = $this->consultas_model->get_c($this->session->userdata('id'));
		$data['estados'] = $this->consultas_model->get_e();
		$data['municipios'] = $this->consultas_model->get_m($data['cli'][0]->id_estado);
		$this->load->view('cliente/header');
		$this->load->view('cliente/agregar_solicitud',$data);
	}

}
public function agregar_s()
{
	$this->verificar_sesion();
	$var = $this->session->userdata;
	$tipo=$var['tipo'];
	if($tipo=='Cliente'){
		$e=$this->input->post('e');
		$c = $this->consultas_model->consulta_get_where("usuarios",$this->input->post('us'),"id_usuarios");
		$dat['correo'] = $e;
		$dat['tipo'] = "Cliente";
		$dat['status'] = "activo";
		$dat['nombre_completo'] = $this->input->post('n');
		$dat['id_usuarios'] = $c->id_usuarios;
		$pass = $this->input->post('p');
		$dat['contrasenia'] = $c->contrasenia;
		$this->consultas_model->update_r('usuarios',$c->id_usuarios,$dat,'id_usuarios');

		$aprobada=1;
		////////////////////CLIENTE
		$dats['usuarios_id_usuarios'] = $this->input->post('us');
		$dats['id_cliente'] = $this->input->post('cl');
		$dats['	municipios_id_municipio'] = $this->input->post('m');
		$dats['curp'] = $this->input->post('c');
		$dats['genero'] = $this->input->post('gender');
		$dats['fecha_nacimiento'] = $this->input->post('b');
		$cumpleanos =$this->input->post('years_t');
		if($cumpleanos>=50)
			$aprobada=0;
		$dats['nacimiento_estado'] = $this->input->post('state_b');
		if($this->input->post('nationality')=="Extranjero viviendo en México")
			$aprobada=0;
		$dats['nacionalidad'] = $this->input->post('nationality');
		$dats['anios_domicilio'] = $this->input->post('home_y');
		$dats['calle'] = $this->input->post('street');
		$dats['no_interior'] = $this->input->post('inside_n');
		$dats['no_exterior'] = $this->input->post('outside_n');
		$dats['colonia'] = $this->input->post('colony');
		$dats['telefono1'] = $this->input->post('phone1');
		$dats['telefono2'] = $this->input->post('phone2');
		$dats['dependientes'] = $this->input->post('dependents');
		if($this->input->post('dependents')=="2 niños" ||
		$this->input->post('dependents')=="4 o + niños" ||
		$this->input->post('dependents')=="3 niños")
		$aprobada=0;
		$dats['lab_salario_mensual'] = $this->input->post('salary');
		if($this->input->post('salary')<=6000)
		$aprobada=0;
		if($this->input->post('work')=="true"){
			$dats['trabaja'] = 1;
		}else{
			$dats['trabaja'] = 0;
			$aprobada=0;
		}
		$ocuacion = $this->input->post('occupation');
		if($ocuacion=='Otro'){
			$dats['lab_ocupacion'] = $this->input->post('occupation_1');
		}else{
			$dats['lab_ocupacion'] = $this->input->post('occupation');
		}
		$dats['nivel_estudios'] = $this->input->post('study_l');
		if($this->input->post('study_l')=="Primaria" ||
		$this->input->post('study_l')=="Secundaria" ||
		$this->input->post('study_l')=="Preparatoria o Bachillerato")
		$aprobada=0;
		$dats['lab_nombre_empresa'] = $this->input->post('company');
		$dats['lab_industria'] = $this->input->post('job');
		if($this->input->post('experience')==""){
			$dats['lab_anios_experiencia'] = 0;
		}else{
			$dats['lab_anios_experiencia'] = $this->input->post('experience');
		}
		if($this->input->post('pay_bank')=="true")
		$dats['lab_pagos_x_banco'] = 1;
		$dats['lab_descripcion_empleo'] = $this->input->post('description_w');
		$dats['pregunta_1'] = $this->input->post('question_1');
		if($this->input->post('question_1')=="Como fluya el día")
		$aprobada=0;
		$dats['pregunta_2'] = $this->input->post('question_2');
		if($this->input->post('question_2')=="Negro")
		$aprobada=0;
		$dats['pregunta_3'] = $this->input->post('question_3');
		if($this->input->post('question_3')=="Ninguno")
		$aprobada=0;
		$dats['pregunta_4'] = $this->input->post('question_4');
		if($this->input->post('credit_cd')=="true")
		$dats['his_credito_auto'] = 1;
		if($this->input->post('credit_cr')=="true")
		$dats['his_credito_auto'] = 1;
		if($this->input->post('credit_ph')=="true")
		$dats['his_credito_tel'] = 1;
		$dats['his_cal_his_cred'] = $this->input->post('history_q');
		$dats['his_desc_cal'] = $this->input->post('desc_h');

		$this->consultas_model->update_r('clientes',$this->input->post('cl'),$dats,'id_cliente');


		////////////////////SOLICITUD

		$datt['beneficios'] = $this->input->post('benefits');
		$datt['ocasion'] = $this->input->post('cause');
		if($this->input->post('cause')=="Deuda")
		$aprobada=0;
		$datt['monto'] = $this->input->post('rode');
		$datt['interes'] = $this->input->post('interes');
		$datt['fecha_solicitud'] = date("Y-m-d");
		$datt['tiempo'] = $this->input->post('time');
		$datt['desc_uso'] = $this->input->post('use');
		if($aprobada==0){
			$datt['status'] = "Pre-solicitud rechazada";
		}else{
			$datt['status'] = "Pre-solicitud aprobada";
		}
		$datt['check_cl_consulta_credito'] = 1;
		$datt['clientes_id_cliente'] = $this->input->post('cl');
		$datt['clientes_usuarios_id_usuarios'] = $this->input->post('us');

		$id= $this->consultas_model->insert_r('solicitudes',$datt);
		redirect('Clientes/solicitudes');
	}
}
public function agregar_si()
{
		$e=$this->input->post('e');
		$c = $this->consultas_model->consulta_get_where("usuarios",$this->input->post('us'),"id_usuarios");
		$dat['correo'] = $e;
		$dat['tipo'] = "Cliente";
		$dat['status'] = "activo";
		$dat['nombre_completo'] = $this->input->post('n');
		$pass = $this->input->post('p');
		$this->consultas_model->update_r('usuarios',$this->input->post('us'),$dat,'id_usuarios');

		$aprobada=1;
		////////////////////CLIENTE
		$dats['usuarios_id_usuarios'] = $this->input->post('us');
		$dats['id_cliente'] = $this->input->post('cl');
		$dats['	municipios_id_municipio'] = $this->input->post('m');
		$dats['curp'] = $this->input->post('c');
		$dats['genero'] = $this->input->post('gender');
		$dats['fecha_nacimiento'] = $this->input->post('b');
		$cumpleanos =$this->input->post('years_t');
		if($cumpleanos>=50)
			$aprobada=0;
		$dats['nacimiento_estado'] = $this->input->post('state_b');
		if($this->input->post('nationality')=="Extranjero viviendo en México")
			$aprobada=0;
		$dats['nacionalidad'] = $this->input->post('nationality');
		$dats['anios_domicilio'] = $this->input->post('home_y');
		$dats['calle'] = $this->input->post('street');
		$dats['no_interior'] = $this->input->post('inside_n');
		$dats['no_exterior'] = $this->input->post('outside_n');
		$dats['colonia'] = $this->input->post('colony');
		$dats['telefono1'] = $this->input->post('phone1');
		$dats['telefono2'] = $this->input->post('phone2');
		$dats['dependientes'] = $this->input->post('dependents');
		if($this->input->post('dependents')=="2 niños" ||
		$this->input->post('dependents')=="4 o + niños" ||
		$this->input->post('dependents')=="3 niños")
		$aprobada=0;
		$dats['lab_salario_mensual'] = $this->input->post('salary');
		if($this->input->post('salary')<=6000)
		$aprobada=0;
		if($this->input->post('work')=="true"){
			$dats['trabaja'] = 1;
		}else{
			$dats['trabaja'] = 0;
			$aprobada=0;
		}
		$ocuacion = $this->input->post('occupation');
		if($ocuacion=='Otro'){
			$dats['lab_ocupacion'] = $this->input->post('occupation_1');
		}else{
			$dats['lab_ocupacion'] = $this->input->post('occupation');
		}
		$dats['nivel_estudios'] = $this->input->post('study_l');
		if($this->input->post('study_l')=="Primaria" ||
		$this->input->post('study_l')=="Secundaria" ||
		$this->input->post('study_l')=="Preparatoria o Bachillerato")
		$aprobada=0;
		$dats['lab_nombre_empresa'] = $this->input->post('company');
		$dats['lab_industria'] = $this->input->post('job');
		if($this->input->post('experience')==""){
			$dats['lab_anios_experiencia'] = 0;
		}else{
			$dats['lab_anios_experiencia'] = $this->input->post('experience');
		}
		if($this->input->post('pay_bank')=="true")
		$dats['lab_pagos_x_banco'] = 1;
		$dats['lab_descripcion_empleo'] = $this->input->post('description_w');
		$dats['pregunta_1'] = $this->input->post('question_1');
		if($this->input->post('question_1')=="Como fluya el día")
		$aprobada=0;
		$dats['pregunta_2'] = $this->input->post('question_2');
		if($this->input->post('question_2')=="Negro")
		$aprobada=0;
		$dats['pregunta_3'] = $this->input->post('question_3');
		if($this->input->post('question_3')=="Ninguno")
		$aprobada=0;
		$dats['pregunta_4'] = $this->input->post('question_4');
		if($this->input->post('credit_cd')=="true")
		$dats['his_credito_auto'] = 1;
		if($this->input->post('credit_cr')=="true")
		$dats['his_credito_auto'] = 1;
		if($this->input->post('credit_ph')=="true")
		$dats['his_credito_tel'] = 1;
		$dats['his_cal_his_cred'] = $this->input->post('history_q');
		$dats['his_desc_cal'] = $this->input->post('desc_h');

		$this->consultas_model->update_r('clientes',$this->input->post('cl'),$dats,'id_cliente');


		////////////////////SOLICITUD

		$datt['beneficios'] = $this->input->post('benefits');
		$datt['ocasion'] = $this->input->post('cause');
		if($this->input->post('cause')=="Deuda")
		$aprobada=0;
		$datt['monto'] = $this->input->post('rode');
		$datt['interes'] = $this->input->post('interes');
		$datt['fecha_solicitud'] = date("Y-m-d");
		$datt['tiempo'] = $this->input->post('time');
		$datt['desc_uso'] = $this->input->post('use');
		if($aprobada==0){
			$datt['status'] = "Pre-solicitud rechazada";
		}else{
			$datt['status'] = "Pre-solicitud aprobada";
		}
		$datt['check_cl_consulta_credito'] = 1;
		$datt['clientes_id_cliente'] = $this->input->post('cl');
		$datt['clientes_usuarios_id_usuarios'] = $this->input->post('us');

		$id= $this->consultas_model->insert_r('solicitudes',$datt);
		$this->session->sess_destroy();
		// null the session (just in case):
		$this->session->set_userdata(array('nombre' => '', 'correo' => '', 'tipo' => '', 'id' => '', 'logueado' => false));

		$this->load->view('solicitud_enviada');
}
public function editar_s()
{
	$this->verificar_sesion();
	$var = $this->session->userdata;
	$tipo=$var['tipo'];
	if($tipo=='Cliente'){
		$e=$this->input->post('e');
		$c = $this->consultas_model->consulta_get_where("usuarios",$this->input->post('us'),"id_usuarios");
		$dat['correo'] = $e;
		$dat['tipo'] = "Cliente";
		$dat['status'] = "activo";
		$dat['nombre_completo'] = $this->input->post('n');
		$dat['id_usuarios'] = $c->id_usuarios;
		$pass = $this->input->post('p');
		$dat['contrasenia'] = $c->contrasenia;
		$this->consultas_model->update_r('usuarios',$c->id_usuarios,$dat,'id_usuarios');

		$aprobada=1;
		////////////////////CLIENTE
		$dats['usuarios_id_usuarios'] = $this->input->post('us');
		$dats['id_cliente'] = $this->input->post('cl');
		$dats['	municipios_id_municipio'] = $this->input->post('m');
		$dats['curp'] = $this->input->post('c');
		$dats['genero'] = $this->input->post('gender');
		$dats['fecha_nacimiento'] = $this->input->post('b');
		$cumpleanos =$this->input->post('years_t');
		if($cumpleanos>=50)
			$aprobada=0;
		$dats['nacimiento_estado'] = $this->input->post('state_b');
		if($this->input->post('nationality')=="Extranjero viviendo en México")
		$aprobada=0;
		$dats['nacionalidad'] = $this->input->post('nationality');
		$dats['anios_domicilio'] = $this->input->post('home_y');
		$dats['calle'] = $this->input->post('street');
		$dats['no_interior'] = $this->input->post('inside_n');
		$dats['no_exterior'] = $this->input->post('outside_n');
		$dats['colonia'] = $this->input->post('colony');
		$dats['telefono1'] = $this->input->post('phone1');
		$dats['telefono2'] = $this->input->post('phone2');
		$dats['dependientes'] = $this->input->post('dependents');
		if($this->input->post('dependents')=="2 niños" ||
		$this->input->post('dependents')=="4 o + niños" ||
		$this->input->post('dependents')=="3 niños")
		$aprobada=0;
		$dats['lab_salario_mensual'] = $this->input->post('salary');
		if($this->input->post('salary')<=6000)
		$aprobada=0;
		if($this->input->post('work')=="true"){
			$dats['trabaja'] = 1;
		}else{
			$dats['trabaja'] = 0;
			$aprobada=0;
		}
		$ocuacion = $this->input->post('occupation');
		if($ocuacion=='Otro'){
			$dats['lab_ocupacion'] = $this->input->post('occupation_1');
		}else{
			$dats['lab_ocupacion'] = $this->input->post('occupation');
		}
		$dats['nivel_estudios'] = $this->input->post('study_l');
		if($this->input->post('study_l')=="Primaria" ||
		$this->input->post('study_l')=="Secundaria" ||
		$this->input->post('study_l')=="Preparatoria o Bachillerato")
		$aprobada=0;
		$dats['lab_nombre_empresa'] = $this->input->post('company');
		$dats['lab_industria'] = $this->input->post('job');
		if($this->input->post('experience')==""){
			$dats['lab_anios_experiencia'] = 0;
		}else{
			$dats['lab_anios_experiencia'] = $this->input->post('experience');
		}
		if($this->input->post('pay_bank')=="true")
		$dats['lab_pagos_x_banco'] = 1;
		$dats['lab_descripcion_empleo'] = $this->input->post('description_w');
		$dats['pregunta_1'] = $this->input->post('question_1');
		if($this->input->post('question_1')=="Como fluya el día")
		$aprobada=0;
		$dats['pregunta_2'] = $this->input->post('question_2');
		if($this->input->post('question_2')=="Negro")
		$aprobada=0;
		$dats['pregunta_3'] = $this->input->post('question_3');
		if($this->input->post('question_3')=="Ninguno")
		$aprobada=0;
		$dats['pregunta_4'] = $this->input->post('question_4');
		if($this->input->post('credit_cd')=="true")
		$dats['his_credito_auto'] = 1;
		if($this->input->post('credit_cr')=="true")
		$dats['his_credito_auto'] = 1;
		if($this->input->post('credit_ph')=="true")
		$dats['his_credito_tel'] = 1;
		$dats['his_cal_his_cred'] = $this->input->post('history_q');
		$dats['his_desc_cal'] = $this->input->post('desc_h');

		$this->consultas_model->update_r('clientes',$this->input->post('cl'),$dats,'id_cliente');


		////////////////////SOLICITUD

		$datt['beneficios'] = $this->input->post('benefits');
		$datt['ocasion'] = $this->input->post('cause');
		if($this->input->post('cause')=="Deuda")
		$aprobada=0;
		$datt['monto'] = $this->input->post('rode');
		$datt['interes'] = $this->input->post('interes');
		$datt['tiempo'] = $this->input->post('time');
		$datt['desc_uso'] = $this->input->post('use');
		if($aprobada==0){
			$datt['status'] = "Solicitud rechazada";
		}else{
			$datt['status'] = "Solicitud en espera";
		}
		$datt['check_cl_consulta_credito'] = 1;
		$datt['clientes_id_cliente'] = $this->input->post('cl');
		$datt['clientes_usuarios_id_usuarios'] = $this->input->post('us');
		$aux=$this->input->post('where');
		$datt['tipo_deposito'] = openssl_encrypt($aux,'AES-128-ECB',$this->keycrypt);
		$aux=$this->input->post('reference');
		$datt['referencia'] = openssl_encrypt($aux,'AES-128-ECB',$this->keycrypt);
		$aux=$this->input->post('bank');
		$datt['banco'] = openssl_encrypt($aux,'AES-128-ECB',$this->keycrypt);

		$this->consultas_model->update_r('solicitudes',$this->input->post('sl'),$datt,'id_solicitud');
		redirect('Clientes/solicitudes');
	}
}
public function ver_solicitud()
{
	$this->verificar_sesion();
	$var = $this->session->userdata;
	$tipo=$var['tipo'];
	if($tipo=='Cliente'){
		$data['solicitud'] = $this->consultas_model->get_su($this->input->post('us'));
		$data['solicitud'][0]->referencia = openssl_decrypt($data['solicitud'][0]->referencia,'AES-128-ECB',$this->keycrypt);
		$data['solicitud'][0]->banco = openssl_decrypt($data['solicitud'][0]->banco,'AES-128-ECB',$this->keycrypt);
		$data['solicitud'][0]->tipo_deposito = openssl_decrypt($data['solicitud'][0]->tipo_deposito,'AES-128-ECB',$this->keycrypt);
		$data['estados'] = $this->consultas_model->get_e();
		$data['bancos'] = $this->consultas_model->get_b();
		$data['municipios'] = $this->consultas_model->get_m($data['solicitud'][0]->id_estado);
		$this->load->view('cliente/header');
		$this->load->view('cliente/ver_solicitud',$data);
	}
}
public function procesar_solicitud()
{
	$this->verificar_sesion();
	$var = $this->session->userdata;
	$tipo=$var['tipo'];
	if($tipo=='Cliente'){
		$data['solicitud'] = $this->consultas_model->get_su($this->input->post('us'));
		$data['solicitud'][0]->referencia = openssl_decrypt($data['solicitud'][0]->referencia,'AES-128-ECB',$this->keycrypt);
		$data['solicitud'][0]->banco = openssl_decrypt($data['solicitud'][0]->banco,'AES-128-ECB',$this->keycrypt);
		$data['solicitud'][0]->tipo_deposito = openssl_decrypt($data['solicitud'][0]->tipo_deposito,'AES-128-ECB',$this->keycrypt);
		$data['estados'] = $this->consultas_model->get_e();
		$data['municipios'] = $this->consultas_model->get_m($data['solicitud'][0]->id_estado);
		$data['bancos'] = $this->consultas_model->get_b();
		$this->load->view('cliente/header');
		$this->load->view('cliente/procesar_solicitud',$data);
	}
}

public function cancelar_solicitud()
{
	$this->verificar_sesion();
	$var = $this->session->userdata;
	$tipo=$var['tipo'];
	if($tipo=='Cliente')
	{
		$c = $this->input->post('us');
		$dat['status'] = "Cancelada por cliente";

		$this->consultas_model->update_r('solicitudes',$c,$dat,'id_solicitud');
		redirect('Clientes/solicitudes');
	}
}
}
