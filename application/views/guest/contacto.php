<main>
<section id="contact" class="container col-sm-8 col-xs-12" >


    <div class="row">
        <div class="about_our_company centrado" style="margin-bottom: 20px;">
            <h3 class="centrado alert alert-info">Contactanos rellenando el siguiente formulario</h3>
            
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
			 
            

		<?php

		$formData=array(
							'accept-charset'=>"utf-8"
							);
		
        echo form_open(base_url().'contacto/EnvioFormulario',$formData);

        	echo "<div class='row form-line' >";

		        echo "<div class='col-md-5 col-sm-5 col-xs-12'>";

			        echo "<div class='form-group'>";


			        echo form_error('nombre' ,'<div class="errores">', '</div>');
			        echo form_label('<span class="glyphicon glyphicon-user"></span>', 'nombre');

						$usernameData=array(
							'id'=>'nombre',
							'name'=>'nombre', 
							'value'=>set_value('nombre'),
							'required'=>'required',
							'placeholder'=>'Su nombre',
							);

			        echo form_input($usernameData);
			       	
			       	echo "</div>";

			       	echo "<div class='form-group'>";
				       	echo form_error('email' ,'<div class="errores">', '</div>');
				        echo form_label('<span class="glyphicon glyphicon-envelope"></span>', 'email');
				        $emailData=array(
								'id'=>'email',
								'name'=>'email', //you are missing this attribute
								'value'=>set_value('email'),
								'required'=>'required',
								'placeholder'=>'Su email',
								);
				        echo form_input($emailData);

		        	echo "</div>";

		        	echo "<div class='form-group'>";
		       
				        echo form_label('<span class="glyphicon glyphicon-question-sign"></span>', 'asunto');

				        $asuntoData=array(
								'name'=>'asunto', //you are missing this attribute
								'id'=>'asunto',
														
								);

				        $optionsAsunto = array(				        	
				        'Propuestas'           => 'Propuestas a eventos',
				        'Inscripcion'         => 'Inscripción en la cofradia',        
				        'Entrevistas'         => 'Entrevistas',
				        'Sugerencias'        => 'Sugerencias',
				        'Otros'        => 'Otros',
						);
				        echo form_dropdown($asuntoData,$optionsAsunto); //set_select

		       		echo "</div>";

		       	echo "</div>";


	       		echo "<div class='col-md-7 col-sm-7 col-xs-12'>";


	       			echo form_label('<span class="glyphicon glyphicon-comment"></span>', 'comentarios');

		       		echo "<div class='form-group'>";
	        

				        
				        
				        echo form_error('comentarios') != "" ? '<div class="errores">Detállanos más su mensaje</div>' : ""; 
				        
				        $dataComentarios = array(
				        'name'        => 'comentarios',
				        'id'          => 'comentarios',
				        'class'       =>  'form-control',
				        'rows' => '2',				               
				        'placeholder'=>'Su mensaje'
				       
				    	);
				        echo form_textarea($dataComentarios,set_value('comentarios'));
				    echo "</div>";
				echo "</div>";




				echo "<div class='clearfix'></div>";
	            	echo "<div class='col-lg-12 col-xs-12 text-center'>";




	            	echo "<div>";
	            		echo "<span id='captcha-img' class='captcha-img'>";
		            		echo "<div>";
		            		echo form_error('captcha' ,'<div class="errores">', '</div>');
		            		echo "<p class='errores'>$msgContactoSugerencia</p>";
		            		echo "</div>";
				    	echo $captcha;
				    	echo "</span>";
				   		echo "<button class='btn btn-primary' id='refreshCaptchaContacto'><span class='glyphicon glyphicon-refresh'></span></button>";

				   		echo form_label('', 'idtxtcaptcha');

						$captchData=array(
								'id'=>'idtxtcaptcha',
								'type'=>'text',
								'name'=>'captcha', 
								'value'=>set_value('captcha'),
								'required'=>'required',
								'placeholder'=>'Introduzca captcha',
								);
						echo "<div>";
				        echo form_input($captchData);
				        echo "</div>";
				    	
				    echo "</div>";

				   


				   

				        $dataButton = array(
				        'name'          => 'submitFormulario',
				        'id'            => 'buttonEnviar',        
				        'type'          => 'submit',
				        'class'			=> 'margentop2',				        
				        'content'       => '<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar'
						);
				         
				      
				       echo form_button($dataButton);			        

				        

				    

				     //No borrar la siguiente linea, sirve para mostrar el error de la validacion que no cumple
				    //echo validation_errors();
				   	
					
					echo "</div>";

					


			echo "</div>";
        echo form_close();


    	?>
	</div>

		
        

