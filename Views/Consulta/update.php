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
			<form action='?controller=consulta&action=update' method='post'>
				<div class="tab-content clearfix">
					<div class="tab-pane active" id="paciente">
						<div class="container">
							<div class="form-group">
								<label for="cedula">Cedula:</label>
								<input type="cedula" class="form-control" id="cedula" name="cedula" readonly="false"
									value="<?php echo $paciente->getCedula(); ?>">
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
								<input type="hidden" name="idconsulta" value="<?php echo $consulta->getId();?>">
								<label for="fecha">Fecha de Inicio:</label>
								<input type="text" class="form-control" id="fecha" name="fecha" required="true"
									value="<?php echo $consulta->getFecha(); ?>" readonly="true" >
								<label for="fechaf">Fecha Final:</label>
								<input type="text" class="form-control" id="fechaf" name="fechaf" required="true"
									value="<?php echo $consulta->getFechaf(); ?>" readonly="true" >
							</div>
							<div class="form-group">
								<label for="enfactual">Enfermedad o problema actual:</label>
								<textarea class="form-control" rows="4" name="enfactual"
									required="true"><?php echo $consulta->getEnfactual(); ?></textarea>
							</div>
							<div class="form-group">
								<label for="diagnostico">Diagnóstico:</label>
								<textarea class="form-control" rows="4"
									name="diagnostico"> <?php echo $consulta->getDiagnostico(); ?></textarea>
							</div>
							<div class="form-group">
								<label for="prescripcion">Prescripción:</label>
								<textarea class="form-control" rows="4"
									name="prescripcion"><?php echo $consulta->getPrescripcion(); ?></textarea>
							</div>
						</div>
					</div>

					<div class="tab-pane" id="receta">
						<div class="container">
							<div class="form-group">
								<input type="hidden" name="idreceta" value="<?php echo $receta->getId();?>">
								<label for="tareas">Tareas:</label>
								<textarea class="form-control" rows="5"
									name="tareas"><?php echo $receta->getTareas(); ?></textarea>
							</div>
						</div>
						<div class="container">
							<div class="form-group">
								<label for="indicaciones">Indicaciones:</label>
								<textarea class="form-control" rows="5"
									name="indicaciones"><?php echo $receta->getIndicaciones(); ?></textarea>
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
								onclick="location.href='?controller=consulta&action=show'"><span
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