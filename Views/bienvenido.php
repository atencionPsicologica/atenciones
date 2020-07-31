<div class="container">
	<!--div class="alert alert-success">
		<p>Bienvenido acompañante</p>
	</div-->

	<div id="container" >
		<div class="row">
			<div class="col"></div>
			<div class="col-7"> <div id="CalendarioWeb"></div> </div>
			<div class="col"></div>
		</div>
	</div>

</div>

<script>
	$(document).ready(function(){
		$('#CalendarioWeb').fullCalendar({
			header:{
				left: 'today,prev,next',
				center: 'title',
				right: 'month,basicWeek,basicDay,agendaWeek,agendaDay'
			},

			dayClick:function(date, jsEvent, view){
				
			}


		});
	});


</script>