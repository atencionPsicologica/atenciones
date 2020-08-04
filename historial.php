<?php 
// ¿Hay session abierta?
if(!isset($_SESSION)) 
{ 	//busca los datos de la session
    session_start(); 
    //echo "<p>Bienvenido<p/>". $_SESSION['nombre'];
}

require_once('connection.php');
require_once('Controllers/usuarioController.php');
require_once('Models/Usuario.php');

$x = new UsuarioController();
$lista = $x->story();


?>