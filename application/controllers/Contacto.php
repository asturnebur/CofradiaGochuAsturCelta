<?php 
	

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
	*/


	class Contacto extends CI_Controller
	{	

		private $cap=array();



		public function __construct() {
       
       		parent::__construct();

       		$this->load->library("Datalibrary");

    		$this->cap = $this->datalibrary->GenerateCaptcha(); // save in  cap


			$this->SaveCaptchaBD();

    	}


		 	
		
		public function  index($msgContactoSugerencia=''){

	

			$cap = $this->getcap();
			

			
			//d($this->cap);

			

			$datahead=$this->datalibrary->buildHead();
			$datafooter=$this->datalibrary->buildFooter();

			
			$this->load->view('guest/head',$datahead);
			$this->load->view('guest/header');	
			$this->load->view('guest/nav');					


			$msgContacto = array (
              'msgContactoSugerencia' =>$msgContactoSugerencia,
          		'captcha' =>$this->getcaptchaImg()  );


						
			$this->load->view('guest/contacto',$msgContacto);
			$this->load->view('guest/tarjeta_contacto',$datafooter);


			if (isset($_REQUEST['suscribirBoletin']))
			{
				$msgSuscripcion=$this->SuscribirseModelo->Suscribirse();
				
			}
			else{
				$msgSuscripcion='';
			}

			$dataMensaje['msgSuscripcion']=$msgSuscripcion;
			$this->load->view('guest/aside_derecho',$dataMensaje);

				
			$this->load->view('guest/footer',$datafooter);
			

		}

		

		/*public function ImgCaptchaRefreshValid($captcha){

			
			  
			
			$cap = $this->getcap();
			d($captcha);
		    d($cap['word']); 

		    if($captcha === $this->cap['word'] ){		

		    	return true; 
		    	
		    }else{
		    	$this->form_validation->set_message("ImgCaptchaRefreshValid", "Introduzca un captcha válido");
		    	return false;
		    	
		    }
		}*/

		public function EmailRegularExp($email){
		    if (preg_match('/^(.+\@.+\..+)$/', $email ) ) 
			  {
			    return true;
			  } 
			  else 
			  {
			  	$this->form_validation->set_message("EmailRegularExp", "Introduzca un email válido");
			    return false;
			  }
		}
		public function ValidUser($nombre)
    	{
	        if ( preg_match('/^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/', $nombre) )//expresion regular no comprobada
	        {
	           
	            
	            return true;
	        }
	        else
	        {
	        	 // Set the error message:	        	
	        	$this->form_validation->set_message('ValidUser', 'Introduzca un Nombre válido');
	            return false;
	        }
    	}
		

		public function EnvioFormulario(){
		    
		   $msgContactoSugerencia= "";
		  	
		  	 
		
		   $configRules= array(
            array(
                'field'   => 'nombre',
                'label'   => 'nombre',
                'rules'   => 'trim|required|min_length[3]|callback_ValidUser' // Note: Notice added callback verifier.
            ),
            array(
                'field'   => 'email',
                'label'   => 'email',
                'rules'   => 'trim|required|callback_EmailRegularExp'
            ),
            array(
                'field'   => 'comentarios',
                'label'   => 'comentarios',
                'rules'   => 'trim|required|min_length[15]'
            ),

            array(
                'field'   => 'asunto',
                'label'   => 'asunto',
                'rules'   => 'trim|required'
            ),

            array(
                'field'   => 'captcha',
                'label'   => 'captcha',
                'rules'   => 'trim|required'
            )
        	);

		   $this->form_validation->set_rules($configRules);

	   	
        
		    if($this->form_validation->run() === true){
		        //Si la validación es correcta, cogemos los datos de la variable POST
		        //y los enviamos al modelo
		        $nombre = $this->input->post('nombre');
		        $email = $this->input->post('email');
		        $asunto = $this->input->post('asunto');
		        $comentarios = $this->input->post('comentarios');



		        $dataContacto = array(
				        'nombre' => $nombre,
				        'email' => $email,
				        'asunto' => $asunto,
				        'comentarios' => $comentarios
				);

				$expiration = time() - 60; // 1min limit
				$this->db->where('captcha_time < ', $expiration)
				        ->delete('captcha');

				// Then see if a captcha exists:
				$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
				$binds = array($_REQUEST['captcha'], $this->input->ip_address(), $expiration);
				//d($binds);
				$query = $this->db->query($sql, $binds);
				$row = $query->row();

				if ($row->count == 0)
				{
				    
					
					$this->index("Introduzca un captcha válido");
				}
				else{
					 $this->ContactoModelo->inserContactoSugerencia($dataContacto);


					$this->load->library("Datalibrary");
					$datahead=$this->datalibrary->buildHead();
					$datafooter=$this->datalibrary->buildFooter();

					$this->load->view('guest/head',$datahead);
					$this->load->view('guest/header');
					$this->load->view('guest/nav');					


		        	$dataAlta['msgContactoConfirmado']="Hemos procesado tu solicitud!";
					$dataAlta['msgContactoConfirmado2']="Gracias por ponerte en contacto con nosotros.";
					$this->load->view('guest/mensajecontactoconfirmado',$dataAlta);

					$this->load->view('guest/footer',$datafooter);
				}


			}

			$this->index();

		 	
        
    	
		}


		private function SaveCaptchaBD(){

			$data = array(
			        'captcha_time'  => $this->cap['time'],
			        'ip_address'    => $this->input->ip_address(),
			        'word'          => $this->cap['word']
			);

			$query = $this->db->insert_string('captcha', $data);
			$this->db->query($query);

			//fin captcha

		}

		private function getcap(){
			return $this->cap;
		}

		
		private function getcaptchaImg(){

			return $this->cap['image'];
		}

		









	}

?>