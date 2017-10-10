<div class="col-sm-3">

	<aside class="container-fluid" >
		
		<h2><span class="label label-default"><i class="fa fa-twitter" style="font-size:20px ; color:#870E3B;"></i>Tweeter de la Cofradia</span></h2>

			<div class="row col-sm-12">			  			
				<div id="contenedor_twitter">	

					<a class="twitter-timeline" data-lang="es-ES" data-width="420" data-height="500" data-theme="dark" data-link-color="#E95F28" href="https://twitter.com/cofgochuastur">Tweets por cofgochuastur</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>				
				</div>	   
			</div>
		
		
			<div class="row col-sm-12">		

				<?php 
				$attributes = array('class' => 'signUpNewsletter centrado');
				echo form_open(current_url(), $attributes);


				

				
				$dataLabel= array('class'=>'centrado blanco');

				echo form_label('Suscribete a Nuestras Noticias', 'emailsuscribirse',$dataLabel);        
				$emailData=array(
								'id'=>'emailsuscribirse',
								'class'=> 'centrado blanco morado',
								'name'=>'boletin', //you are missing this attribute
								'value'=>set_value('boletin'),

								'required'=>'required',																
								'placeholder'=>'Tu@email.com',
								);
				echo form_input($emailData);				

				$dataButton = array(
				        'name'          => 'suscribirBoletin',
				        'class'         =>'boton',
				        'id'            => 'buttonEnviar',        
				        'type'          => 'submit',				        
				        'content'       => 'Suscribirse'
						);
				         
				echo "<div>";
				echo form_button($dataButton);
				echo "</div>";

				
				echo form_close();

				echo '<div id=idmsgSuscripcion>'.$msgSuscripcion.'</div>';


				?>			
				
	         
	            
	          

	           
		   	</div>	  
		
	</aside>

</div>

</main>

</div>
</div>		

