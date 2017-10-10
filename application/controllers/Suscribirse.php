

<?php 
	

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
	*/


	class Suscribirse extends CI_Controller
	{

		
		
		public function  index(){

			

			$this->load->library("Datalibrary");

			$datahead=$this->datalibrary->buildHead();

			$datafooter=$this->datalibrary->buildFooter();


			$this->load->view('guest/head',$datahead);

			$this->load->view('guest/header');						
						
			$code= $_REQUEST['code'];
			$email= $_REQUEST['email'];

			
			$condition= $this->SuscribirseModelo->isEmailCodeInDataBase($email,$code);
			

			if ($condition){
				$this->SuscribirseModelo->SetEmailVerificado($email,$code);

				$dataAlta['msgAlta']="Hemos activado tu solicitud!";
				$dataAlta['msgAlta2']="Solamente decir: Bienvenido!. Te mantendremos informado de las próximas Noticias y Eventos de la cofradía";
				$this->load->view('guest/mensajeemailconfirmado',$dataAlta);
			}
			else{				

				$dataAlta['msgAlta']="Ha habido un problema!";
				$dataAlta['msgAlta2']="Ponte en contacto con nosotros";
				$this->load->view('guest/mensajeemailconfirmado',$dataAlta);
			}

			

					
			$this->load->view('guest/footer',$datafooter);
			

		}


		public function  DarseBajaSistema(){

			$this->load->library("Datalibrary");

			$datahead=$this->datalibrary->buildHead();

			$datafooter=$this->datalibrary->buildFooter();


			$this->load->view('guest/head',$datahead);

			$this->load->view('guest/header');		

			$email= $_REQUEST['email'];

			
			
			if ($this->SuscribirseModelo->bajaEmail($email)){


				$dataBaja['msgBaja']="Sentimos que no quieras seguir recibiendo noticias!";
				$this->load->view('guest/mensajeemaildadobaja',$dataBaja);
			}
			else{
				$dataBaja['msgBaja']= "No hemos podido darte de baja! Ponte en contacto con nosotros";
				$this->load->view('guest/mensajeemaildadobaja',$dataBaja);
			}

			$this->load->view('guest/footer',$datafooter);
		}

	}

?>