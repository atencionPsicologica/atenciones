<?php 
	// ¿Hay session abierta?
	if(!isset($_SESSION)) 
    { 	//busca los datos de la session
		session_start(); 
		//echo "<p>Bienvenido<p/>". $_SESSION['nombre'];
	}
	// si no no pasa nada
	 require_once('connection.php');
	// la variable controller guarda el nombre del controlador y action guarda la acción por ejemplo registrar 
	//si la variable controller y action son pasadas por la url desde layout.php entran en el if
	// si la sesion esta abierta te manda al controlador seleccionado una vez pasado el login
	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		$controller=$_GET['controller'];
		$action=$_GET['action'];		
	} else {
		$controller='usuario';
		if (isset($_SESSION['usuario'])) {
			$action='welcome';
		}else{
			$action='showLogin';
		}
	
	}	
	//carga la vista layout.php
	require_once('Views/Layouts/layout.php');
?>


