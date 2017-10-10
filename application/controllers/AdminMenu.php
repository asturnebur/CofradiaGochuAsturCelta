<?php 
	
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
	*/
	class AdminMenu extends CI_Controller
	{
		
		public function  index(){

			

			$this->load->library("Datalibrary"); //Cargamos la libreria
			
			$datahead=$this->datalibrary->buildHead();
			$this->load->view('guest/head',$datahead);	

			$datosTabla['numSuscripciones']=$this->SuscribirseModelo->numSuscripciones();
			$datosTabla['numCofrades']=$this->CofradesModelo->numCofrades();
			$datosTabla['numMsgContactos']=$this->ContactoModelo->numMsgContactos();
			$datosTabla['numEventos']=$this->Eventosmodelo->numEventos();
			
			
			$this->load->view('private/adminmenu',$datosTabla);



			
			


		}

		public function VerSuscripciones(){

			$this->index();

			$datosTabla['datosTablaSuscripcion']=$this->SuscribirseModelo->getTablaSuscripciones();
			$this->load->view('private/tablasuscripciones',$datosTabla);
		}

		public function EliminarSuscripcion(){
			$email=$_REQUEST['email'];
			$this->SuscribirseModelo->bajaEmail($email);

			$this->VerSuscripciones();
		}

		public function VerCofrades(){

			$this->index();

			$datosTabla['datosTablaCofrades']=$this->CofradesModelo->getTablaCofrades();
			$this->load->view('private/tablacofrades',$datosTabla);
		}


		public function VerMensajesContactos(){

			$this->index();

			$datosTabla['datosTablaContactos']=$this->ContactoModelo->getTablaContactos();
			$this->load->view('private/tablacontactos',$datosTabla);

			
		}


		public function VerEventos(){

			$this->index();	

			$datosTabla['datosTablaEventos']=$this->Eventosmodelo->getEventosTabla();
			$this->load->view('private/tablaeventos',$datosTabla);	

		}


		public function VerFotos(){

			$this->index();	

			$this->load->helper('directory');

			//$map = directory_map(base_url().'plantilla/img/');
			$map['mapImg'] = directory_map('./plantilla/img/');

			$this->load->view('private/tablafotos',$map);	
		}




		public function Configuracion(){

			$this->index();
			$this->load->view('private/tareaspendientes');	

			
		}

		public function AddCofrade(){

			d('Addcoffff');

		}


		




	}

?>