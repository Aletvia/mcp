<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Consultas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //contamos todos los resultados de la tabla
    //que pasemos como argumento
    public function count_results($table)
    {
        return $this->db->count_all_results($table);
    }
 
    //obtenemos un registro  dependiendo del id y tabla que le pasemos
    public function consulta_get_where($table,$id,$name)
    {
        $query = $this->db->get_where($table,array($name => $id));
        if($query->num_rows() > 0 )
        {
            //veamos que sólo retornamos una fila con row(), no result()
            return $query->row();
        }
    }
    public function consulta_count_where($table,$id,$name)
    {
        $query = $this->db->get_where($table,array($name => $id));
        if($query->num_rows() > 0 )
        {
            //veamos que sólo retornamos una fila con row(), no result()
            return $query->num_rows();
        }
    }
	
    //obtenemos los registros dependiendo de la tabla que le pasemos
    public function consulta_get($table,$id,$name)
    {
        $query = $this->db->get_where($table,array($name => $id));
        if($query->num_rows() > 0 )
        {
            //veamos que sólo retornamos una fila con row(), no result()
            return $query->row();
        }else{
			return null;
		}
    }
    
    //insertamos un nuevo registro en la tabla
    public function insert_r($table,$data)
    {
        /*$data = array(
            'username'       =>   'Juan68',
            'fname'          =>   'Juan',
            'lname'          =>   'Pérez',
            'register_date'  =>    '2013-01-19 10:00:00'
            );*/
		$this->db->insert($table, $data);
		return $this->db->insert_id();
    }
   
    //eliminamos el registro con el id #
    public function delete_r($table,$data,$name)
    {
        $this->db->delete($table, array($name => $data));
    }
 
    //actualizamos los datos del usuario con id 
    public function update_r($table,$id,$data,$name)
    {
        /*$data = array(
            'username' => 'silvia',
            'fname' => 'madrejo',
            'lname' => 'sánchez'
        );*/
        $this->db->where($name, $id);
        $this->db->update($table, $data);
    }
	
	
	//obtenemos las entradas de las tablas, dependiendo
    // si le pasamos le id como argument o no

	public function get_u($id = false)
	{
		if($id === false)
		{
            $this->db->select('u.id_usuarios,u.nombre_completo,u.tipo,u.correo,u.fecha_registro');
            $this->db->from('usuarios u');
            $this->db->where('u.status','activo');
			$this->db->order_by("u.nombre_completo", "asc");
		}else{
            $this->db->select('u.id_usuarios,u.nombre_completo,u.tipo,u.correo,u.fecha_registro');
            $this->db->from('usuarios u');
			$this->db->where('u.id_usuarios',$id);
		}
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
	}
	public function get_l($nick = false,$contraseña = false)
	{
            $this->db->select('u.id_usuarios,u.nombre_completo,u.tipo,u.correo');
            $this->db->from('usuarios u');
			$this->db->where('u.correo',$nick);
			$this->db->where('u.contrasenia',$contraseña);
			$this->db->where('u.status','activo');
		
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
	}
	public function get_c($id = false)
	{
        if($id === false)
        {
            $this->db->select('c.id_cliente,u.id_usuarios,u.nombre_completo,c.curp,u.correo,m.municipio,e.estado,u.fecha_registro,c.fecha_nacimiento');
            $this->db->from('usuarios u');
            $this->db->join('clientes c', 'c.usuarios_id_usuarios = u.id_usuarios');
            $this->db->join('municipios m', 'c.municipios_id_municipio = m.id_municipio');
            $this->db->join('estados e', 'm.estados_id_estado = e.id_estado');
            $this->db->where('u.status','activo');
            $this->db->where('u.tipo','Cliente');
			$this->db->order_by("u.nombre_completo", "asc");
        }else{
            $this->db->select('c.id_cliente,u.id_usuarios,u.fecha_registro,u.nombre_completo,c.curp,c.genero,c.fecha_nacimiento,
			c.telefono1,c.telefono2,u.correo,c.anios_domicilio,	c.nacimiento_estado,
			c.calle,c.no_exterior,c.no_interior,c.colonia,m.municipio,e.estado,
			c.lab_anios_experiencia,c.dependientes,c.lab_pagos_x_banco,c.lab_descripcion_empleo,
			c.lab_salario_mensual,c.lab_industria,c.lab_puesto,c.lab_nombre_empresa,
			c.his_tarjeta_credito,c.his_credito_auto,c.his_credito_tel,c.his_cal_his_cred,
			c.his_desc_cal,c.credencial,c.foto');
            $this->db->from('usuarios u');
            $this->db->join('clientes c', 'c.usuarios_id_usuarios = u.id_usuarios');
            $this->db->join('municipios m', 'c.municipios_id_municipio = m.id_municipio');
            $this->db->join('estados e', 'm.estados_id_estado = e.id_estado');
            $this->db->where('c.id_cliente',$id);
			$this->db->order_by("u.nombre_completo", "asc");
        }
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
	}
	public function get_s($id = false)
	{
        if($id === false)
        {
            $this->db->select('c.id_cliente,u.id_usuarios,s.id_solicitud,
			u.nombre_completo,u.correo,s.status,s.fecha_solicitud,s.monto');
            $this->db->from('solicitudes s');
            $this->db->join('clientes c', 'c.id_cliente = s.clientes_id_cliente');
            $this->db->join('usuarios u', 'u.id_usuarios = s.clientes_usuarios_id_usuarios');
            $this->db->join('municipios m', 'c.municipios_id_municipio = m.id_municipio');
            $this->db->join('estados e', 'm.estados_id_estado = e.id_estado');
            $this->db->where('u.status','activo');
            $this->db->where('u.tipo','Cliente');
			$this->db->order_by("u.nombre_completo", "asc");
        }else{
            $this->db->select('c.id_cliente,u.id_usuarios,u.fecha_registro,u.nombre_completo,c.curp,c.genero,c.fecha_nacimiento,
			c.telefono1,c.telefono2,u.correo,c.anios_domicilio,	c.nacimiento_estado,
			c.calle,c.no_exterior,c.no_interior,c.colonia,m.municipio,e.estado,
			c.lab_anios_experiencia,c.dependientes,c.lab_pagos_x_banco,c.lab_descripcion_empleo,
			c.lab_salario_mensual,c.lab_industria,c.lab_puesto,c.lab_nombre_empresa,
			c.his_tarjeta_credito,c.his_credito_auto,c.his_credito_tel,c.his_cal_his_cred,
			c.his_desc_cal,c.credencial,c.foto,
			s.id_solicitud,s.status,s.fecha_solicitud,s.monto,s.tiempo,s.desc_uso,
			s.tipo_deposito,s.referencia,s.banco,s.tiempo_estimado,s.calendarios.comprobante');
            $this->db->from('solicitudes s');
            $this->db->join('clientes c', 'c.id_cliente = s.clientes_id_cliente');
            $this->db->join('usuarios u', 'u.id_usuarios = s.clientes_usuarios_id_usuarios');
            $this->db->join('municipios m', 'c.municipios_id_municipio = m.id_municipio');
            $this->db->join('estados e', 'm.estados_id_estado = e.id_estado');
            $this->db->where('c.id_cliente',$id);
			$this->db->order_by("u.nombre_completo", "asc");
        }
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
	}
	
    public function get_m($id = false)
    {
        if($id === false)
        {
            $this->db->select('m.id_municipio,e.estado, m.municipio');
            $this->db->from('municipios m');
			$this->db->order_by("estado", "asc");
            $this->db->join('estados e', 'm.estados_id_estado = e.id_estado');
        }else{
            $this->db->select('m.id_municipio AS id,m.municipio AS mun');
            $this->db->from('municipios m');
            $this->db->join('estados e', 'm.estados_id_estado = e.id_estado');
			$this->db->order_by("municipio", "asc");
            $this->db->where('m.estados_id_estado',$id);
        }
		$query = $this->db->get();
		if($query->result()){
			return $query->result();
		}
    }
	public function get_e()
    {
		$this->db->select('e.id_estado,e.estado');
		$this->db->from('estados e');
		$this->db->order_by("e.estado", "asc");
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
			/*$e = array();
			foreach($query->result('') as $fila){
				$es=new e($fila->id_estado,$fila->estado);
				$e->add(es);
			}
			return e;*/
        }
    }
	public function users_entrys($id = false)
    {
        if($id === false)
        {
            $this->db->select('m.id_municipio,u.municipio,u.tipo,u.status,e.nombre_completo,e.contrasenia');
            $this->db->from('municipio u');
            $this->db->join('entradas e', 'u.id = e.id_user');
        }else{
            $this->db->select('u.username,u.fname,u.lname,u.register_date,e.titulo,e.entrada,e.publish_date');
            $this->db->from('users u');
            $this->db->join('entradas e', 'u.id = e.id_user');
            $this->db->where('u.id',$id);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }
}
/*
 * end of application/models/consultas_model.php
 */