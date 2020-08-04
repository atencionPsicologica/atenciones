<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class Consulta
{
	private $id;
	private $fecha;
	private $fechaf;
	private $enfactual;
	private $diagnostico;
	private $prescripcion;
	private $paciente;
	private $acompaniante;

	function __construct($id, $fecha, $fechaf, $enfactual, $diagnostico, $prescripcion, $paciente, $acompaniante)
	{
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setFechaf($fechaf);
		$this->setEnfactual($enfactual);
		$this->setDiagnostico($diagnostico);
		$this->setPrescripcion($prescripcion);
		$this->setPaciente($paciente);
		$this->setAcompaniante($acompaniante);
	}



	//Getters y Setters
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getFechaf(){
		return $this->fechaf;
	}

	public function setFechaf($fechaf){
		$this->fechaf = $fechaf;
	}

	public function getEnfactual(){
		return $this->enfactual;
	}

	public function setEnfactual($enfactual){
		$this->enfactual = $enfactual;
	}

	public function getDiagnostico(){
		return $this->diagnostico;
	}

	public function setDiagnostico($diagnostico){
		$this->diagnostico = $diagnostico;
	}

	public function getPrescripcion(){
		return $this->prescripcion;
	}

	public function setPrescripcion($prescripcion){
		$this->prescripcion = $prescripcion;
	}

	public function getPaciente(){
		return $this->paciente;
	}

	public function setPaciente($paciente){
		$this->paciente = $paciente;
	}

	public function getAcompaniante(){
		return $this->acompaniante;
	}

	public function setAcompaniante($acompaniante){
		$this->acompaniante = $acompaniante;
	}


	//opciones CRUD
	//la función para registrar una consulta
	public static function save($consulta){
		$db=Db::getConnect();
		//var_dump($consulta);
		//die();
			
		$insert=$db->prepare('INSERT INTO consultas VALUES(NULL,:fecha, :fechaf, :enfactual, :diagnostico, :prescripcion, :paciente, :acompaniante, :created, :deleted)');
		$insert->bindValue('fecha',$consulta->getFecha());
		$insert->bindValue('fechaf', $consulta->getFechaf());
		$insert->bindValue('enfactual',$consulta->getEnfactual());
		$insert->bindValue('diagnostico',$consulta->getDiagnostico());
		$insert->bindValue('prescripcion',$consulta->getPrescripcion());
		$insert->bindValue('paciente',$consulta->getPaciente());
		$insert->bindValue('acompaniante',$consulta->getAcompaniante());
		$insert->bindValue('created', date("Y-m-d H:i:s"));
		$insert->bindValue('deleted', 0);
		$insert->execute();
		
	}

	//función para obtener todas las consultas
	public static function all(){
		$listaConsultas =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM consultas WHERE deleted_at = 0 order by id');


		// carga en la $listaConsultas cada registro desde la base de datos
		foreach ($sql->fetchAll() as $consulta) {
			$listaConsultas[]= new Consulta($consulta['id'],$consulta['fecha'], $consulta['fin'],$consulta['enfactual'], $consulta['diagnostico'],$consulta['prescripcion'],$consulta['paciente'], $consulta['acompaniante_id']);
		}
		return $listaConsultas;
	}
	//función para obtener todas las consultas por numero de cedula pacientes
	public static function getByPaciente($paciente){
		$listaConsultas =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM consultas WHERE paciente=:paciente and deleted_at = 0 order by id');
		$sql->bindValue('paciente',$paciente);
		$sql->execute();
		// carga en la $listaConsultas cada registro desde la base de datos
		foreach ($sql->fetchAll() as $consulta) {
			$listaConsultas[]= new Consulta($consulta['id'],$consulta['fecha'], $consulta['fin'],$consulta['enfactual'], $consulta['diagnostico'],$consulta['prescripcion'],$consulta['paciente'], $consulta['acompaniante']);
		}
		return $listaConsultas;
	}

	public static function getByAcompaniante($acompaniante){
		$listaConsultas =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM consultas WHERE acompaniante=:acompaniante and deleted_at = 0 order by id');
		$sql->bindValue('acompaniante',$acompaniante);
		$sql->execute();
		// carga en la $listaConsultas cada registro desde la base de datos
		foreach ($sql->fetchAll() as $consulta) {
			$listaConsultas[]= new Consulta($consulta['id'],$consulta['fecha'],$consulta['fin'],$consulta['enfactual'], $consulta['diagnostico'],$consulta['prescripcion'],$consulta['paciente'], $consulta['acompaniante']);
		}
		return $listaConsultas;
	}


	//la función para obtener una consulta por el id
	public static function getById($id){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM consultas WHERE ID=:id and deleted_at = 0');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto usuario
		$consultaDb=$select->fetch();
		$consulta= new Consulta($consultaDb['id'],$consultaDb['fecha'],$consultaDb['fin'],$consultaDb['enfactual'],$consultaDb['diagnostico'],$consultaDb['prescripcion'], $consultaDb['paciente'], $consultaDb['acompaniante_id']);
		//var_dump($usuario);
		//die();
		return $consulta;
	}


	public static function getLastId(){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT id FROM `consultas` ORDER BY id DESC LIMIT 1');
		$select->execute();
		//asignarlo al objeto usuario
		$consultaDb=$select->fetchAll();
		$consulta = null;
		foreach ($consultaDb as $cDB) {
			$consulta .= $cDB['id'];
		}
		
		return $consulta;
	}



	public static function update($consulta){
		//var_dump();
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE consultas SET enfactual=:enfactual, diagnostico=:diagnostico,prescripcion=:prescripcion WHERE id=:id');
		$update->bindValue('id',$consulta->getId());
		$update->bindValue('enfactual',$consulta->getEnfactual());
		$update->bindValue('diagnostico',$consulta->getDiagnostico());
		$update->bindValue('prescripcion',$consulta->getPrescripcion());
		$update->execute();
	}


	/***FUNCIONES CRUD RECETA***/
	//la función para registrar LA RECETA
	public static function saveReceta($recomendaciones){
		$db=Db::getConnect();
		//var_dump($recomendaciones);
		//die();
		//codigo sql
		$insert=$db->prepare('INSERT INTO recomendaciones VALUES(NULL,:fecha,:tareas,:indicaciones,:consulta, :created, :deleted)');

		$insert->bindValue('fecha',$recomendaciones->getFecha());
		$insert->bindValue('tareas',$recomendaciones->getTareas());
		$insert->bindValue('indicaciones',$recomendaciones->getIndicaciones());
		$insert->bindValue('consulta',$recomendaciones->getConsulta());
		$insert->bindValue('created', date("Y-m-d H:i:s"));
		$insert->bindValue('deleted', 0);
		$insert->execute();
		
	}

	public static function updateReceta($recomendaciones){
		//var_dump($exaFisico);
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE recomendaciones SET tareas=:tareas, indicaciones=:indicaciones  WHERE id=:id');
		$update->bindValue('id',$recomendaciones->getId());
		$update->bindValue('tareas',$recomendaciones->getTareas());
		$update->bindValue('indicaciones',$recomendaciones->getIndicaciones());
		$update->execute();
	}

	//la función para obtener las recetas
	public static function getByIdReceta($consultas, $fechaConsulta){
		//buscar
		$db=Db::getConnect();

		$select=$db->prepare('SELECT * FROM recomendaciones WHERE consultas_id =:consulta AND fecha=:fecha and deleted_at = 0');

		$select->bindValue('consulta',$consultas);
		$select->bindValue('fecha',$fechaConsulta);
		$select->execute();
		//asignarlo al objeto
		$recomendacionesDb=$select->fetch();
		$recomendaciones= new Receta($recomendacionesDb['id']??null,$recomendacionesDb['fecha']??null,$recomendacionesDb['tareas']??null,$recomendacionesDb['indicaciones']??null,$recomendacionesDb['consultas']??null);
		//var_dump($usuario);
		//die();
		return $recomendaciones;
	}
	
}