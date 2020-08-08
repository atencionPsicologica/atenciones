<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
	}?>
<?php if (isset($_SESSION['usuario'])){ ?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<!--div class="container-fluid">
			<div class="">			
				<a class="navbar-brand" href="#">
				<span  aria-hidden="true" ></span>
				Misioneros
				</a>
				class="collapse navbar-collapse"
			</div-->
			<div class="collapse show navbar-collapse">
			<ul class="navbar-nav mr-auto ">
				
			<?php if (isset($_SESSION['usuario'])){ ?>		
				<?php if ($_SESSION['usuario_alias'] != "MUJ") { ?>

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

				<?php } else{ ?>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Acompañantes <span class="caret"></span></a>
							<ul class="dropdown-menu"  >						
								<li><a class="dropdown-item"  href="?controller=usuario&action=register">Registrar</a></li>
								<li><a class="dropdown-item"  href="?controller=usuario&action=show">Ver Acompañantes</a></li>
							</ul>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Pacientes<span class="caret"></span></a>
							<ul class="dropdown-menu">						
								<li><a class="dropdown-item"  href="?controller=paciente&action=register">Registrar</a></li>
								<li><a class="dropdown-item"  href="?controller=paciente&action=show">Ver Pacientes</a></li>
							</ul>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Historiales<span class="caret"></span></a>
							<ul class="dropdown-menu">						
								<li><a class="dropdown-item"  href="?controller=usuario&action=register">Registrar</a></li>
								<li><a class="dropdown-item"  href="?controller=historia&action=show">Ver Historiales</a></li>
							</ul>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="?controller=usuario&action=welcome">Panel inicial<span ></span></a>
						</li>


				<?php } ?>

			<?php } ?>
				</ul>		
			</div>

			
			<ul class="navbar-nav mr-auto navbar-right ">
				<?php if (isset($_SESSION['usuario'])){?>
					<?php if ($_SESSION['usuario_alias'] != "MUJ") { ?>

						<a class="nav-link">Bienvenido: <?php echo $_SESSION['usuario_alias']; ?></a>
						<li class="nav-item">
							<a class="nav-link" href="?controller=usuario&action=showregister&id=<?php echo $_SESSION['usuario_id'] ?>">
								<span class="glyphicon glyphicon-cog"></span>
									Mi cuenta
							</a>
						</li>	
						<li class="nav-item">
							<input class="nav-link btn btn-dark  btn-sm" id="histo"  type="button"  value="Historial" >
						</li>				
						<li class="nav-item">
							<a class="nav-link" href="?controller=usuario&action=logout">
								<span class="glyphicon glyphicon-log-out"></span>
								Salir
							</a>
						</li>

					<?php }else{ ?>

						<a class="nav-link">Bienvenido: <?php echo $_SESSION['usuario_alias']; ?></a>
						<li class="nav-item">
							<a class="nav-link" href="?controller=usuario&action=showregister&id=<?php echo $_SESSION['usuario_id'] ?>">
								<span class="glyphicon glyphicon-cog"></span>
									Mi cuenta
							</a>
						</li>	
										
						<li class="nav-item">
							<a class="nav-link" href="?controller=usuario&action=logout">
								<span class="glyphicon glyphicon-log-out"></span>
								Salir
							</a>
						</li>
		
				<?php } ?>

				<?php } else{ ?>

						<li class="nav-item" >
								<span class="nav-link">Misioneros Urbanos de Jesucristo. Por María, quédate en nosotros Jesús</span>
						</li>
						<!--li class="nav-item" >
							<a class="nav-link" href="?controller=usuario&action=showLogin">
								<span class="glyphicon glyphicon-log-in"></span>
								Entrar
							</a>
						</li-->

				<?php } ?>
			</ul>	
		</div>
	</nav>
<?php } ?>



