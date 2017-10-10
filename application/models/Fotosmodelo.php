<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* 
	*/
	class Fotosmodelo extends CI_Model
	{

		


		public function numFotos(){

			// $total = $this->db->get('posttable')->num_rows();   METODO LENTO DE CARA AL SERVIDOR

			$sentencia = "SELECT count(*) AS total FROM fotos";
			$total= $this->db->query($sentencia)->row()->total;  // converir fila y total
						
			return intval($total);  // asegurarnos que sea entero

		}

		public function getFotos(){

						
	
			$this->db->select('*');
			$this->db->from('fotos');
			$this->db->order_by("idFoto","asc");
			$query = $this->db->get();
			

			return $query->result_array();  
		}

		



	}

 ?>