
<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Si intentas acceder a los directorios propios del CodeIgniter desde el explorador te devolvera ese mensaje de error.
*/
class VerificarLogin extends CI_Controller
{
	function __construct()
	 {
	   parent::__construct();
	   $this->load->model('CofradesModelo');
	   
	 }
 
	 function index()
	 {
	   //This method will have the credentials validation	   
	 
	   $this->form_validation->set_rules('alias', 'Alias', 'trim|required');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_CheckDatabase');
	 
	   if($this->form_validation->run() == false)
	   {
	   	 
	   		$this->load->library("Datalibrary"); //Cargamos la libreria			
			$datahead=$this->datalibrary->buildHead();
			$datafooter=$this->datalibrary->buildFooter();

			$this->load->view('guest/head',$datahead);	

	     	$this->load->view('private/logginsession');
	     	$this->load->view('guest/footer',$datafooter);
	   }
	   else
	   {
	     //Go to private area
	   
	     redirect( base_url().'AdminMenu','refresh');

	   }
	 
	 }
	 //CALLBACK FORM VALIDATION
	 function CheckDatabase($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $alias = $this->input->post('alias');
	   $password = $this->input->post('password');
	 
	   //query the database
	   $result= $this->CofradesModelo->login($alias,$password);

	   if($result)
	   {
	   		
	   		
	     	$email =$this->CofradesModelo->getemail($alias,$password);
	     	
	        $this->session->set_userdata('sessionAdminCofradia', $email);
	     
	     return true;
	   }
	   else
	   {
	     $this->form_validation->set_message('CheckDatabase', 'Alias y/o psw no valida');
	     return false;
	   }
	 }
}
?>