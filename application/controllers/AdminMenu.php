<?php 
	
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
	*/
	class AdminMenu extends CI_Controller
	{
		
		public function  index(){

			

			if ($this->session->userdata('sessionAdminCofradia')){

				$this->load->library("Datalibrary"); //Cargamos la libreria
			
				$datahead=$this->datalibrary->buildHead();
				$this->load->view('guest/head',$datahead);	

				$datosTabla['numSuscripciones']=$this->SuscribirseModelo->numSuscripciones();
				$datosTabla['numCofrades']=$this->CofradesModelo->numCofrades();
				$datosTabla['numMsgContactos']=$this->ContactoModelo->numMsgContactos();
				$datosTabla['numEventos']=$this->Eventosmodelo->numEventos();			
			
				$this->load->view('private/adminmenu',$datosTabla);


				$opc="";
				if(isset($_REQUEST['opc'])){
					$opc=$_REQUEST['opc'];
				}
				
				
				switch ($opc) {
					case 'miembros':
						$this->vercofrades();
						break;
					case 'eventos':
						$this->vereventos();
						break;
					case 'fotos':
						$this->verfotos();
						break;
					
					case 'msgcontactos':
						$this->vermensajescontactos();
						break;
					
					case 'suscripciones':
						$this->versuscripciones();
						break;

					case 'configuracion':
						$this->verconfiguracion();
						break;

					case 'cerrarsesion':
						$this->cerrarsesion();
						break;




					//suscripcion

					case 'deleteS':
						$this->eliminarsuscripcion();
						redirect(current_url().'?opc=suscripciones','refresh');
						break;

					case 'modifyS':
						
						break;
					//cofrades

					case 'eCofrade':
						$this->editcofrade();
						redirect(current_url().'?opc=miembros','refresh');
						break;

					case 'dCofrade':
						$this->deletecofrade();
						redirect(current_url().'?opc=miembros','refresh');
						break;

					//eventos
					case 'eEvento':
						$this->editevento();
						redirect(current_url().'?opc=eventos','refresh');
						break;

					case 'dEvento':
						$this->deleteevento();
						redirect(current_url().'?opc=eventos','refresh');
						break;


					//contacto

					case 'dMsgContacto':
						$this->deletemsgcontacto();
						redirect(current_url().'?opc=msgcontactos','refresh');
						break;

					
					default:
						# code...
						break;
				}
				
			}
			else{
				redirect(base_url().'AdminSession','location','303');
			}


		}

		private function versuscripciones(){

			

			$datosTabla['datosTablaSuscripcion']=$this->SuscribirseModelo->getTablaSuscripciones();
			$this->load->view('private/tablasuscripciones',$datosTabla);
		}

		private function eliminarsuscripcion(){
			$email=$_REQUEST['email'];
			$this->SuscribirseModelo->bajaEmail($email);			
		}

		private function vercofrades(){			

			$datosTabla['datosTablaCofrades']=$this->CofradesModelo->getTablaCofrades();
			$this->load->view('private/tablacofrades',$datosTabla);
		}


		private function vermensajescontactos(){


			$datosTabla['datosTablaContactos']=$this->ContactoModelo->getTablaContactos();
			$this->load->view('private/tablacontactos',$datosTabla);

			
		}


		private function vereventos(){


			$datosTabla['datosTablaEventos']=$this->Eventosmodelo->getEventosTabla();
			$this->load->view('private/tablaeventos',$datosTabla);	

		}


		private function verfotos(){

			$this->load->helper('directory');
			

			//$map = directory_map(base_url().'plantilla/img/');
			$map['mapImg'] = directory_map('./plantilla/img/');

			$this->load->view('private/tablafotos',$map);	
		}




		private function verconfiguracion(){

			$this->load->view('private/tareaspendientes');				
		}

		private function addcofrade(){
			

		}
		private function editcofrade(){

			$idCofrade=$_REQUEST['idCofrade'];
			//$this->CofradesModelo->editCofrade($idCofrade,$email,$name,$surname1,$surname2,$birthday,$inscription);
				
		}

		private function deletecofrade(){

			$idCofrade=$_REQUEST['idCofrade'];
			$this->CofradesModelo->bajaCofrade($idCofrade);

		}

		private function editevento(){

			$idEventoCofradia=$_REQUEST['idEventoCofradia'];
			$this->Eventosmodelo->editEvento($idEventoCofradia,$nombreEvento,$comentariosEvento,$lugarEvento,$provinciaEvento,$calleEvento,$fechaInicioEvento,$fechaFinalEvento,$fotoEvento);

				
		}

		private function deleteevento(){

			$idEventoCofradia=$_REQUEST['idEventoCofradia'];
			$this->Eventosmodelo->bajaEvento($idEventoCofradia);

		}

		private function deletemsgcontacto(){

			$email=$_REQUEST['email'];
			$this->ContactoModelo->bajaContacto($email);

		}


		private function deletesuscripcion(){

			$email=$_REQUEST['email'];
			$this->SuscribirseModelo->bajaSuscripcion($email);

		}

		



		private function cerrarsession(){

		$this->session->unset_userdata("sessionAdminCofradia");
    	$this->session->sess_destroy();

    	redirect(base_url());
		}

		




	}

?>