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
	//--------------------CLIENTES
	public function clientes()
	{
		$this->verificar_sesion();

		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo!='Cliente'){
			$data['clientes'] = $this->consultas_model->get_c();
			if($data['clientes']!=null)
				$data['count'] = count($data['clientes']);
			else
				$data['count'] =0;
			if($tipo=='Administrador'){
				$this->load->view('microprestamos/header_a');
			}else if($tipo=='Agente'){
					$this->load->view('microprestamos/header');
			}
			$this->load->view('microprestamos/clientes',$data);
		}
	}
	public function ver_cliente()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo!='Cliente'){
			$data['cli'] = $this->consultas_model->get_c($this->input->post('us'));
			if($tipo=='Administrador'){
				$this->load->view('microprestamos/header_a');
			}else if($tipo=='Agente'){
					$this->load->view('microprestamos/header');
			}
			$this->load->view('microprestamos/ver_cliente',$data);
		}
	}
	//-----------------------USUARIOS
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
		}else{
			redirect('Microprestamos/clientes');
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
		}else{
			redirect('Microprestamos/clientes');
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
		}else{
			redirect('Microprestamos/clientes');
		}
	}
	public function editar_u()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Administrador'){
			$e=$this->input->post('e');
			$c = $this->consultas_model->consulta_get_where("usuarios",$this->input->post('us'),"id_usuarios");
			$dat['correo'] = $e;
			$dat['tipo'] = $this->input->post('t');
			$dat['status'] = "activo";
			$dat['nombre_completo'] = $this->input->post('n');
			$dat['fecha_registro'] = $c->fecha_registro;
			$dat['id_usuarios'] = $c->id_usuarios;
			$pass = $this->input->post('p');
			if($pass==""){
				$dat['contrasenia'] = $c->contrasenia;
			}else{
				$dat['contrasenia'] = openssl_encrypt($pass,'AES-128-ECB',$this->keycrypt);
			}
			$this->consultas_model->update_r('usuarios',$c->id_usuarios,$dat,'id_usuarios');
			redirect('Microprestamos/usuarios');
		}else{
			redirect('Microprestamos/clientes');
		}
	}
	public function agregar_usuario()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Administrador'){
				$this->load->view('microprestamos/header_a');
				$this->load->view('microprestamos/agregar_usuario');
		}else{
			redirect('Microprestamos/clientes');
		}
	}
	public function agregar_u()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Administrador'){
			$c=$this->input->post('e');
			$dat['correo'] = $c;
				$dat['tipo'] = $this->input->post('t');
				$dat['status'] = "activo";
				$dat['nombre_completo'] = $this->input->post('n');
				$dat['fecha_registro'] = date("Y-m-d");
				$pass = $this->input->post('p');
				$dat['contrasenia'] = openssl_encrypt($pass,'AES-128-ECB',$this->keycrypt);

				$this->consultas_model->insert_r('usuarios',$dat);
				$msj ="El registro se ha realizado con éxito.";
				redirect('Microprestamos/usuarios');
				echo "<script type=\"text/javascript\">alert(\"".$msj."\");</script>";
		}else{
			redirect('Microprestamos/clientes');
		}
	}
	public function verificare()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Administrador'){
			$c=$this->input->post('e');
			$count = $this->consultas_model->consulta_get("usuarios",$c,"correo");
			if($count==null){
				$msj ="";
				echo $msj;
			}else{
				$msj ="El correo ingresado ya existe. ";
				echo $msj;
			}
		}else{
			redirect('Microprestamos/clientes');
		}
	}

	public function eliminar_usuario()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Administrador')
		{
			$c = $this->consultas_model->consulta_get_where("usuarios",$this->input->post('us'),"id_usuarios");
			$dat['correo'] = $c->correo;
			$dat['tipo'] = $c->tipo;
			$dat['status'] = "inactivo";
			$dat['nombre_completo'] = $c->nombre_completo;
			$dat['fecha_registro'] = $c->fecha_registro;
			$dat['contrasenia'] = $c->contrasenia;
			$dat['id_usuarios'] = $c->id_usuarios;

			$this->consultas_model->update_r('usuarios',$this->input->post('us'),$dat,'id_usuarios');
			$msj = "El registro se ha eliminado con éxito.";
			redirect('Microprestamos/usuarios');
		}else{
			redirect('Microprestamos/clientes');
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

	 	public function solicitudes()
	 	{
			$this->verificar_sesion();

			$var = $this->session->userdata;
			$tipo=$var['tipo'];
			if($tipo!='Cliente'){
				$data['solicitudes'] = $this->consultas_model->get_c();
				if($data['solicitudes']!=null)
					$data['count'] = count($data['solicitudes']);
				else
					$data['count'] =0;
				if($tipo=='Administrador'){
					$this->load->view('microprestamos/header_a');
				}else if($tipo=='Agente'){
						$this->load->view('microprestamos/header');
				}
				$this->load->view('microprestamos/solicitudes',$data);
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
				$this->load->view('microprestamos/header_a');
			}else if($tipo=='Agente'){
					$this->load->view('microprestamos/header');
			}
			$this->load->view('microprestamos/ver_solicitud',$data);
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
				$this->load->view('microprestamos/header_a');
			}else if($tipo=='Agente'){
					$this->load->view('microprestamos/header');
			}
			$this->load->view('microprestamos/procesar_solicitud',$data);
		}
	}
}
