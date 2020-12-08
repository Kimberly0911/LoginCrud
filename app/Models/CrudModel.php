<?php namespace App\Models;

	use CodeIgniter\Model;

 	class CrudModel extends Model{
 		public function listarCon(){
 			$Nombres = $this->db->query("SELECT * FROM t_con");
 			return $Nombres->getResult();
 		}
	 
	 public function insertar($datos) {
        $Nombres = $this->db->table('t_con');
        $Nombres->insert($datos);
        return $this->insertID();
     }
     public function obtenerCon($data){
        $Nombres = $this->db->table('t_con');
        $Nombres->where($data);
      return $Nombres->get()->getResultArray();
     }
 

}

