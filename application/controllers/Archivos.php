<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller {
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
	public function download () {
		$this->load->helper('download');
		$n=$this->input->get('n');
		$file = 'uploads/'.$n;
		force_download($file, NULL);
		echo "<script type='text/javascript'>window.close(); </script>";
	}
	//--------------------CLIENTE
	public function Credencial()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Cliente'){
			$this->load->view('archivos/cred_act', array('error' => ' ' ));
		}
	}
	public function do_upload_cred()
	{
		$id = $this->session->userdata('id');
		$n = $this->session->userdata('nombre')."_credencial";
		$config['upload_path']          = './uploads/cdcls/';
		$config['allowed_types']        = 'jpeg|jpg';
		$config['max_size']             = 1000;
		$config['max_width']            = 3000;
		$config['max_height']           = 3000;
		$config['file_name']           = $n;

		$this->load->library('upload', $config);
		$this->upload->overwrite = true;


		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('cliente/img', $error);
		}
		else
		{

			$this->consultas_model->foto_cd($id, $this->upload->data());
			/*$imgdata= $this->upload->data();
			$imgdatas = file_get_contents($imgdata['full_path']);
			$imagenBinaria = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
			$this->consultas_model->foto_u($id, $imagenBinaria);*/
			$this->orig_name = $n;
			if ($this->upload->overwrite == FALSE)
			{
				$this->file_name = $this->set_filename($this->upload_path, $n);

				if ($this->file_name === FALSE)
				{
					return FALSE;
				}
			}
			echo "<script type='text/javascript'>window.close(); </script>";
		}
	}
	public function Foto()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo=='Cliente'){
			$this->load->view('archivos/foto_act', array('error' => ' ' ));
		}
	}
	public function do_upload()
	{
		$id = $this->session->userdata('id');
		$n = $this->session->userdata('nombre')."_foto";
		$config['upload_path']          = './uploads/fotos/';
		$config['allowed_types']        = 'jpeg|jpg';
		$config['max_size']             = 2000;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;
		$config['file_name']           = $n;

		$this->load->library('upload', $config);
		$this->upload->overwrite = true;


		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('cliente/img', $error);
		}
		else
		{

			$this->consultas_model->foto_u($id, $this->upload->data());
			$this->orig_name = $n;
			if ($this->upload->overwrite == FALSE)
			{
				$this->file_name = $this->set_filename($this->upload_path, $n);

				if ($this->file_name === FALSE)
				{
					return FALSE;
				}
			}
			$message = $this->session->userdata('nombre')."tu archivo ha sido actualizado!";
			echo "<script type='text/javascript'>window.close(); </script>";
		}
	}
	public function ver_f() {
		$id = $this->session->userdata('id');
		$data['imagen']= $this->consultas_model->get_image($id);
		$this->load->view('microprestamos/img', $data);
		//$data['mj']="s";
		//header('Content-Type: application/x-json; charset=utf-8');
		//echo(json_encode($data['mj']));
		// pass the uploaded information to the model
	}
	//-----------------------INTERNO
	public function Calendario()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo!='Cliente'){
			$u=$this->input->get('u');
			$s=$this->input->get('s');
			$this->load->view('archivos/cal_act', array('error' => ' ','u' => $u,'s' => $s ));
		}
	}
	public function do_upload_cal()
	{
		$id=$this->input->post('u');
		$s=$this->input->post('s');
		$usr = $this->consultas_model->consulta_get_where('usuarios',$id,'id_usuarios');
		$n = $usr->nombre_completo."_calendario_".$s;
		$config['upload_path']          = './uploads/cldr/';
		$config['allowed_types']        = 'jpeg|jpg';
		$config['max_size']             = 2000;
		$config['max_width']            = 3000;
		$config['max_height']           = 3000;
		$config['file_name']           = $n;

		$this->load->library('upload', $config);
		$this->upload->overwrite = true;
		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors(),'u' => $usr->id_usuarios, "s"=> $s );
			$this->load->view('cliente/img', $error);
		}
		else
		{
			$this->consultas_model->foto_cl($s, $this->upload->data());
			$this->orig_name = $n;
			if ($this->upload->overwrite == FALSE)
			{
				$this->file_name = $this->set_filename($this->upload_path, $n);

				if ($this->file_name === FALSE)
				{
					return FALSE;
				}
			}
			echo "<script type='text/javascript'>window.close(); </script>";
		}
	}
	public function Comprobante()
	{
		$this->verificar_sesion();
		$var = $this->session->userdata;
		$tipo=$var['tipo'];
		if($tipo!='Cliente'){
			$u=$this->input->get('u');
			$s=$this->input->get('s');
			$this->load->view('archivos/comp_act', array('error' => ' ','u' => $u,'s' => $s ));
		}
	}
	public function do_upload_comp()
	{
		$id=$this->input->post('u');
		$s=$this->input->post('s');
		$usr = $this->consultas_model->consulta_get_where('usuarios',$id,'id_usuarios');
		$n = $usr->nombre_completo."_cmprbnt_".$s;
		$config['upload_path']          = './uploads/cmprbnt/';
		$config['allowed_types']        = 'jpeg|jpg';
		$config['max_size']             = 2000;
		$config['max_width']            = 3000;
		$config['max_height']           = 3000;
		$config['file_name']           = $n;

		$this->load->library('upload', $config);
		$this->upload->overwrite = true;

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors(),'u' => $usr->id_usuarios,"s"=>$s );
			$this->load->view('archivos/comp_act', $error);
		}
		else
		{
			$this->consultas_model->foto_cm($s, $this->upload->data());
			$this->orig_name = $n;
			if ($this->upload->overwrite == FALSE)
			{
				$this->file_name = $this->set_filename($this->upload_path, $n);
				if ($this->file_name === FALSE)
				{
					return FALSE;
				}
			}
			echo "<script type='text/javascript'>window.close(); </script>";
		}
	}
}
