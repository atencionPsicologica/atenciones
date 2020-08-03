<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    }?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<div class="">			
			<a class="navbar-brand " href="#">
			<span class="glyphicon glyphicon-cloud" aria-hidden="true" ></span>
			Misioneros
			</a>
		</div>
		<div class="collapse navbar-collapse" >
		<ul class="navbar-nav mr-auto">
		<?php if (isset($_SESSION['usuario'])){ ?>		
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Pacientes <span class="caret"></span></a>
					<ul class="dropdown-menu"  >						
						<li><a class="dropdown-item"  href="?controller=paciente&action=register">Registrar</a></li>
						<li><a class="dropdown-item"  href="?controller=paciente&action=show">Ver Pacientes</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Consultas<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="?controller=historia&action=show">Nueva Consulta</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Revisiones<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item"  href="?controller=consulta&action=show">Ver consultas</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?controller=usuario&action=welcome">Agenda<span ></span></a>
				</li>
				
			
		<?php } ?>
			</ul>		
		</div>

		<ul class="navbar-nav mr-auto navbar-right ">
			<?php if (isset($_SESSION['usuario'])){?>
				
				<a class="nav-link">Bienvenido: <?php echo $_SESSION['usuario_alias']; ?></a>
				<li class="nav-item">
					<a class="nav-link" href="?controller=usuario&action=showregister&id=<?php echo $_SESSION['usuario_id'] ?>">
						<span class="glyphicon glyphicon-cog"></span>
							Mi cuenta
					</a>
				</li>	
				<li class="nav-item">
					<input class="nav-link btn btn-dark" id="histo"  type="button"  value="Historial">
				</li>				
				<li class="nav-item">
					<a class="nav-link" href="?controller=usuario&action=logout">
						<span class="glyphicon glyphicon-log-out"></span>
						Salir
					</a>
				</li>
			<?php } else{ ?>
					<li class="nav-item" >
						<a class="nav-link"  href="?controller=usuario&action=register">
							<span class="glyphicon glyphicon-user"></span>
							Registrarse
						</a>
					</li>
					<li class="nav-item" >
						<a class="nav-link" href="?controller=usuario&action=showLogin">
							<span class="glyphicon glyphicon-log-in"></span>
							Entrar
						</a>
					</li>
			<?php } ?>
			</ul>
			
	</div>
</nav>




