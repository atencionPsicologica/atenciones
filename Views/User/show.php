<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<h1>Lista de acompañantes</h1>
<br>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Alias</th>
					<th>Nombres</th>
					<th>Email</th>
					<th>OPI</th>
					<th>OPII</th>
				</tr>
			</thead>
			<tbody>	
			<?php foreach ($lista_usuarios as $usuario)  {?>		
				<tr>
					<td><?php echo $usuario->getAlias(); ?></td>
					<td><?php echo $usuario->getNombres();?></td>
					<td><?php echo $usuario->getEmail();?></td>
					<td> <button type="button" class="btn btn-primary" onclick="location.href='?controller=usuario&action=showregister&id=<?php echo $usuario->getId()?>'">Actualizar</button></td>
				<td><button type="button" class="btn btn-danger" onclick="location.href='?controller=acompaniante&action=delete&id=<?php echo $usuario->getId()?>'">Eliminar</button></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<ul class="pagination">
			<?php for ($i=1;$i<=$botones;$i++){ ?>
			<li><a href="?controller=usuario&action=show&boton=<?php echo $i ?>"><?php echo $i; ?></a></li>
			<?php }?>
		</ul>
	</div>
</div>