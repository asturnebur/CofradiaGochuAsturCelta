<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* 
	*/
	class Eventosmodelo extends CI_Model
	{


		public function getGoogleMapsResult($dataEventos){

			$dataJSONGoogleMaps= array();

			//d($dataEventos);

			foreach ($dataEventos->result() as $fila) {

				$address= $fila->lugarEvento."%".$fila->calleEvento;

				
				$dataJSONGoogleMaps[] = $this->geocode($address);			

			}

			return $dataJSONGoogleMaps;
		}

		public function geocode($address){
 
		    // url encode the address
		    $address = urlencode($address);
		     
		    // google map geocode api url
		    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
		 
		    // get the json response
		    $resp_json = file_get_contents($url);
		     
		    // decode the json
		    $resp = json_decode($resp_json, true);
		 
		    // response status will be 'OK', if able to geocode given address 
		    if($resp['status']=='OK'){
		 
		        // get the important data
		        $lati = $resp['results'][0]['geometry']['location']['lat'];
		        $longi = $resp['results'][0]['geometry']['location']['lng'];
		        $formatted_address = $resp['results'][0]['formatted_address'];
		         
		        // verify if data is complete
		        if($lati && $longi && $formatted_address){
		         
		            // put the data in the array
		            $data_arr = array();            
		             
		            array_push(
		                $data_arr, 
		                    $lati, 
		                    $longi, 
		                    $formatted_address
		                );
		             
		            return $data_arr;
		             
		        }else{
		            return false;
		        }
		         
		    }else{
		        return false;
		    }
		}

		
		
		public function getTablaEventos(){

			return $this->db->query('SELECT * FROM eventos ORDER BY fechaInicioEvento  DESC');
		}


		public function getEventosTabla(){			
	
			$this->db->select('*');
			$this->db->from('eventos');		
			$query = $this->db->get();			

			return $query->result_array();  
		}





		public function getEventoConcreto($idEventoCofradia){

			

			$sentencia= "SELECT * FROM eventos WHERE idEventoCofradia='$idEventoCofradia' LIMIT 1";

			$resultado= $this->db->query($sentencia);

			return $resultado->row();  //Convertirlo en una fila con ->row()
		}

		

		public function getFuturosEventos(){

			$datenow = date("Y-m-d");
			
	
			$this->db->select('*');
			$this->db->from('eventos');
			$this->db->where('fechaInicioEvento >=',$datenow);
			$this->db->order_by("fechaInicioEvento","asc");
			$query = $this->db->get();
			

			return $query->result_array();  
		}

		public function getDiasEsteMesEventos(){

			$diasEventosMes=array();

			$datenow = date("Y-m-d");
			$year= date("Y");
			$mes= date("n");		
	
			$this->db->select('fechaInicioEvento');
			$this->db->from('eventos');
			$this->db->where('fechaInicioEvento >=',$datenow);
			$this->db->where('fechaInicioEvento <=',$year.'-'.$mes.'-31');
			$query = $this->db->get();

			foreach ($query->result_array() as $row)
			{
			   
			   array_push($diasEventosMes, substr($row['fechaInicioEvento'],8,2));
			}
			
			//$aux=substr($query->result_array(),8,2);
			
			return $diasEventosMes;  
		}


		

		public function insertEvento(){
			

			return false;
		}

		public function bajaEvento($idEventoCofradia){			
	
			
			$sql= "DELETE FROM eventos WHERE idEventoCofradia='$idEventoCofradia'";
			$this->db->query($sql);
			

		}

		public function editEvento($idEventoCofradia,$nombreEvento,$comentariosEvento,$lugarEvento,$provinciaEvento,$calleEvento,$fechaInicioEvento,$fechaFinalEvento,$fotoEvento){			
	
			
			$sql="UPDATE usuarios SET nombreEvento = '$nombreEvento',
									   comentariosEvento= '$comentariosEvento',
									   lugarEvento= '$lugarEvento',
									   provinciaEvento= '$provinciaEvento',
									   calleEvento= '$calleEvento',
									   fechaInicioEvento= '$fechaInicioEvento',
									   fechaFinalEvento= '$fechaFinalEvento',
									   fotoEvento = '$fotoEvento'
									   WHERE idEventoCofradia='$idEventoCofradia' ";
			return $this->db->query($sql);
			

		}


		public function numEventos(){

			// $total = $this->db->get('posttable')->num_rows();   METODO LENTO DE CARA AL SERVIDOR

			$sentencia = "SELECT count(*) AS total FROM eventos";
			$total= $this->db->query($sentencia)->row()->total;  // converir fila y total
						
			return intval($total);  // asegurarnos que sea entero

		}

		public function getPagination($numero_por_pagina){
 
			// baseurl/home/articulos/5        ->>>posicion>>>    0/1/2/3
			$this->db->order_by("fechaInicioEvento", "desc");
		
			return $this->db->get('eventos',$numero_por_pagina, $this->uri->segment(3) ); 

		}




	}

 ?>