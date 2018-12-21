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

	public function get_u()
	{
		$query = $this->db->select("contrasenia as contrasenia")
		->from("usuarios")
		->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	
    public function get_m($id = false)
    {
        if($id === false)
        {
            $this->db->select('m.id_municipio,m.municipio');
            $this->db->from('municipios m');
            $this->db->join('estados e', 'm.estados_id_estado = e.id_estado');
        }else{
            $this->db->select('m.id_municipio,m.municipio');
            $this->db->from('municipios m');
            $this->db->join('estados e', 'm.estados_id_estado = e.id_estado');
            $this->db->where('m.estados_id_estado',$id);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }else{
			return null;
		}
    }
	public function get_e()
    {
		$this->db->select('e.id_estado,e.estado');
		$this->db->from('estados e');
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
        }else{
			return null;
		}
    }
}
/*
 * end of application/models/consultas_model.php
 */