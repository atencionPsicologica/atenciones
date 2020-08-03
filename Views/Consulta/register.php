<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<div class="container">
	<h1>Información Consulta</h1>
</div>
<div id="exTab1" class="container">
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a class="nav-link active" href="#paciente" data-toggle="tab">Datos Paciente</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#consulta" data-toggle="tab">Consulta</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#receta" data-toggle="tab">Receta</a>
				</li>
			</ul>
		</div>

		<div class="card-body">
			<form action='?controller=consulta&action=save' method='post'>
				<div class="tab-content clearfix">
					<div class="tab-pane active" id="paciente">
						<div class="container">
							<div class="form-group">
								<label for="cedula">Cedula:</label>
								<input type="cedula" class="form-control" id="cedula" name="cedula" readonly="false"
									value="<?php echo $paciente->getCedula(); ?>">
								<div id="prueba"></div>
							</div>
							<div class="form-group">
								<input type="hidden" name="idpaciente" value="<?php echo $paciente->getId();?>">
								<input type="hidden" name="idacompaniante" value="<?php echo $acompaniante->getId();?>">
								<label for="nombres">Nombres:</label>
								<input type="nombres" class="form-control" id="nombres" name="nombres" readonly="false"
									value="<?php echo $paciente->getNombres().' '.$paciente->getApellidos(); ?>">
							</div>
							<div class="form-group">
								<label for="ocupacion">Ocupación:</label>
								<input type="ocupacion" class="form-control" id="ocupacion" name="ocupacion"
									readonly="false" value="<?php echo $paciente->getOcupacion(); ?>">
							</div>
							<div class="form-group">
								<label for="direccion">Dirección:</label>
								<input type="direccion" class="form-control" id="direccion" name="direccion"
									readonly="false" value="<?php echo $paciente->getDireccion(); ?>">
							</div>
						</div>
					</div>

					<div class="tab-pane" id="consulta">
						<div class="container">
							<div class="form-group">
								<label for="fecha">Inicio de la Consulta:</label>
								<input type="datetime-local" class="form-control" id="fecha" name="fecha">
								<label for="fechaf">Final de la Consulta:</label>
								<input type="datetime-local" class="form-control" id="fechaf" name="fechaf">
							</div>
							<div class="form-group">
								<label for="enfactual">Problema actual:</label>
								<textarea class="form-control" rows="4" name="enfactual" required="true"
									placeholder="CRONOLOGIA, LOCALIZACIÓN, CARACTERÍSTICAS, INTENSIDAD, CAUSA APARENTE, FACTORES QUE AGRAVAN O MEJORAN, SÍNTOMAS ASOCIADOS, EVOLUCIÓN, MEDICAMENTOS QUE RECIBE, RESULTADOS DE EXAMENES ANTERIORES, CONDICION ACTUAL."></textarea>
							</div>
							<div class="form-group">
								<label for="diagnostico">Diagnóstico:</label>
								<textarea class="form-control" rows="4" name="diagnostico"
									placeholder="Diagnóstico enfermedad"></textarea>
							</div>
							<div class="form-group">
								<label for="prescripcion">Prescripción:</label>
								<textarea class="form-control" rows="4" name="prescripcion"
									placeholder="Prescripción y medicamentos, dietas etc."></textarea>
							</div>
						</div>
					</div>

					<div class="tab-pane" id="receta">
						<div class="container">
							<div class="form-group">
								<label for="tareas">Tareas:</label>
								<textarea class="form-control" rows="5" name="tareas"
									placeholder="Ingrese las tareas para asignar."></textarea>
							</div>
						</div>
						<div class="container">
							<div class="form-group">
								<label for="indicaciones">Indicaciones:</label>
								<textarea class="form-control" rows="5" name="indicaciones"
									placeholder="Ingrese las indicaciones respectivas."></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-2">
							<button type="submit" class="btn btn-success"> <span
									class="glyphicon glyphicon-save"></span>
								Guardar</button>
						</div>
						<div class="col-sm-2">
							<button type="button" class="btn btn-danger"
								onclick="location.href='?controller=historia&action=show'"><span
									class="glyphicon glyphicon-hand-left"></span> Cancelar</button>
						</div>
					</div>

				</div>
			</form>
		</div>
		<div class="card-footer text-muted">
			MUJ
		</div>
	</div>
</div>
<?php  
//Ejemplo de tabs adaptado de: https://codepen.io/wizly/pen/BlKxo 
?>