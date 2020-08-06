<?php 

	if(!isset($_SESSION)) 
    { 
        session_start(); 
	}	

	require_once('historial.php');
		
?>
<!DOCTYPE html>
<html lang="es">

<head>

	<title> Acompañantes</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Librerias Boostrap-->

	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		

	<link rel="stylesheet" href="assets/css/fullcalendar.min.css">
	<link rel="stylesheet" href="assets/css/posiciones.css">


</head>

<body>
	<header>
		<?php 
		require_once('cabecera.php');
	?>
	</header>
	<br>

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



	<div class="modal fade bd-example-modal-lg " id="lineat" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="titulo"> Línea de tiempo de las consultas </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="timeline">

						<?php $estado = 0; $titulo = null; ?>
						<?php foreach ($lista as $list) { ?>
						<?php if ($estado == 0) { ?>
						<div class="containe left">
							<div class="content">
								<p>Hora de inicio: <?php echo $list['start'];?></p>
								<p>Hora de fin: <?php echo $list['end'];?> </p>
								<p>Acompañado: <?php echo $list['nombre']." ".$list['apellido'];?></p>
								<p>Caso: <?php echo $list['title'];?> </p>
							</div>
						</div>
						<?php $estado = 1;?>
						<?php } elseif ($estado == 1) { ?>
						<div class="containe right">
							<div class="content">
								<p>Hora de inicio: <?php echo $list['start'];?></p>
								<p>Hora de fin: <?php echo $list['end'];?> </p>
								<p> Acompañado:<?php echo $list['nombre']." ".$list['apellido'];?></p>
								<p>Caso:<?php echo $list['title'];?></p>
							</div>
						</div>
						<?php $estado = 0;?>
						<?php } ?>
						<?php  } ?>

					</div>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>

	<script src="assets/lib/jquery.min.js"></script>
	<script src="assets/lib/moment.min.js"></script>
	<script src="assets/js/fullcalendar.min.js"></script>
	<script src="assets/js/es.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function () {

			$('#CalendarioWeb').fullCalendar({
				header: {
					left: 'today,prev,next',
					center: 'title',
					right: 'month,basicWeek,basicDay,agendaWeek,agendaDay'
				},
				/*
				dayClick:function(date, jsEvent, view){
				    $('#exampleModal').modal();
				},
				*/
				events: 'http://localhost/atenciones/consultas.php',
				/*
        eventSources: [{
            events: [
                {
                    //id: '',
                    title:'Consulta #1',
                    diagnostico: "x",
                    prescripcion: "y",
                    enfactual: "z",
                    start:'2020-07-05',
                    end:'2020-07-07',
    
                },
                {
                    //id: '',
                    title:'Consulta #2',
                    diagnostico: "x",
                    prescripcion: "y",
                    enfactual: "z",
                    start:'2020-07-10',
                    end:'2020-07-12',
    
                }
            ],
            color:"blue",
            textColor: "white"
        }],
        */
				eventClick: function (calEvent, jsEvent, view) {
					$('#tituloConsulta').html(calEvent.title);
					$('#diagnosticoConsulta').html(calEvent.diagnostico);
					$('#enfactualConsulta').html(calEvent.enfactual);
					$('#prescripcionConsulta').html(calEvent.prescripcion);
					$('#exampleModal').modal();
				}

			});

			$('#histo').click(function () {
				$('#lineat').modal();
			});
		});
	</script>

</body>

</html>