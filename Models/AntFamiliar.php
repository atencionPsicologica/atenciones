<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class AntFamiliar
{
	private $id; 
	private $descripcion;
	private $paciente;

	function __construct($id, $descripcion, $paciente )
	{
		$this->setId($id);
		$this->setDescripcion($descripcion);		
		$this->setPaciente($paciente);
	}


	//Getters y Setters
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getPaciente(){
		return $this->paciente;
	}

	public function setPaciente($paciente){
		$this->paciente = $paciente;
	}


	//opciones CRUD

	public static function saveAntFamiliar($antFamiliar){
		$db=Db::getConnect();
		//ar_dump($paciente);
		//die();
			
		$insert=$db->prepare('INSERT INTO antfamiliares VALUES(NULL, :descripcion, :paciente)');
		$insert->bindValue('descripcion',$antFamiliar->getDescripcion());
		$insert->bindValue('paciente',$antFamiliar->getPaciente());
		$insert->execute();
	}

	public static function getAntFamiliarByPaciente($idPaciente){
		$db=Db::getConnect();
		//ar_dump($paciente);
		//die();
		$select=$db->prepare('SELECT * FROM antfamiliares WHERE paciente=:id');
		$select->bindParam('id',$idPaciente);
		$select->execute();

		$antFamiliarDb=$select->fetch();
		$antFamiliar= new AntFamiliar($antFamiliarDb['id'], $antFamiliarDb['descripcion'],$antFamiliarDb['paciente']);
		return $antFamiliar;
	}

	public static function updateAntFamiliar($antFamiliar){
		//var_dump($historia);
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE antfamiliares SET descripcion=:descripcion,paciente=:paciente  WHERE id=:id');
		$update->bindValue('id',$antFamiliar->getId());
		$update->bindValue('descripcion',$antFamiliar->getDescripcion());
		$update->bindValue('paciente',$antFamiliar->getPaciente());
		$update->execute();
	}


}