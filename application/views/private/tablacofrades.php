




	<div class="span9">
		<h2>Cofrades</h2>		
		<div class="table-responsive">	
		<table class='table table-bordered table-condensed centrado'>
			<thead>
				<tr>
					<th><p class='rotulo_campo centrado'> Fecha de Inscripción</p></th>
									
					<th><p class='rotulo_campo centrado'> Nombre</p></th>
					<th><p class='rotulo_campo centrado'> Apellido 1</p></th>
					<th><p class='rotulo_campo centrado'> Apellido 2</p></th>
					<th><p class='rotulo_campo centrado'> Cumpleaños</p></th>				
					<th><p class='rotulo_campo centrado'> Email</p></th>
					<th><p class='rotulo_campo centrado'> Administrador</p></th>
					<th><p class='rotulo_campo centrado'> IdCofrade</p></th>
					<th></th>
				</tr>
	     	</thead>

	     	<tbody>
	     	<?php
	     	//d($datosTablaCofrades);
	     	foreach ($datosTablaCofrades as $key => $value) {

	     		$idCofrade = $value['idCofrade'];
	     		$email = $value['email']; 
	     		$name = $value['name'];
	     		$surname1 = $value['surname1'];
	     		$surname2 = $value['surname2'];

	     		


	     		$birthdayYear= substr($value['birthday'],0,4); 
				$birthdayMonth= substr($value['birthday'],5,2);
				$birthdayDay= substr($value['birthday'],8,2);

	     		
	     		$inscriptionYear= substr($value['inscription'],0,4); 
				$inscriptionMonth= substr($value['inscription'],5,2);
				$inscriptionDay= substr($value['inscription'],8,2);


	     		$isAdmin = $value['isAdmin'];

	     	
	     		
	     	?>

				<tr>
					<td class='col-md'><?=$inscriptionDay.'-'.$inscriptionMonth.'-'.$inscriptionYear;?></td> 	

								
					<td class='col-md'><?=$name;?></td>
					<td class='col-md'><?=$surname1;?></td>
					<td class='col-md'><?=$surname2;?></td>
					<td class='col-md'><?=$birthdayDay.'-'.$birthdayMonth.'-'.$birthdayYear;?></td>
					
					<td class='col-md'><?=$email;?></td>
					<td class='col-md'><?=$isAdmin ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>';   ?></td> 
					<td class='col-md'><?=$idCofrade;?></td>	
					

					<td>  
						 <a href="<?=base_url();?>AdminMenu?opc=eCofrade&idCofrade=<?=$idCofrade;?>"><span class="glyphicon glyphicon-edit" style="font-size: 30px;"></span></a> <hr>
						 <a href="<?=base_url();?>AdminMenu?opc=dCofrade&idCofrade=<?=$idCofrade;?>"><span class="glyphicon glyphicon-trash" style="font-size: 30px; color:red;"></span></a> </br>
					</td>								
				</tr>
		
			<?php  
			} // fin foreach
			?>


			</tbody>
		</table>
		</div>
	</div>


