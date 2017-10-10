
<div class="row centrado"> 
			<h2><span class="label label-default"> Calendario  Próximos Eventos</span></h2>
			
			<div class="col-xs-offset-2 col-xs ">
			<table class="table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                      <th colspan="7">
                        <span class="btn-group">                            
                        	<em>
								<!--  <a class="btn"><span class="glyphicon">&#xe079;</span></a> -->                        		
                        		<?php echo $calendario_propio->meses[$mes-1]; ?> <?php echo $year; ?>
								<!--<a class="btn"><span class="glyphicon">&#xe080;</span></a>-->
                        	</em>
                        	
                        </span>
                      </th>
                    </tr>
                    <tr>
						<?php foreach($calendario_propio->dias as $key =>  $calendario_propio->weekDay) : ?>
							<th><?php echo  $calendario_propio->weekDay; ?></th>
						<?php endforeach ?>	
                    </tr>
                </thead>

                 <tbody>

                	<tr>
						<?php for($i = 0; $i < $calendario_propio->blank; $i++): ?>
							<td></td>
						<?php endfor; ?>


						<?php for($i = 1; $i <=  $calendario_propio->getdaysInMonth(); $i++): ?>
							<?php if( $calendario_propio->getDay() == $i): ?>
								<td><mark><?php echo $i; ?></mark></td>

								

								
							<?php else: ?>
								<td><?php echo $i; ?></td>
							<?php endif; ?>
							
							<?php if(($i + $calendario_propio->blank) % 7 == 0): ?>
								</tr><tr>
							<?php endif; ?>
						<?php endfor; ?>


						<?php for($i = 0; ($i + $calendario_propio->blank +  $calendario_propio->getdaysInMonth()) % 7 != 0; $i++): ?>
							<td></td>
						<?php endfor; ?>
					</tr>
                </tbody>


	            <tfoot>
					  <tr>
					  	<td colspan="7"><button type="button" class="btn btn-primary" onclick="window.location.href='<?=base_url() ?>eventos'">Eventos: <span class="badge"><?=count($futurosEventos)?></span></button></td>
					  		 <?php 

					  		 	
					  					
			  					foreach ($futurosEventos as $key => $value) {
			  						//2017-11-03 00:00:00
			  						$yearAux= substr($value['fechaInicioEvento'],0,4); 
			  						$monthAux= substr($value['fechaInicioEvento'],5,2);
			  						$dayAux= substr($value['fechaInicioEvento'],8,2);

			  						$hourAux= substr($value['fechaInicioEvento'],11,2); 
			  						$minuteAux= substr($value['fechaInicioEvento'],14,2); 
			  						$secondAux= substr($value['fechaInicioEvento'],17,2); 



			  						echo "<tr><th colspan='7'>";
			  								echo"<i class='fa fa-bullhorn' style='font-size:20px;color:#C8A85D'></i><strong style='color:red;'>".$value['nombreEvento']."</strong></th></tr>";

			  						echo "<tr><td colspan='7'><span class='glyphicon glyphicon-time'></span>"." ".$hourAux."-".$minuteAux."-".$secondAux."</td></tr>";

			  						 echo "<tr><td colspan='7'><span class='glyphicon glyphicon-calendar'></span> ".$dayAux.'-'.$monthAux.'-'.$yearAux."</td></tr>";
			  							

			  						echo "<tr><td colspan='7'><span class='glyphicon glyphicon-map-marker'></span>".$value['lugarEvento']."</td></tr>";    
  
   								}
					  		?>
				</tfoot>
	            </table>
			</div>
		</div> 