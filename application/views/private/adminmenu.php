
<?php

?>




	

  	<div class="well sidebar-nav " style="width:300px; padding: 8px 0;">
		<ul class="nav nav-list"> 
		  <li class="nav-header"><span class="label label-default" style="font-size: 20px;">Panel Administrador</span></li>  

		  <li><a href="<?=base_url();?>"><i class="fa fa-home"></i> Ir a la Página Principal</a></li>

		  <li><a href="<?=base_url();?>AdminMenu/VerCofrades"><i class="fa fa-group"></i> Miembros Actualemente en la cofradía<span class="badge badge-info"><?=$numCofrades;?></span></a></li>

		  <li><a href="<?=base_url();?>AdminMenu/VerEventos"><i class="fa fa-calendar"></i> Nº Eventos<span class="badge badge-info"><?=$numEventos;?></span></a></li> 

		  <li><a href="<?=base_url();?>AdminMenu/VerFotos"><span class="glyphicon glyphicon-picture"></span> Fotos <span class="badge badge-info"><?=0;?></span></a></li>


          <li><a href="<?=base_url();?>AdminMenu/VerMensajesContactos"><i class="fa fa-envelope-o"></i> Mensajes Recibidos de Contactos<span class="badge badge-info"><?=$numMsgContactos;?></span></a></li>    

		  <li><a href="<?=base_url();?>AdminMenu/VerSuscripciones"><i class="fa fa-address-book-o"></i> Gente Suscrita al boletín <span class="badge badge-info"><?=$numSuscripciones;?></span></a></li>

          <li><a href="<?=base_url();?>AdminMenu/Configuracion"><i class="fa fa-cog" ></i> Administrador </a></li>

		  <li><a href="<?=base_url();?>AdminMenu"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
		</ul>
	</div>






 


    


