<?php 
?>




	<div class="span9">
		<h2>Mensajes Recibidos a través de Contactos</h2>
		<div class="table-responsive">	
		<table class='table table-bordered table-condensed centrado'>
			<thead>
				<tr>				
					<th><p class='rotulo_campo centrado'> Consulta Realizada</p></th>
					<th><p class='rotulo_campo centrado'> Email</p></th>				
					<th><p class='rotulo_campo centrado'> Nombre</p></th>			
					
					<th><p class='rotulo_campo centrado'> Asunto</p></th>				
					<th><p class='rotulo_campo centrado'> Comentarios</p></th>
					
					<th></th>
				</tr>
	     	</thead>

	     	<tbody>
	     	<?php
	     	foreach ($datosTablaContactos as $key => $value) {

	     		

	     		$consultaYear= substr($value['idConsulta'],0,4); 
				$consultaMonth= substr($value['idConsulta'],5,2);
				$consultaDay= substr($value['idConsulta'],8,2);
				$consultaTime=substr($value['idConsulta'],11);

	     		$email = $value['email']; 
	     		$nombre = $value['nombre'];
	     		$asunto = $value['asunto'];
	     		$comentarios = $value['comentarios'];
	     	?>

				<tr>
					<td class='col-md'><?=$consultaDay.'-'.$consultaMonth.'-'.$consultaYear.'<br>'.$consultaTime;?></td> 
					<td class='col-md'><?=$email;?></td> 
					<td class='col-md'><?=$nombre;?></td> 
					<td class='col-md'><?=$asunto;?></td> 
					<td class='col-md'><?=$comentarios;?></td> 

					<td>
						 <a href="<?=base_url();?>adminmenu/VerCofrades&m=<?=$email;?>">Modificar</a> </br>
						 <a href="<?=base_url();?>adminmenu/VerCofrades&e=<?=$email;?>">Eliminar</a> </br>
					</td>								
				</tr>
		
			<?php  
			} // fin foreach
			?>


			</tbody>
		</table>
		</div>

	 </div>
