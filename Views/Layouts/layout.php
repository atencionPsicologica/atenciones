<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<!DOCTYPE html>
<html lang="es">
<head>

	<title> Acompañantes</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Librerias Boostrap-->

	<!-- Latest compiled and minified CSS -->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Latest compiled JavaScript -->
	<script src="assets/js/bootstrap.min.js"></script>
	
	<!-- librerias para calendario -->
	<script src="assets/lib/jquery.min.js"  ></script>
	<script src="assets/lib/moment.min.js" >
	</script>
	<script src="assets/js/fullcalendar.min.js" ></script>
	<script src="assets/js/es.js" ></script>
	<link rel="stylesheet" href="assets/css/fullcalendar.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</head>
<body>
<header>
	<?php 
		require_once('cabecera.php');
	?>	
</header>

<section>
	
	<div class="container" name="cuerpo">
		<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
			<div class="alert alert-success">
				<strong><?php echo $_SESSION['mensaje']; ?></strong>
			</div>
		<?php } 
			unset($_SESSION['mensaje']);
		?>
		<?php require_once('routing.php'); ?>
	</div>
</section>

<footer>
	<?php 
		include_once('footer.php');
	?>
</footer>






</body>
</html>