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
				$('#exampleModal').modal();
			}


		});
	});

</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>