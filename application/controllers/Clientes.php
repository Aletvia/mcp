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
	}
	public function verificar_sesion() {
		if($this->session->userdata('logueado')==false){
			redirect('Clientes/login');
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
			$dat['fecha_registro'] = $c->fecha_registro;
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
			$dats['lab_ocupacion'] = $this->input->post('occupation');
			$dats['nivel_estudios'] = $this->input->post('study_l');
			$dats['lab_nombre_empresa'] = $this->input->post('company');
			$dats['lab_industria'] = $this->input->post('job');
			$dats['lab_anios_experiencia'] = $this->input->post('experience');
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
	public function ver_solicitud()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo!='Cliente'){
			$data['solicitud'] = $this->consultas_model->get_c($this->input->post('us'));
			if($tipo=='Administrador'){
				$this->load->view('Clientes/header_a');
			}else if($tipo=='Agente'){
				$this->load->view('Clientes/header');
			}
			$this->load->view('Clientes/ver_solicitud',$data);
		}
	}
	public function procesar_solicitud()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo!='Cliente'){
			$data['solicitud'] = $this->consultas_model->get_c($this->input->post('us'));
			if($tipo=='Administrador'){
				$this->load->view('Clientes/header_a');
			}else if($tipo=='Agente'){
				$this->load->view('Clientes/header');
			}
			$this->load->view('Clientes/procesar_solicitud',$data);
		}
	}
}
