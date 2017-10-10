	
	<?php 
		
		$KEY_GOOGLEMAPS="AIzaSyAGMnGkkd8cKy0QU3sPfwR05cPy9zVz8Uc";
	?>
	
	<main class="row">	
	<section id=contenedor_noticias class="col-sm-12 col-xs-12" >		
		<h2 class="centrado alert alert-info">Eventos</h2>

			<div id=noticias >

				<?php 
                foreach ($datosPaginador['consulta']->result() as $fila) {
                	
           		 ?>
           		 	<article class='evento container-fluid' >

					<div class='row'>	
	
					<h2 class="centrado">  <i class="fa fa-bullhorn" style="font-size:30px;color:#C8A85D"></i> <?=$fila->nombreEvento;?></h2>	

					<div class='col-sm-4 col-sm-offset-2' >	
						

						<div class='row-fluid'>
							<span class="glyphicon glyphicon-pushpin"></span><strong>Comentarios:</strong>
							<p><?=$fila->comentariosEvento;?></p>
						</div>

						<p><strong>Lugar:</strong> <?=$fila->lugarEvento;?></p>
						<p><strong>Provincia:</strong> <?=$fila->provinciaEvento;?></p>
						<p><span class="glyphicon glyphicon-map-marker"></span> <?=$fila->calleEvento;?></p>

						<?php 

							$dInicio= $fila->fechaInicioEvento;
							$dFinal = $fila->fechaFinalEvento;

							$dInicio=date("d-m-Y H:i:s",strtotime($dInicio));
							$dFinal=date("d-m-Y H:i:s",strtotime($dFinal));

						?>
						

						<p><span class="glyphicon glyphicon-time"></span><strong>Inicio:</strong> <?=$dInicio;?></p>
						<p><span class="glyphicon glyphicon-time"></span><strong>Fin:</strong> <?=$dFinal;?></p>
					</div>

				

					<div id='contenedor_mapa' class='col-sm-4' >

						<p><strong><i class="material-icons">streetview</i>Mapa del Lugar</strong></p>

						<?php 	

							if ( is_null ($this->uri->segment(3) ) )   {

								$i= 0;

							}
							else{
								$i=$this->uri->segment(3);
							}

							$busqueda=$dataJSONGoogleMaps[$i][2] ;
						?>

						<iframe src='https://www.google.com/maps/embed/v1/search?key=<?=$KEY_GOOGLEMAPS;?>&q=<?=$busqueda;?>&zoom=15'  height='150' width='250'  style='border:1' allowfullscreen></iframe>					

					</div>
				</div>


				
				
				 <div class='row'>	

					<div class='col-sm-offset-2 col-sm-6 col-sm-offset-3'>

						<?php 
						$nombre_fichero = 'plantilla/img/imgEventos/'.$fila->fotoEvento;

						if (file_exists($nombre_fichero)) {
						?>

							<img height='450' src='<?=base_url();?>plantilla/img/imgEventos/<?=$fila->fotoEvento;?>' alt='<?=$fila->nombreEvento;?>'/>
						<?php 
						}
						?>

						
					</div>
				</div>


			 </article>	

				<?php 
                }
           		?>
				
				 <div id="paginador" class="centrado">		
				 	<?php echo $datosPaginador['paginacion']; ?>
				 </div>							
				
			</div>		
	</section>

	</main>

	</div>	
	</div>	


	