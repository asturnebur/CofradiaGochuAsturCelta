<main class="row">
<div class="col-sm-3">	
	<aside class="container-fluid" >
		
		
		<h2><span class="label label-default">Nº Loteria Navidad <?=$year;?> </span> </h2> 

		<div class='numloteria centrado  col-xs-5'><?=$numLoteria;?></div> 

		<div class="row">  		

			<div  class="col-sm">		

				
				
				<div id="compartirLoteria" 	class="centrado" >
				
					
					<?php 
					if ($fotoLoteria !=""){
					?>
					<figure class="container-fluid">
						<div class="contenedor-compartelo">
							<a data-toggle="collapse" data-target="#share-redes-sociales"><i class="fa fa-share-alt" style="font-size:24px;cursor: pointer; color:#870E3B;"></i></a>
							<span id="tipcompartelo"><strong>Compartelo!</strong></span>
						</div> 
						<div class="row">
					
							<div class="col-xs-10"><img class="img-responsive" src='<?=$srcfotoLoteria;?>' alt='Boleto Sorteo Navidad <?=$year;?> Gochu Asturcelta'></div>

							<div id="share-redes-sociales" class="collapse col-xs-2">
						  	
							    
							   		<div class="row">
								    	<!-- WATSHAP -->
								    <a href='whatsapp://send?text=<?=$msgLoteria;?>' data-action='share/whatsapp/share' target="_blank"><i style="font-size:24px; color:#870E3B;" class="fa fa-whatsapp"></i></a></div><br>
								    
								    <div class="row">
								    <!-- TELEGRAM -->
								    <a href='https://t.me/share/url?url=<?=$msgLoteria;?>' data-action='share/telegram/share' target="_blank" ><i style="font-size:24px; color:#870E3B;" class="fa fa-telegram"></i></a></div><br>  
								    
									<div class="row">
								    <!-- TWITTER -->
								    <a href="https://twitter.com/share?url=''&hashtags=LoteriaNavidad<?=$year;?>GochuAsturcelta&text=<?=$msgLoteria;?>" target="_blank"><i style="font-size:24px; color:#870E3B;" class="fa fa-twitter"></i></a></div><br>
							    
							    	<div class="row">
							    	<!--FACEBOOK -->
							    	<a href="https://www.facebook.com/sharer/sharer.php?d='<?=$msgLoteria;?>' " target="_blank" ><i class="fa fa-facebook-official" style="font-size:24px; color:#870E3B;"></i></a>
							    	
							    	</div>
							    	
			
								
						 	</div>
							

							
						    	
						</div>
						
					</figure>
					<?php 
						}else{
							
						} 
					?>
				</div>
								
			</div>
			   
		</div>

		
		<?php $this->view('guest/calendario'); ?>

		
		
	</aside>


 </div>  