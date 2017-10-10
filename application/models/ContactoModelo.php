 

<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* 
	*/
	class ContactoModelo extends CI_Model
	{
		



		public function inserContactoSugerencia($data){

			$this->db->insert('contacto', $data);
		}
		


		public function numMsgContactos(){

			// $total = $this->db->get('posttable')->num_rows();   METODO LENTO DE CARA AL SERVIDOR

			$sentencia = "SELECT count(*) AS total FROM contacto";
			$total= $this->db->query($sentencia)->row()->total;  // converir fila y total
						
			return intval($total);  // asegurarnos que sea entero

		}

		public function getTablaContactos(){			
	
			$this->db->select('*');
			$this->db->from('contacto');		
			$query = $this->db->get();			

			return $query->result_array();  
		}





	}//fin class

?>