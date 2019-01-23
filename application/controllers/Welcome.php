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
	public function municipios(){
		$estado=$this->input->post('es');
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->consultas_model->get_m($estado)));
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
	 
}
