<?php 

?>



<div id="login">
	<?php echo validation_errors(); ?>
   	<?php echo form_open(base_url().'VerificarLogin'); ?>
	     <label for="id_alias">Alias</label>
	     <input type="text" id="id_alias" size="20" name="alias"  placeholder="Tu alias" required />
	     <br/>
	     <label for="id_password">Password:</label>
	     <input type="password" size="20" id="id_password" name="password" placeholder="Tu contraseña" required/>
	     <br/>
	     <input type="submit" value="Login"/>
	    
	<?php echo form_close(); ?>     



</div>


	
	
<p class="text-center"><a class="btn btn-primary" href="<?=base_url();?>"><i class="fa fa-home"></i> Ir a la página principal</a></p>