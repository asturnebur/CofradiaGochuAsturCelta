<?php 
	

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
	*/


	class Aviso_legal extends CI_Controller
	{

		
		
		public function  index(){

			

			$this->load->library("Datalibrary");

			$datahead=$this->datalibrary->buildHead();

			$datafooter=$this->datalibrary->buildFooter();


			$this->load->view('guest/head',$datahead);

			$this->load->view('guest/header');						
						
			$this->load->view('guest/avisolegal');

			
			

					
			$this->load->view('guest/footer',$datafooter);
			

		}

	}

?>