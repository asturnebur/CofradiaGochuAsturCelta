<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* 
	*/
	class CofradesModelo extends CI_Model
	{
		public function numCofrades(){

			// $total = $this->db->get('posttable')->num_rows();   METODO LENTO DE CARA AL SERVIDOR

			$sentencia = "SELECT count(*) AS total FROM usuarios";
			$total= $this->db->query($sentencia)->row()->total;  // converir fila y total
						
			return intval($total);  // asegurarnos que sea entero

		}

		public function getTablaCofrades(){			
	
			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->join('admin','usuarios.idCofrade = admin.idCofrade');		
			$query = $this->db->get();			

			return $query->result_array();  
		}



		
	}


		
		
		
 ?>