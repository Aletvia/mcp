<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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
			redirect('Microprestamos/login');
		}
	}
	public function inicio()
	{
		$this->load->view('inicio');
	}
	public function index()
	{
		$data['mj'] = "";
		$data['estados'] = $this->consultas_model->get_e();
		//$data['municipios'] = $this->consultas_model->get_m();
		$this->load->view('welcome_message',$data);
	}
	public function registro()
	{
		$cur=$this->input->post('c');
		$count = $this->consultas_model->consulta_count_where("clientes",$cur,"curp");
		if($count==0){
			$correo=$this->input->post('e');
			$count = $this->consultas_model->consulta_count_where("usuarios",$correo,"correo");
			if($count==0){
				$dat['correo'] = $correo;
				$dat['tipo'] = "Cliente";
				$dat['status'] = "activo";
				$dat['nombre_completo'] = $this->input->post('n');
				$dat['fecha_registro'] = date("Y-m-d");
				$pass = $this->input->post('p');
				$dat['contrasenia'] = openssl_encrypt($pass,'AES-128-ECB',$this->keycrypt);

				$id= $this->consultas_model->insert_r('usuarios',$dat);
				$dato['curp'] = $cur;
				$dato['fecha_nacimiento'] = $this->input->post('b');
				$dato['municipios_id_municipio'] = $this->input->post('m');
				$id= $this->db->insert_id();
				$dato['usuarios_id_usuarios'] = $id;
				$this->db->insert('clientes',$dato);
				$data['mj'] = "Su registro se ha realizado con éxito.";
			}else{
				$data['mj'] ="Ya contamos con un registro con el correo ingresado. ";
			}
		}else{
			$data['mj'] ="Ya contamos con un registro con el CURP ingresado. ";
		}
		$data['estados'] = $this->consultas_model->get_e();
		$data['municipios'] = $this->consultas_model->get_m();


		$this->load->view('registro',$data);
	}
	public function reg()
	{
		$cur=$this->input->post('c');
		$count = $this->consultas_model->consulta_count_where("clientes",$cur,"curp");
		if($count==0){
			$correo=$this->input->post('email');
			$count = $this->consultas_model->consulta_count_where("usuarios",$correo,"correo");
			if($count==0){
				$dat['correo'] = $correo;
				$dat['tipo'] = "Cliente";
				$dat['status'] = "activo";
				$dat['nombre_completo'] = $this->input->post('n');
				$dat['fecha_registro'] = date("Y-m-d");
				$pass = $this->input->post('p');
				$dat['contrasenia'] = openssl_encrypt($pass,'AES-128-ECB',$this->keycrypt);
				$id= $this->consultas_model->insert_r('usuarios',$dat);

				$dato['curp'] = $cur;
				$id= $this->db->insert_id();
				$dato['usuarios_id_usuarios'] = $id;
				$dato['municipios_id_municipio'] = 0;
				$this->db->insert('clientes',$dato);
				$data['mj'] = "Su registro se ha realizado con éxito.";
			}else{
				$data['mj'] ="Ya contamos con un registro con el correo ingresado. ";
			}
		}else{
			$data['mj'] ="Ya contamos con un registro con el CURP ingresado. ";
		}
		//$this->load->view('inicio',$data);
		//redirect('Welcome/inicio');
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($data['mj']));
	}
	public function municipios()
	{
		$estado=$this->input->post('es');
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->consultas_model->get_m($estado)));
	}
	public function confirmar_c()
	{
		$cur=$this->input->post('c');
		$count = $this->consultas_model->consulta_count_where("clientes",$cur,"curp");
		if($count==0){
			$data['mj'] ="Aprobado";
		}else{
			$data['mj'] ="Ya contamos con un registro con el CURP ingresado. ";
		}
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($data['mj']));
	}
	public function confirmar_e()
	{
		$correo=$this->input->post('e');
		$count = $this->consultas_model->consulta_count_where("usuarios",$correo,"correo");
		if($count==0){
			$data['mj'] = "Aprobado";
		}else{
			$data['mj'] ="Ya contamos con un registro con el correo ingresado. ";
		}
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($data['mj']));
	}

	public function entrar()
	{$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo!=""){
			if($tipo=="Administrador"){
				redirect('Microprestamos/usuarios');
			}
			if($tipo=="Agente"){
				redirect('Microprestamos/solicitudes');
			}
			if($tipo=="Cliente"){
				redirect('Clientes/solicitudes');
			}
		}else{
			redirect('Welcome/index');
		}
	}
	public function enviar()
	{
		$nick=$this->input->post('em');
		$pass = $this->input->post('pw');
		$contraseña=openssl_encrypt($pass,'AES-128-ECB',$this->keycrypt);
		$data['usr'] = $this->consultas_model->get_l(($nick),$contraseña);
		$c = count($data['usr']);
		if($c==1){
			$this->session->set_userdata('nombre',$data['usr'][0]->nombre_completo);
			$this->session->set_userdata('tipo',$data['usr'][0]->tipo);
			$this->session->set_userdata('correo',$data['usr'][0]->correo);
			$this->session->set_userdata('id',$data['usr'][0]->id_usuarios);
			$this->session->set_userdata('logueado',true);
			//$this->session->set_userdata($datos);
			$data['mj'] ="Aprobado";
		}else{
			$data['mj'] ="Los datos ingresados son incorrectos. ";
			//redirect('Welcome/inicio',$data);
		}
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($data['mj']));
	}
}
