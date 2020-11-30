<?php namespace App\Models;
use CodeIgniter\Model;
class crudmodel extends Model{
    public function listarNombres(){
    	$Nombres= $this->db->query("SELECT *FROM t_personas");
    	return $Nombres->getResult();
    }
  
public function insertar($datos){
        $Nombres=$this->db->table('t_personas');
        $Nombres->insert($datos);

        return $this->db->insertId();
    }

    public function obtenerNombre($data){
        $Nombre =$this->db->table('t_personas');
        $Nombre->where($data);
return $Nombre->get()->getResultArray();

    }
    public function actualizar($data, $idNombre){
        $Nombre =$this->db->table('t_personas');
        $Nombre->set($data);
        $Nombre->where('id_nombre', $idNombre);
        return $Nombre->update();
    }

    public function eliminar($data){
        $Nombre =$this->db->table('t_personas');

        $Nombre->where($data);
        return $Nombre->delete();

    }
    }