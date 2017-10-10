<?php 
	
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
	*/
	class Home extends CI_Controller
	{
		
				
		public function  index(){

			

			$this->load->library("Datalibrary"); //Cargamos la libreria

			
			$datahead=$this->datalibrary->buildHead();
			$this->load->view('guest/head',$datahead);

			$this->load->view('guest/header');
			
						
			
			
			
			

			//ASIDE IZQ

			$dataizq = $this->Loteriamodelo->getLoteria(); //todo sobre loteria

			
			$futurosEventos = $this->Eventosmodelo->getFuturosEventos(); // todo sobre futuros eventos desde el dia actual
			$dataizq['futurosEventos']=$futurosEventos;

			$getDiasEsteMesEventos = $this->Eventosmodelo->getDiasEsteMesEventos();
			$dataizq['getDiasEsteMesEventos']=$getDiasEsteMesEventos;

			//d($dataizq);


			$this->calendar_propio =$this->CalendarioEventosmodelo;	
			$dataizq['calendario_propio'] = $this->calendar_propio;

			

			$this->load->view('guest/aside_izquierdo',$dataizq);
			$dataCalendario['calendarioview'] = $this->load->view('guest/calendario', $dataizq, TRUE);
			
			
			
			$this->load->view('guest/manifiesto');


			if (isset($_REQUEST['suscribirBoletin']))
			{
				$msgSuscripcion=$this->SuscribirseModelo->Suscribirse();
				
			}
			else{
				$msgSuscripcion='';
			}

			$dataMensaje['msgSuscripcion']=$msgSuscripcion;
			$this->load->view('guest/aside_derecho',$dataMensaje);


			//Contacto

			$datafooter=$this->datalibrary->buildFooter();		
			$this->load->view('guest/footer',$datafooter);
			

		}






	}

?>