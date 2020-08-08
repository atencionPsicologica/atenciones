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
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-type" content="text/html; charset=latin1_swedish_ci"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Librerias Boostrap-->

	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		

	<link rel="stylesheet" href="assets/css/fullcalendar.min.css">
	<link rel="stylesheet" href="assets/css/posiciones.css">

	<?php if (!isset($_SESSION['usuario'])){ ?>
		
		<link rel="stylesheet" href="assets/entorno/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/entorno/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/entorno/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/entorno/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/entorno/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/entorno/vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/entorno/assets/css/estilo.css">
    <link rel="stylesheet" href="assets/entorno/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
    <!--===============================================================================================-->
	<?php } ?>


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


<?php if (!isset($_SESSION['usuario'])){ ?>
		
		<link rel="stylesheet" href="assets/entorno/vendors/bootstrap/dist/css/bootstrap.min.css">
		<script src="assets/entorno/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/entorno/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/entorno/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/entorno/assets/js/main.js"></script>
    <script src="assets/entorno/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/entorno/assets/js/dashboard.js"></script>
    <script src="assets/entorno/assets/js/widgets.js"></script>
    <script src="assets/entorno/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="assets/entorno/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="assets/entorno/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="assets/entorno/assets/js/tesoreros.js"></script>
    <script src="assets/entorno/assets/js/Japascript.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/js/main.js"></script>

    <script>
        (function ($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });


            document.querySelector('table').addEventListener('click', function (event) {
                if (event.target.tagName.toLowerCase() === 'td') {
                    var td = event.target;
                    var fila = td.parentNode;
                    fila.classList.toggle("productoSeleccinado");
                }
            });
            document.querySelector('table').addEventListener('dblclick', function (event) {
                if (event.target.tagName.toLowerCase() === 'td') {
                    var td = event.target;
                    editarProducto(td);
                }
            });


        })(jQuery);
    </script>
	<?php } ?>


</body>

</html>