<?php 
?>




	<div class="span9">
		<h2>Gente Suscrita al boletín</h2>
		<div class="table-responsive">	
	<table class='table table-bordered .table-condensed centrado'>
		<thead>
			<tr>
				<th><p class='rotulo_campo centrado'> Email</p></th>
				<th><p class='rotulo_campo centrado'> Esta Confimado?</p></th>
				<th><p class='rotulo_campo centrado'> Codigo</p></th>
				<th></th>
			</tr>
     	</thead>

     	<tbody>
     	<?php
     	foreach ($datosTablaSuscripcion as $key => $value) {

     		$email = $value['email']; 
     		$confirmado=$value['isConfirmed'];
     		$codigo=$value['code'];
     	?>

			<tr> 	
				<td class='col-md-4'><?=$email?></td>
				<td class='col-md-4'><?=$confirmado ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>'?></td>
				<td class='col-md-4'><?=$codigo?></td>	
				<td>
					 <a href="<?=base_url();?>AdminMenu">Modificar</a> </br>
					 <a href="<?=base_url();?>AdminMenu/EliminarSuscripcion?email=<?=$email;?>"><span class="glyphicon glyphicon-trash"></span></a> </br>
				</td>								
			</tr>
	
		<?php  
		} // fin foreach
		?>


		</tbody>
	</table>
	</div>

	 </div>
