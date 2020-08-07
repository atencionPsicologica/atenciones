<?php if(!isset($_SESSION)) 
    { 
        session_start();   

    } ?>
<h1>Lista de Pacientes</h1>
<form class="form-inline" action="?controller=paciente&action=buscar" method="post">
	<div class="form-group row">
		<div class="col-xs-4">
			<input class="form-control" id="cedula" name="cedula" type="text" placeholder="1717899322">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-4">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"> </span>
				Buscar</button>
		</div>
	</div>
</form>

<br>


<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
<div class="alert alert-success">
	<strong><?php echo $_SESSION['mensaje']; ?></strong>
</div>
<?php } 
			unset($_SESSION['mensaje']);
		?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Cédula</th>
					<th scope="col">Nombres</th>
					<th scope="col">Apellidos</th>
					<th scope="col">Ocupación</th>
					<th scope="col">Email</th>
					<th scope="col">T.Sangre</th>
					<th scope="col">OpI</th>
					<th scope="col">OpII</th>
					<?php if($_SESSION['usuario_id'] == 1) {  ?>
					<th scope="col">OpIII</th>
					<th scope="col">OpIV</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($lista_pacientes as $paciente)  {?>
				<?php if($_SESSION['usuario_id'] == 1) { ?>
				<tr>
					<td><?php echo $paciente->getCedula(); ?></td>
					<td><?php echo $paciente->getNombres(); ?></td>
					<td><?php echo $paciente->getApellidos();?></td>
					<td><?php echo $paciente->getOcupacion();?></td>
					<td><?php echo $paciente->getEmail();?></td>
					<td><?php echo $paciente->getTposangre();?></td>
					<td> <button type="button" class="btn btn-primary"
							onclick="location.href='?controller=paciente&action=showupdate&id=<?php echo $paciente->getId()?>'"><span
								class="oi oi-pencil"></span> Actualizar</button></td>
					<td><button type="button" class="btn btn-danger"
							onclick="location.href='?controller=paciente&action=delete&id=<?php echo $paciente->getId()?>'"><span
								class=""></span> Eliminar</button></td>
					<td><button type="button" class="btn btn-danger"
							onclick="location.href='?controller=paciente&action=baja&id=<?php echo $paciente->getId()?>'"><span
								class=""></span> Baja </button></td>
					<td><button type="button" class="btn btn-success"
							onclick="location.href='?controller=historia&action=register&id=<?php echo $paciente->getId()?>'"><span
								class=""></span> C/E Historial</button></td>
				</tr>

				<?php } else { ?>

				<tr>
					<td><?php echo $paciente->getCedula(); ?></td>
					<td><?php echo $paciente->getNombres(); ?></td>
					<td><?php echo $paciente->getApellidos();?></td>
					<td><?php echo $paciente->getOcupacion();?></td>
					<td><?php echo $paciente->getEmail();?></td>
					<td><?php echo $paciente->getTposangre();?></td>
					<td> <button type="button" class="btn btn-primary"
							onclick="location.href='?controller=paciente&action=showupdate&id=<?php echo $paciente->getId()?>'"><span
								class="oi oi-pencil"></span> Actualizar</button></td>

					<td><button type="button" class="btn btn-success"
							onclick="location.href='?controller=historia&action=register&id=<?php echo $paciente->getId()?>'"><span
								class=""></span> Crear/Editar H. Clínica</button></td>
				</tr>

				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
		<ul class="pagination">
			<?php for ($i=1;$i<=$botones;$i++){ ?>
			<li><a href="?controller=paciente&action=show&boton=<?php echo $i ?>"><?php echo $i; ?></a></li>
			<?php }?>
		</ul>
	</div>
</div>