<?php 
	
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
	*/
	
	class Fotos extends CI_Controller
	{

		public function __construct() {
        
        parent::__construct();
    }
		
		public function  index(){


			$this->load->library("Datalibrary");

			$datahead=$this->datalibrary->buildHead();

			$this->load->view('guest/head',$datahead);			

			$this->load->view('guest/header');	
			$this->load->view('guest/nav');					
	




			//$numFotos=$this->Fotosmodelo->numFotos();

			$arrayFotos['arrayFotos']=$this->Fotosmodelo->getFotos();


						
			$this->load->view('guest/fotoscofradia',$arrayFotos);



			

			$datafooter=$this->datalibrary->buildFooter();		
			$this->load->view('guest/footer',$datafooter);
			

		}

	}

?>