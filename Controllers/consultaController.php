<?php 
if(!isset($_SESSION)) 
    { 
		// validación de sesión si los datos son correctos
		// si hay sessión abierta y si se está conectada al servidor
        session_start(); 
    } 
require_once('Models/Paciente.php');
require_once('Models/Usuario.php');
require_once('Models/Consulta.php'); 
/**
* 
*/
class ConsultaController
{	
	function __construct(){}

	public function register(){
		$paciente=Paciente::getById($_GET['id']);
		$acompaniante=Usuario::getById($_SESSION['usuario_id']);
		
		require_once('Views/Consulta/register.php');
	}

	public function save(){
		//echo $_POST['fecha'], $_POST['fechaf'],$_POST['enfactual'], $_POST['diagnostico'], $_POST['prescripcion'],$_POST['idpaciente'], $_POST['idacompaniante'];
		$consulta= new Consulta(null,$_POST['fecha'], $_POST['fechaf'],$_POST['enfactual'], $_POST['diagnostico'], $_POST['prescripcion'],$_POST['idpaciente'], $_POST['idacompaniante']);
		//var_dump($consulta);
		//die();
		Consulta::save($consulta);
		//$this->saveSigVitales();
		//$this->saveSistemas();
		//$this->saveExaFisicos();
		//$this->saveExaComplementarios();
		//$idLastQueryInserted = ;
		$this->saveRecetas(Consulta::getLastId());
		$_SESSION['mensaje']='Registro guardado satisfactoriamente';
		$this->show();
	}

	//muestra las consultas
	public function show(){


		//$consultas=Consulta::all();
		$consultas=Consulta::allByAcompaniante($_SESSION['usuario_id']);
		$lista_consultas="";
		$registros=2; // debe ser siempre par
		if (count($consultas)>$registros) { // solo página si el número de registros mostrados es menor que los registros de la bd
			if ((count($consultas)%$registros)==0) {
				$botones=count($consultas)/$registros;
			}else{//si el total de registros de la bd es impar			
				$botones=(count($consultas)/$registros+1);
			}
			
			if (!isset($_GET['boton'])) {//la primera vez carga los registros del botón 1
				$res=$registros*1;
				for ($i=0; $i < $res ; $i++) { 
					$lista_consultas[]=$consultas[$i];
				}
			}else{
				//multiplica el número de botón por el número de registros mostrados
				$res=$registros*$_GET['boton'];
				//resta el valor mayor de registros a mostrar menos el número de registros mostrados
				for ($i=$res-$registros; $i < $res; $i++) { 
					if ($i<count($consultas)) {
						$lista_consultas[]=$consultas[$i];
					}				
				}
			}
		}else{// si no se presenta el paginador
			$botones=0;
			$lista_consultas=$consultas;
		}

		require_once('Views/Consulta/show.php');
	}

	public function error(){
		require_once('Views/User/error.php');
	} 

	public function showupdate(){
		$id=$_GET['id'];
		//$x = $_SESSION['usuario_id'];
		//obtengo el paciente, la consulta, signos vitales, los datos sobre los sistemas y examenes fisicos, para esa consulta
		$paciente=Paciente::getById($_GET['paciente']);
		//$_SESSION['x'] se guarda todo la información del logeado.
		$acompaniante=Usuario::getById($_SESSION['usuario_id']);
		
		$consulta=Consulta::getById($id);
		//$vitales=Consulta::getByIdSigVital($paciente->getId(),$consulta->getFecha());
		//$sistemas=Consulta::getByIdSistema($paciente->getId(),$consulta->getFecha());
		//$fisico=Consulta::getByIdFisico($paciente->getId(),$consulta->getFecha());
		//$complementario=Consulta::getByIdComplementario($paciente->getId(),$consulta->getFecha());
		$receta=Consulta::getByIdReceta($consulta->getId(),$consulta->getFecha());
		require_once('Views/Consulta/update.php');
		//Usuario::update($usuario);
		//header('Location: ../index.php');
	}

	public function update(){
		$consulta= new Consulta($_POST['idconsulta'],$_POST['fecha'], $_POST['fechaf'], $_POST['enfactual'], $_POST['diagnostico'], $_POST['prescripcion'], $_POST['idpaciente'], $_POST['idacompaniante']);

		Consulta::update($consulta);
		//$this->updateSigVitales();
		//$this->updateSistemas();
		//$this->updateExaFisicos();
		//$this->updateExaComplementarios();
		$this->updateRecetas($_POST['idconsulta']);
		$_SESSION['mensaje']='Registro actualizado satisfactoriamente';
		$this->show();
	}

	//la función para obtener consultas por cedula paciente
	public function buscar(){
		//obtener paciente por cedula
		if (!empty($_POST['cedula'])) {
			$paciente=Paciente::getByCedula($_POST['cedula']);
			$lista_consultas=Consulta::getByPaciente($paciente->getId());
			$botones=0;
			require_once('Views/Consulta/show.php');
		}else{
			$this->show();
		}	


	}

	public function saveRecetas($id){
		$receta= new Receta(null,$_POST['fecha'],$_POST['tareas'],$_POST['indicaciones'],$id);
		//var_dump($sigVital);
		//die();
		Consulta::saveReceta($receta);
	}

	public function updateRecetas($id){
		$receta= new Receta($_POST['idreceta'],$_POST['fecha'],$_POST['tareas'],$_POST['indicaciones'],$id);
		//var_dump($exaFisico);
		//die();
		Consulta::updateReceta($receta);
	}

	public function recetaPdf(){
		header('Location: Controllers/RecetaPdf.php?fecha='.$_GET['fecha'].'&paciente='.$_GET['paciente']);	
	}

}