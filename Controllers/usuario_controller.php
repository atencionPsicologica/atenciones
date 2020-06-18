<?php 
	session_start();
	/**
	* Descripción: Controlador para la entidad usuario
	* Autor: Elivar Largo
	* Web: www.ecodeup.com
	* Fecha: 25-02-2017
	*/
	class UsuarioController
	{	
		public function __construct(){}

		public function show(){
			//echo 'index desde UsuarioController';
			
			$usuarios=Acompaniante::all();
			require_once('Views/User/show.php');
		}

		public function register(){
			//echo getcwd ();
			require_once('Views/User/register.php');
		}

		//guardar
		public function save(){
			//Usuario::save($usuario);
			$usuarios=[];
			$usuarios=Acompaniante::all();
			$existe=False;
			//var_dump($existe);
			//	die();
			foreach ($usuarios as $usuario) {
				echo $usuario->alias."<br>".$_POST['alias']."<br>".$usuario->email;
				if (strcmp($usuario->alias,$_POST['alias'])==0 or strcmp($usuario->email,$_POST['email'])==0) {
					$existe=True;
				}
			}			

			if (!$existe) {
				$usuario= new Acompaniante(null,$_POST['alias'],$_POST['nombres'],$_POST['email']);
				Acompaniante::save($usuario);
				$_SESSION['mensaje']='Registro guardado satisfactoriamente';
				header('Location: index.php');
				//require_once('Views/Layouts/layout.php');*/
			}else{
				$_SESSION['mensaje']='El alias o el correo para tu usuario ya existen';
				header('Location: index.php');
			}			
			//echo getcwd ();
		}

		public function showregister(){
			$id=$_GET['id'];
			$usuario=Acompaniante::getById($id);
			require_once('Views/User/update.php');
			//Usuario::update($usuario);
			//header('Location: ../index.php');
		}

		public function update(){
			$usuario= new Acompaniante($_POST['id'],$_POST['alias'],$_POST['nombres'],$_POST['email']);

			//var_dump($usuario);
			//die();
			Acompaniante::update($usuario);
			$_SESSION['mensaje']='Registro actualizado satisfactoriamente';
			header('Location: index.php');
		}

		public function delete(){
			Acompaniante::delete($_GET['id']);
			$_SESSION['mensaje']='Registro eliminado satisfactoriamente';
			header('Location: index.php');
		}
		
		public function error(){
			require_once('Views/User/error.php');
		} 

		public function login(){
			require_once('Views/User/login.php');
		}
	}
?>