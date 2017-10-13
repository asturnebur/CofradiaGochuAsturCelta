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
			$this->db->join('administradores','usuarios.idCofrade = administradores.idCofrade');		
			$query = $this->db->get();			

			return $query->result_array();  
		}


		public function bajaCofrade($idCofrade){			
	
			
			$sql= "DELETE FROM usuarios WHERE idCofrade='$idCofrade'";
			$this->db->query($sql);
			

		}

		public function editCofrade($idCofrade,$email,$name,$surname1,$surname2,$birthday,$inscription){			
	
			
			$sql="UPDATE usuarios SET email = '$email',
									   name= '$name',
									   surname1= '$surname1',
									   surname2= '$surname2',
									   birthday= '$birthday',
									   inscription= '$inscription'
									   WHERE idCofrade='$idCofrade' ";
			return $this->db->query($sql);
			

		}


		function login($alias, $password){
			/*$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->join('admin','usuarios.idCofrade = admin.idCofrade');	

			$this->db->where('alias', $alias);
		  	$this->db->where('password', MD5($password));
		  	$this->db->where('isAdmin', '1');
		   	$this->db->limit(1);*/

			//$query = $this->db->get();	
			//d($query);	



		   	$password = MD5($password);
		   

		   	$query = $this->db->query("SELECT * FROM usuarios INNER JOIN administradores
		   	AS adm ON usuarios.idCofrade = adm.idCofrade WHERE alias = '$alias' AND isAdmin= '1' AND password='$password' LIMIT 1");

		   	$row= $query->result_array();

		   	

			if (   count($row) == 1  ) {
				return true;
			} else {
				return false;
			}
		}

		function getemail($alias,$password){

			$password = MD5($password);		   	

		   	$query = $this->db->query("SELECT email FROM usuarios INNER JOIN administradores
		   	AS adm ON usuarios.idCofrade = adm.idCofrade WHERE alias = '$alias' AND isAdmin= '1' AND password='$password' LIMIT 1");
		   	$row= $query->row_array();
		   	return $row['email'];
		}
		
		
	}


		
		
		
 ?>