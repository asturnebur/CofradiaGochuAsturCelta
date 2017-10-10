<main class="row">			
	      		
			  		<div class="col-sm-12">	
<div class="container">

	<h2 class="centrado alert alert-info"> Galeria imagenes</h2>
	<div class="row">
		 
		
		<?php 
			foreach ($arrayFotos as $key => $value) {
		?>
			<div class="col-md-4">
		      <div class="thumbnail">
		        <a href="<?=base_url() ?>plantilla/img/<?=$value['carpeta'];?>/<?=$value['nombreFoto'];?>" target="_blank">
		          <img src="<?=base_url() ?>plantilla/img/<?=$value['carpeta'];?>/<?=$value['nombreFoto'];?>" alt='<?=$value['alt'];?>'>
		          <div class="caption">
		            <p><?=$value['alt'];?></p>
		          </div>
		        </a>
		      </div>
	    	</div>
		<?php		
			}
		?>

		
<!-- 		<div class="col-md-4">
	      <div class="thumbnail">
	        <a href="http://fakeimg.pl/350x200/ff0000/000" target="_blank">
	          <img src="http://fakeimg.pl/350x200/ff0000/000">
	          <div class="caption">
	            <p>Imagen Aleatoria</p>
	          </div>
	        </a>
	      </div>
	    </div>


	    <div class="col-md-4">
	      <div class="thumbnail">
	        <a href="http://fakeimg.pl/250x100/ff0000/" target="_blank">
	          <img src="http://fakeimg.pl/250x100/ff0000/">
	          <div class="caption">
	            <p>Imagen Aleatoria 2</p>
	          </div>
	        </a>
	      </div>
	    </div>


		
		<div class="col-md-4">
	      <div class="thumbnail">
	        <a href="http://fakeimg.pl/1000x2500/?text=IMG&font=lobster" target="_blank">
	          <img src="http://fakeimg.pl/1000x2500/?text=IMG&font=lobster">
	          <div class="caption">
	            <p>Imagen Aleatoria 3</p>
	          </div>
	        </a>
	      </div>
	    </div> -->
		

		
		

	    


	</div>
</div>


	</div>
				</main>

				</div>
			</div>		