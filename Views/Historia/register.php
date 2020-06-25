<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<div class="container">
	<h1>Información de Historial del acompañado</h1>
</div>
<div id="exTab1" class="container">	
	<ul  class="nav nav-pills">
		<li class="active">
       		<a  href="#historia" data-toggle="tab">Historial</a>
		</li>
		<li>
			<a href="#familiares" data-toggle="tab">Antecedentes Familiares</a>
		</li>
		<li>
			<a href="#personales" data-toggle="tab">Antecedentes Personales</a>
		</li>
		
	</ul>


	<form action='?controller=historia&action=save' method='post'>
	<div class="tab-content clearfix">
		<div class="tab-pane active" id="historia">
			<div class="container">	
				<div class="form-group">
			  		<label for="fecha">Fecha Registro:</label>
				    <input type="fecha" class="form-control" id="fecha" name="fecha" required="true" readonly="false" value="<?php echo date('Y-m-d'); ?>">
				</div>			 
			  	<div class="form-group">
			  		<label for="numero">Número:</label>
				    <input type="numero" class="form-control" id="numero" name="numero" required="true" readonly="false" value="<?php echo $numeroHistoria;?>">
				</div>
				<div class="form-group">
					<label for="nombres">Nombres Paciente:</label>
					<input type="hidden" name="paciente" value="<?php echo $paciente->getId();?>">
				    <input type="nombres" class="form-control" id="nombres" name="nombres" required="true" value="<?php echo $paciente->getNombres().' '.$paciente->getApellidos(); ?>" readonly="false">
				</div>
			</div>
		</div>
		<div class="tab-pane" id="familiares">	
		    
		    <div class="form-group">
				<label for="descripcion">Descripción:</label>
				<textarea class="form-control" rows="4" name="descripcionfami" placeholder="Ingrese alguna información adicional"></textarea>
			</div>
		</div>
		<div class="tab-pane" id="personales">
		    
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="vsexualactiva">Vida Sexual:</label>
					<input type="vsexualactiva" class="form-control" id="vsexualactiva" name="vsexualactiva"  placeholder="Ingrese SI o NO tiene vida sexual" autocomplete="off">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="gesta">Embarazos:</label>
					<input type="number" class="form-control" id="embarazo" name="embarazo" value="0" placeholder="Número de embarazos" autocomplete="off">		    	
		    	</div>				
			</div>
			
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="abortos">Abortos:</label>
					<input type="number" class="form-control" id="abortos" name="abortos" value="0" placeholder="Número de abortos" autocomplete="off">		    	
		    	</div>				
			</div>

			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="abusoPsico">Abusos psicológico:</label>
					<input type="number" class="form-control" id="abusoPsico" name="abusoPsico" value="0"  autocomplete="off">		    	
		    	</div>				
			</div>

			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="abusoFis">Abusos físicos:</label>
					<input type="number" class="form-control" id="abusoFis" name="abusoFis" value="0" autocomplete="off">		    	
		    	</div>				
			</div>

			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="abandono">Abandono:</label>
					<input type="number" class="form-control" id="abandono" name="abandono" value="0"  autocomplete="off">		    	
		    	</div>				
			</div>

			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="vicio">Vicios:</label>
					<input type="number" class="form-control" id="vicio" name="vicio" value="0"  autocomplete="off">		    	
		    	</div>				
			</div>
			
			<div class="form-group col-sm-8">
				<label for="descripcion">Descripción:</label>
				<textarea class="form-control"   name="descripcionper" placeholder="Ingrese alguna información adicional" autocomplete="off"></textarea>
			</div>
		</div>
    
		<div class="row">
			<div class="col-sm-2">
				<button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-save"></span> Guardar</button>
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-danger" onclick="location.href='?controller=paciente&action=show'"><span class="glyphicon glyphicon-hand-left"></span> Cancelar</button>
			</div>			
		</div>
		
	</div>	
	</form>	
</div>
<?php  
//Ejemplo de tabs adaptado de: https://codepen.io/wizly/pen/BlKxo 
?>

<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<script>
//ejemplo datepiker en bootstrap tomado de:
//http://formvalidation.io/examples/bootstrap-datepicker/

$(document).ready(function() {
    $('#datePicker1')
        .datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true            
        })
        
    $('#datePicker2')
        .datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true            
        })
});

/*Basic example
Embedding a date picker
Setting date in a range
Auto closing the date picker
Tweets by @formvalidation
Download Report bug

© 2013 - 2016 Nguyen Huu Phuoc. All rights reserved.*/
</script>



