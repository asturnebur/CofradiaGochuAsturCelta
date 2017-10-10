<?php 
	
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
	*/
	class Eventos extends CI_Controller
	{

		public function  index(){


			header('Location:'.base_url('Eventos/vereventos'));

		}
		
		

				
		public function  vereventos(){



		
			$this->load->library("Datalibrary");

			$datahead=$this->datalibrary->buildHead();
			$this->load->view('guest/head',$datahead);

			$this->load->view('guest/header');	


			//ZONA ASIDE IZQ


			$year= date("Y");
			$mes= date("n");
			//$dataizq = $this->Loteriamodelo->getLoteria();

			$prefs = $this->Calendariomodelo->getPrefsCalendar();
			
			$this->load->library('calendar', $prefs); 

			
			$this->calendar_propio =$this->calendar->generate($year, $mes);
			
			$dataizq['calendario_propio'] = $this->calendar_propio;



			//$this->load->view('guest/aside_izquierdo',$dataizq);

			//ZONA EVENTOS


			 	//PAGINADOR

			$configPaginador=$this->datalibrary->configurarPaginador();
			$this->pagination->initialize($configPaginador);
			$resultado= $this->eventosmodelo->getPagination($configPaginador['per_page']); 

			$datosPaginador = array('consulta' =>$resultado,
							'paginacion' => $this->pagination->create_links() );

			
				//FIN PAGINADOR

			$consultaEventos = $this->Eventosmodelo->getTablaEventos();
			$dataJSONGoogleMaps= array();
			$dataJSONGoogleMaps=$this->Eventosmodelo->getGoogleMapsResult($consultaEventos);

			//d($dataJSONGoogleMaps);
			//array(2) { [0]=> array(3) { [0]=> float(43.466874) [1]=> float(-5.44394) [2]=> string(48) "San Juan, 41 - Amandi, 33311 Villaviciosa, Spain" } [1]=> array(3) { [0]=> float(43.3826357) [1]=> float(-5.314008) [2]=> string(31) "33583 Vallobal, Asturias, Spain" } }


			

			$datosEventos = array( 'dataJSONGoogleMaps'=> $dataJSONGoogleMaps,
								   'datosPaginador'=>$datosPaginador);
			
						
			$this->load->view('guest/eventoscofradia',$datosEventos);



			//$this->load->view('guest/aside_derecho');

			//Contacto
			$datafooter=$this->datalibrary->buildFooter();		
			$this->load->view('guest/footer',$datafooter);
			

		}

	}

?>