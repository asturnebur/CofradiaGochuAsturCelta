<?php 
			 echo  form_open(base_url().'AddCofrade');


			 echo "<div>";
				  //INSCRIPCION
			    echo "<div>";
			    echo "<label for='tinscripcionCofradia'> <i class='fa fa-calendar' aria-hidden='true'></i> Inscripción: ";
			   	echo "<input type='date' id='tinscripcionCofradia' name='inscriptionCofradia' ></label>";
			   	echo "</div>";
			 	
			 echo "</div>";

			
			echo "<div>";

			    //NOMBRE
				echo form_error('tnombreCofrade' ,'<div class="errores">', '</div>');
				echo form_label('<span class="glyphicon glyphicon-user"></span>' , 'tnombreCofrade');
				$cofradenameData=array(
									'id'=>'tnombreCofrade',
									'name'=>'nombreCofrade', 
									'value'=>set_value('nombreCofrade'),								
									'placeholder'=>'El nombre',
									);

			    echo form_input($cofradenameData);


			     //APELLIDO 1

			    echo form_error('tapellido1' ,'<div class="errores">', '</div>');
				echo form_label('', 'tapellido1');
				$cofradesurname1Data=array(
									'id'=>'tapellido1',
									'name'=>'apellido1Cofrade', 
									'value'=>set_value('apellido1Cofrade'),								
									'placeholder'=>'1er Apellido',
									);

			    echo form_input($cofradesurname1Data);

			    //APELLIDO 2

			    echo form_error('tapellido2' ,'<div class="errores">', '</div>');
				echo form_label('', 'tapellido2');
				$cofradesurname2Data=array(
									'id'=>'tapellido2',
									'name'=>'apellido2Cofrade', 
									'value'=>set_value('apellido2Cofrade'),								
									'placeholder'=>'2º Apellido',
									);

			    echo form_input($cofradesurname2Data);

		    echo "</div>";


		    //BITHDAY
		    echo "<div>";
		    echo "<label for='tbirthdayCofradia'> <i class='fa fa-birthday-cake' aria-hidden='true'></i>";
		   	echo "<input type='date' id='tbirthdayCofradia' name='birthdayCofradia' ></label>";
		   	echo "</div>";

		    //EMAIL
		    echo form_error('temail' ,'<div class="errores">', '</div>');
	        echo form_label('<span class="glyphicon glyphicon-envelope"></span>', 'temail');
	        $emailData=array(
					'id'=>'temail',
					'name'=>'emailCofrade', //you are missing this attribute
					'value'=>set_value('emailCofrade'),					
					'placeholder'=>'El email',
					);
	        echo form_input($emailData);



	        //BUTTON
	        $dataButton = array(
				        'name'          => 'AddCofrade',
				        'id'            => 'buttonAddCofrade',        
				        'type'          => 'submit',
				        'class'		    => 'btn btn-primary',		        
				        'content'       => 'Añadir'
						);
				         

			echo form_button($dataButton);


	        echo form_close();



		?>