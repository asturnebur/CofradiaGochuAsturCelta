<?php 
	

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
	*/

	// Se ha modificado la sentencia config/routes/ en $route['404_override'] = 'my404';

	class My404 extends CI_Controller
	{

		
		
		public function  index(){

			

			$this->output->set_status_header('404'); 

			$this->load->library("Datalibrary"); //Cargamos la libreria

			
			$datahead=$this->datalibrary->buildHead();
			$this->load->view('guest/head',$datahead);

    		$this->load->view('error404');//loading in custom error view


			$datafooter=$this->datalibrary->buildFooter();
    		$this->load->view('guest/footer',$datafooter);
			

		}

	}

?>