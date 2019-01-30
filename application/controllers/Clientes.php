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
		if($tipo!='Cliente'){
			$data['cli'] = $this->consultas_model->get_c($this->session->userdata('id'));
			$this->load->view('Clientes/header');
			$this->load->view('Clientes/editar_cliente',$data);
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
		if($tipo=='Cliente'){
			$data['cli'] = $this->consultas_model->get_c($this->session->userdata('id'));
			$this->load->view('Clientes/header');
			$this->load->view('Clientes/agregar_cliente',$data);
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
