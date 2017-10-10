




	<div class="span9">
		<h2>Eventos</h2>


	<div class="table-responsive">		
	<table class='table table-bordered table-condensed centrado' id="tablaEventos">
		<thead>
			<tr>
												
				<th><p class='rotulo_campo centrado'> Nombre Evento</p></th>
				<th><p class='rotulo_campo centrado'> Comentarios</p></th>
				<th><p class='rotulo_campo centrado'> Lugar</p></th>
				<th><p class='rotulo_campo centrado'> Provincia</p></th>				
				<th><p class='rotulo_campo centrado'> Calle</p></th>
				<th><p class='rotulo_campo centrado'> Fecha Inicio</p></th>
				<th><p class='rotulo_campo centrado'> Fecha Final</p></th>
				<th><p class='rotulo_campo centrado'> Foto</p></th>
				<th><p class='rotulo_campo centrado'> IdEventoCofradia</p></th>
				<th></th>
			</tr>
     	</thead>

     	<tbody>
     	<?php
     	
     	foreach ($datosTablaEventos as $key => $value) {

     		

     		$nombreEvento = $value['nombreEvento']; 
     		$comentariosEvento = $value['comentariosEvento'];
     		$lugarEvento = $value['lugarEvento'];
     		$provinciaEvento = $value['provinciaEvento'];
     		$calleEvento = $value['calleEvento'];

     		


     		$inicioEventoYear= substr($value['fechaInicioEvento'],0,4); 
			$inicioEventoMonth= substr($value['fechaInicioEvento'],5,2);
			$inicioEventoDay= substr($value['fechaInicioEvento'],8,2);

			$inicioEventoHour= substr($value['fechaInicioEvento'],11,2);
			$inicioEventoMinute= substr($value['fechaInicioEvento'],14,2);
			$inicioEventoSecond= substr($value['fechaInicioEvento'],17,2);



			$finalEventoYear= substr($value['fechaFinalEvento'],0,4); 
			$finalEventoMonth= substr($value['fechaFinalEvento'],5,2);
			$finalEventoDay= substr($value['fechaFinalEvento'],8,2);

			$finalEventoHour= substr($value['fechaFinalEvento'],11,2); 
			$finalEventoMinute= substr($value['fechaFinalEvento'],14,2);
			$finalEventoSecond= substr($value['fechaFinalEvento'],17,2);


			$fotoEvento = $value['fotoEvento'];


			if ($fotoEvento !=''){  
				$imgsrcEvento=base_url().'plantilla/img/imgEventos/'.$fotoEvento;
			}
			else{
				$imgsrcEvento = 'http://via.placeholder.com/100';
			}


			


			$idEventoCofradia = $value['idEventoCofradia'];

     		
     	?>

			<tr>			

							
				<td class='col-md'><?=$nombreEvento;?></td>
				<td class='col-md'><?=$comentariosEvento;?></td>
				<td class='col-md'><?=$lugarEvento;?></td>
				<td class='col-md'><?=$provinciaEvento;?></td>
				<td class='col-md'><?=$calleEvento;?></td>

				<td class='col-md'><?=$inicioEventoDay.'-'.$inicioEventoMonth.'-'.$inicioEventoYear.'<br>'.
									 $inicioEventoHour.':'.$inicioEventoMinute.':'.$inicioEventoSecond;?></td>

				<td class='col-md'><?=$finalEventoDay.'-'.$finalEventoMonth.'-'.$finalEventoYear.'<br>'.
									 $finalEventoHour.':'.$finalEventoMinute.':'.$finalEventoSecond;?></td>
				
			
				<td class='col-md'><img src="<?=$imgsrcEvento;?>" width="100px" height="100px" alt="<?=$imgsrcEvento;?>" /></td>


				<td class='col-md'><?=$idEventoCofradia;?></td>	
				

				<td>
					 <a href="<?=base_url();?>adminmenu/VerCofrades&m=<?=$idEventoCofradia;?>"><span class="glyphicon glyphicon-edit"></span></a> </br>
					 <a href="<?=base_url();?>adminmenu/VerCofrades&e=<?=$idEventoCofradia;?>"><span class="glyphicon glyphicon-trash"></span></a> </br>
				</td>								
			</tr>
	
		<?php  
		} // fin foreach
		?>


		</tbody>
	</table>
	</div>
	</div>
