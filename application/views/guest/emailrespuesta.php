<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8" />


  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

<div>

 	<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">Tu código es <?=$code;?></p>

	<a href=<?=base_url();?>Suscribirse?code=<?=$code;?>&email=<?=$email;?>  >Ir al enlace de activación</a>

</div>

</body>

</html>