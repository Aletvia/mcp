<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Microprestamos extends CI_Controller {
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
	 function log_out()
	{
		$this->session->sess_destroy();
		// null the session (just in case):
		$this->session->set_userdata(array('nombre' => '', 'correo' => '', 'tipo' => '', 'id' => '', 'logueado' => false));    
		redirect('Microprestamos/login');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function agregar_usuario()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Administrador'){
			$this->load->view('microprestamos/header_a');
			$this->load->view('microprestamos/agregar_usuario');
	}
		}
	public function clientes()
	{
		$this->verificar_sesion();
		$data['clientes'] = $this->consultas_model->get_c();
		$data['count'] = $this->consultas_model->count_results("clientes");
        $this->load->view('microprestamos/header_a');
		$this->load->view('microprestamos/clientes',$data);
	}
	public function usuarios()
	{		
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Administrador'){
			$data['usr'] = $this->consultas_model->get_u();
			$data['count'] = count($data['usr']);
			$this->load->view('microprestamos/header_a');
			$this->load->view('microprestamos/usuarios',$data);
		}
	}
	public function ver_usuario()
	{		
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Administrador'){
			$data['usr'] = $this->consultas_model->get_u($this->input->post('us'));
			$this->load->view('microprestamos/header_a');
			$this->load->view('microprestamos/ver_usuario',$data);
		}
	}
	public function editar_usuario()
	{		
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Administrador'){
			$data['usr'] = $this->consultas_model->get_u($this->input->post('us'));
			$this->load->view('microprestamos/header_a');
			$this->load->view('microprestamos/editar_usuario',$data);
		}
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
               redirect('Microprestamos/usuarios');
		}else{
               redirect('Microprestamos/login');
        }
     }
}
