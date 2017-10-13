<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	use PHPMailer\PHPMailer\PHPMailer;
	/**
	* 
	*/
	class SuscribirseModelo extends CI_Model
	{
		public $msgAlert;

		function __construct()
		{
		  parent::__construct();          
		  $this->load->library('email');

		}


		public function Suscribirse(){


			$emailaddress=$_REQUEST['boletin'];
			
			$isEValid = $this->isEmailValid($emailaddress);

			if ($isEValid){

				$isEDataBase= $this->isEmailInDataBase($emailaddress);
				
				if ( !isset($isEDataBase->email) ){
					// no esta registrado

					$code = $this->generateCodeDB();
					
					

					$this->sendEmailConfimation($emailaddress,$code);	
					$this->msgAlert= "Una activacion se ha mandado a tu correo";
					return $this->msgAlert;

					//redirect(base_url('Home/index'));

				}
				else{

					// ya se encuentra en el boletin
					$this->msgAlert= "Ya esta registrado en la bd";
					return $this->msgAlert;
				}
			}
			else{
				// no es valido
				$this->msgAlert= "No es valido";
				return $this->msgAlert;
			}
		}
		
		public function getTablaSuscripciones(){			
	
			$this->db->select('*');
			$this->db->from('suscripciones');		
			$query = $this->db->get();			

			return $query->result_array();  
		}

		public function numSuscripciones(){

			// $total = $this->db->get('posttable')->num_rows();   METODO LENTO DE CARA AL SERVIDOR

			$sentencia = "SELECT count(*) AS total FROM suscripciones";
			$total= $this->db->query($sentencia)->row()->total;  // converir fila y total
						
			return intval($total);  // asegurarnos que sea entero

		}

		public function isEmailValid($emailaddress){
			
			$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';



			if (preg_match($pattern, $emailaddress) === 1) {
			  // emailaddress is valid
			    return true;  
			}
			else{
				// emailaddress is not valid
				return 0;  // false no se ve
			}
						
		}


		public function isEmailInDataBase($email){

			$query= $this->db->query("SELECT email FROM suscripciones WHERE email = '$email' ");
			return $row = $query->row();  //Return 1 or null
		}


		public function isEmailCodeInDataBase($email,$code){

			$query= $this->db->query("SELECT email, code FROM suscripciones WHERE email = '$email' AND code='$code' ");
			return $row = $query->row();  //Return 1 or null
		}



		public function SetEmailVerificado($email,$code){
			
			$sql="UPDATE suscripciones SET isConfirmed = '1' WHERE email='$email' AND code='$code' AND isConfirmed='0' ";
			return $this->db->query($sql);
		}


		public function altaEmail($email,$code){
			
			$sql= "INSERT INTO suscripciones (email,isConfirmed,code) VALUES ('$email','0','$code')";
			$this->db->query($sql);
		}

		public function bajaEmail($email){
			
			$sql= "DELETE FROM suscripciones WHERE email='$email'";
			$this->db->query($sql);
		}

		
		public function generateCodeDB(){

			$year= date("Y");
			$month= date("n");
			$day= date("d");
			$hour=date("G");
			$minute=date("i");
			$second=date("s");
			$micro= date("u");

			$code = $micro.$year.$hour.$day.$month.$second.$minute;


			return $code;
		}
		public function sendEmailConfimation($emailaddress,$code){


			//d('INSIDE SEND FUNCTION') ;

			$to=$emailaddress;
			$subject="Activa la Suscripcion de Noticias de la Cofradia Gochu Asturcelta";			
			
			
			
			//$body=htmlentities($body,"ENT_HTML5","UTF-8");	
			
			//$body=wordwrap($body, 70, '\r\n');


			
			/*$headers = "From: <cofpruebas.000webhostapp.com>"  ."\r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html;
						// charset=iso-8859-1\r\n"."Reply-To: <rubensaluda@gmail.com>" . "\r\n" ."X-Mailer: PHP/" . phpversion();*/
			
			//mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set()

			/*For example you can configure C:\xampp\php\php.ini and c:\xampp\sendmail\sendmail.ini for gmail to send mail.
			In C:\xampp\php\php.ini find extension=php_openssl.dll and remove the semicolon from the beginning of that line to make SSL working for gmail for localhost.

			in php.ini file find [mail function] and change

			SMTP=smtp.gmail.com
			smtp_port=587
			sendmail_from = my-gmail-id@gmail.com
			sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
			Now Open C:\xampp\sendmail\sendmail.ini. Replace all the existing code in sendmail.ini with following code

			[sendmail]

			smtp_server=smtp.gmail.com
			smtp_port=587
			error_logfile=error.log
			debug_logfile=debug.log
			auth_username=my-gmail-id@gmail.com
			auth_password=my-gmail-password
			force_sender=my-gmail-id@gmail.com
			Now you have done!! create php file with mail function and send mail from localhost.

			PS: don't forgot to replace my-gmail-id and my-gmail-password in above code. Also, don't forget to remove duplicate keys if you copied settings from above. For example comment following line if there is another sendmail_path : sendmail_path="C:\xampp\mailtodisk\mailtodisk.exe" in the php.ini file

			Also remember to restart the server using the XAMMP control panel so the changes take effect.

			For gmail please check https://support.google.com/accounts/answer/6010255 to allow access from less secure apps.

			To send email on Linux (with sendmail package) through Gmail from localhost please check PHP+Ubuntu Send email using gmail form localhost.*/

			//mail($to,$subject,$body,$headers);




 			$this->email->from('Cofraía Amigos Gochu Asturcelta');

    		$dataEmail = array(

       			'code'=> $code,
       			'email'=> $to,

         	);

    		$this->email->to($to); // replace it with receiver mail id

  			$this->email->subject($subject); // replace it with relevant subject

  

    		$body = $this->load->view('guest/emailrespuesta',$dataEmail,TRUE);

  			$this->email->message($body); 

    		//$this->email->send();

			



			send_email($to, $subject, $body);
			$this->altaEmail($emailaddress,$code);




			

		}

	}

 ?>