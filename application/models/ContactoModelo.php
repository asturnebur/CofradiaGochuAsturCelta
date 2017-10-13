 

<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* 
	*/
	class ContactoModelo extends CI_Model
	{
		



		public function inserContactoSugerencia($data){

			$this->db->insert('contactos', $data);
		}

		public function bajaContacto($email){

			$sql= "DELETE FROM contactos WHERE email='$email'";
			$this->db->query($sql);
		}
		


		public function numMsgContactos(){

			// $total = $this->db->get('posttable')->num_rows();   METODO LENTO DE CARA AL SERVIDOR

			$sentencia = "SELECT count(*) AS total FROM contactos";
			$total= $this->db->query($sentencia)->row()->total;  // converir fila y total
						
			return intval($total);  // asegurarnos que sea entero

		}

		public function getTablaContactos(){			
	
			$this->db->select('*');
			$this->db->from('contactos');		
			$query = $this->db->get();			

			return $query->result_array();  
		}





	}//fin class

?>