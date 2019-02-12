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
				$dat['status'] = "inactivo";
				$nombre=$this->input->post('n');
				$dat['nombre_completo'] = $nombre;
				$dat['fecha_registro'] = date("Y-m-d");
				$pass = $this->input->post('p');
				$dat['contrasenia'] = openssl_encrypt($pass,'AES-128-ECB',$this->keycrypt);

				$id= $this->consultas_model->insert_r('usuarios',$dat);
				$dato['curp'] = $cur;
				$dato['fecha_nacimiento'] = $this->input->post('b');
				$dato['municipios_id_municipio'] = $this->input->post('m');
				$id= $this->db->insert_id();
				$dato['usuarios_id_usuarios'] = $id;
				$this->consultas_model->insert_r('clientes',$dato);


				//Enviar mensaje
				$this->load->library('email');
				$this->email->from('junkokimiko@gmail.com','Microprestamos123');
				$this->email->to($correo);
				$this->email->cc('aletvialecona@gmail.com');
				//$this->email->bcc('aletvialecona@gmail.com');
				$this->email->set_mailtype("html");
				$this->email->subject('Validación de correo para Microprestamos123');
				$this->email->message('<table style="height: 154px; width: 100%;">
				<tbody>
				<tr style="height: 43px;">
				<td style="width: 72px; height: 43px;">&nbsp;</td>
				<td style="width: 440px; height: 43px;"><a title="Microprestamos123" href="https://microprestamos123.com" target="_blank" rel="noopener"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://microprestamos123.com/assets/css/img/apple-touch-icon.png" alt="Microprestamos123" width="182" height="37" /></a></td>
				<td style="width: 68px; height: 43px;">&nbsp;</td>
				</tr>
				<tr style="height: 64px;">
				<td style="width: 72px; height: 64px;">&nbsp;</td>
				<td style="width: 440px; height: 64px;">
				<h2 style="color: #2e6c80;"><span style="color: #008000;">Hola $nombre</span>:</h2>
				<p>Necesitamos validar tu correo, para hacerlo debes dar clic en en siguiente bot&oacute;n.&nbsp;</p>
				<p style="text-align: center;"><a href="https://microprestamos123.com/index.php/Welcome/validar_correo?c="$correo target="_blank" rel="noopener"><span style="background-color: #008000; color: #fff; display: inline-block; padding: 3px 10px; font-weight: bold; border-radius: 5px;">Validar correo</span></a></p>
				</td>
				<td style="width: 68px; height: 64px;">&nbsp;</td>
				</tr>
				</tbody>
				</table>');

				if($this->email->send())
				$mj="Email sent successfully.";
				else
				$mj="Error in sending Email.";
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
				$dat['status'] = "inactivo";
				$nombre=$this->input->post('n');
				$dat['nombre_completo'] = $nombre;
				$dat['fecha_registro'] = date("Y-m-d");
				$pass = $this->input->post('p');
				$dat['contrasenia'] = openssl_encrypt($pass,'AES-128-ECB',$this->keycrypt);
				$id= $this->consultas_model->insert_r('usuarios',$dat);

				$dato['curp'] = $cur;
				$id= $this->db->insert_id();
				$dato['usuarios_id_usuarios'] = $id;
				$dato['municipios_id_municipio'] = 1;
				$this->consultas_model->insert_r('clientes',$dato);

				//Enviar mensaje
				$this->load->library('email');
				$this->email->from('junkokimiko@gmail.com','Microprestamos123');
				$this->email->to($correo);
				$this->email->cc('aletvialecona@gmail.com');
				//$this->email->bcc('aletvialecona@gmail.com');
				$this->email->set_mailtype("html");
				$this->email->subject('Validación de correo para Microprestamos123');
				$this->email->message('<table style="height: 154px; width: 100%;">
				<tbody>
				<tr style="height: 43px;">
				<td style="width: 72px; height: 43px;">&nbsp;</td>
				<td style="width: 440px; height: 43px;"><a title="Microprestamos123" href="https://microprestamos123.com" target="_blank" rel="noopener"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://microprestamos123.com/assets/css/img/apple-touch-icon.png" alt="Microprestamos123" width="182" height="37" /></a></td>
				<td style="width: 68px; height: 43px;">&nbsp;</td>
				</tr>
				<tr style="height: 64px;">
				<td style="width: 72px; height: 64px;">&nbsp;</td>
				<td style="width: 440px; height: 64px;">
				<h2 style="color: #2e6c80;"><span style="color: #008000;">Hola $nombre</span>:</h2>
				<p>Necesitamos validar tu correo, para hacerlo debes dar clic en en siguiente bot&oacute;n.&nbsp;</p>
				<p style="text-align: center;"><a href="https://microprestamos123.com/index.php/Welcome/validar_correo?c="$correo target="_blank" rel="noopener"><span style="background-color: #008000; color: #fff; display: inline-block; padding: 3px 10px; font-weight: bold; border-radius: 5px;">Validar correo</span></a></p>
				</td>
				<td style="width: 68px; height: 64px;">&nbsp;</td>
				</tr>
				</tbody>
				</table>');

				if($this->email->send())
				$mj="Email sent successfully.";
				else
				$mj="Error in sending Email.";
				$data['mj'] = "Su registro se ha realizado con éxito.";

			}else{
				$data['mj'] ="Ya contamos con un registro con el correo ingresado. ";
			}
		}else{
			$data['mj'] ="Ya contamos con un registro con el CURP ingresado. ";
		}
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($data['mj']));
	}
	public function int()
	{
		$tm=$this->input->post('tm');
		$tm=str_replace(" días","",$tm);
		$r=$this->input->post('r');
		$interes=$r*(1.3805*$tm/100);
		$t=$r+$interes;
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode(round($interes, 2).",".round($t, 2)));
	}
	public function enviar_correo(){
		//Enviar mensaje
		$this->load->library('email');
		$this->email->from('aletvialecona@gmail.com','Microprestamos123');
		$this->email->to('a.anaid@hotmail.es');
		//$this->email->to('yo.rana@hotmail.es');
		$this->email->cc('junkokimiko@gmail.com');
		//$this->email->bcc('aletvialecona@gmail.com');
		$this->email->set_mailtype("html");
		$this->email->subject('Validación de correo para Microprestamos123');
		$this->email->message('<table style="height: 154px; width: 100%;">
		<tbody>
		<tr style="height: 43px;">
		<td style="width: 72px; height: 43px;">&nbsp;</td>
		<td style="width: 440px; height: 43px;"><a title="Microprestamos123" href="https://microprestamos123.com" target="_blank" rel="noopener"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://microprestamos123.com/assets/css/img/apple-touch-icon.png" alt="Microprestamos123" width="182" height="37" /></a></td>
		<td style="width: 68px; height: 43px;">&nbsp;</td>
		</tr>
		<tr style="height: 64px;">
		<td style="width: 72px; height: 64px;">&nbsp;</td>
		<td style="width: 440px; height: 64px;">
		<h2 style="color: #2e6c80;"><span style="color: #008000;">Hola Aletvia</span>:</h2>
		<p>Necesitamos validar tu correo, para hacerlo debes dar clic en en siguiente bot&oacute;n.&nbsp;</p>
		<p style="text-align: center;"><a href="https://microprestamos123.com/index.php/Welcome/validar_correo?c=" target="_blank" rel="noopener"><span style="background-color: #008000; color: #fff; display: inline-block; padding: 3px 10px; font-weight: bold; border-radius: 5px;">Validar correo</span></a></p>
		</td>
		<td style="width: 68px; height: 64px;">&nbsp;</td>
		</tr>
		</tbody>
		</table>');

		if($this->email->send())
		$mj="Email sent successfully.";
		else
		$mj="Error in sending Email.";
		var_dump($this->email->print_debugger());
		echo "<script type='text/javascript'>alert('$mj') </script>";

	}

	public function validar_correo()
	{
		$correo=$this->input->get('c');
		$count = $this->consultas_model->consulta_count_where("usuarios",$correo,"correo");
		if($count==0){
			$data['mj'] = "Aprobado";
		}else{
			$dat['status'] = "activo";
			$this->consultas_model->update_r('usuarios',$count->id_usuarios,$dat,'id_usuarios');
		}
		$this->load->view('validar_correo');
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
	public function informacion_solicitud()
	{
		$id=$this->input->post('us');
		$data['rode']=$this->input->post('rode');
		$data['interes']=$this->input->post('interes');
		$data['time']=$this->input->post('time');
			$data['cli'] = $this->consultas_model->get_c($id);
			$data['estados'] = $this->consultas_model->get_e();
			$data['municipios'] = $this->consultas_model->get_m($data['cli'][0]->id_estado);
			$this->load->view('cliente/header');
			$this->load->view('cliente/agregar_solicitud_inicio',$data);
	}
}
