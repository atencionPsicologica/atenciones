<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
* Fecha: 22-03-2017
*/
class HistoClinica
{
	private $id;
	private $fregistro;
	private $numero;
	private $recomendaciones;
	
	function __construct($id, $fregistro, $numero, $recomendaciones)
	{
		$this->setId($id);
		$this->setFregistro($fregistro);
		$this->setNumero($numero);
		$this->setRecomendaciones($recomendaciones);
	}

	/***FUNCIONES Getters y Setters***/
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getFregistro(){
		return $this->fregistro;
	}

	public function setFregistro($fregistro){
		$this->fregistro = $fregistro;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}

	public function getRecomendaciones(){
		return $this->recomendaciones;
	}

	public function setRecomendaciones($recomendaciones){
		$this->recomendaciones = $recomendaciones;
	}

	/***FUNCIONES CRUD***/

	public static function save($histoclinica){
		$db=Db::getConnect();
		//var_dump($recomendaciones);
		//die();
			
		$insert=$db->prepare('INSERT INTO historial VALUES(NULL,:fecha,:numero, :recomendaciones)');
		$insert->bindValue('fecha',$histoclinica->getFregistro());
		$insert->bindValue('numero',$histoclinica->getNumero());
		$insert->bindValue('recomendaciones',$histoclinica->getRecomendaciones());
		$insert->execute();
	}

	//función para obtener todas la historias clínicas
	public static function all(){
		$listaHistorias =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM historial order by id');

		// carga en la $listaHistorias cada registro desde la base de datos
		foreach ($sql->fetchAll() as $historia) {
			$listaHistorias[]= new HistoClinica($historia['id'],$historia['fregistro'], $historia['numero'],$historia['recomendaciones']);
		}
		return $listaHistorias;
	}

	//la función para obtener una HC por el id del recomendaciones
	public static function getByRecomendaciones($idRecomendaciones){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM historial WHERE recomendaciones=:id');
		$select->bindParam('id',$idRecomendaciones);
		$select->execute();

		$historiaDb=$select->fetch();
		$historia= new HistoClinica($historiaDb['id'],$historiaDb['fregistro'],$historiaDb['numero'],$historiaDb['recomendaciones']);
		return $historia;
	}

	//la función para obtener una HC por el numero
	public static function getByNumero($numero){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM historial WHERE numero=:numero');
		$select->bindParam('numero',$numero);
		$select->execute();

		$historiaDb=$select->fetch();
		$historia= new HistoClinica($historiaDb['id'],$historiaDb['fregistro'],$historiaDb['numero'],$historiaDb['recomendaciones']);
		return $historia;
	}

	/***FUNCIONES AUXILIARES HC***/
	//la función para obtener el valor max del id para el número de historia
	public static function getMaxId(){
		//buscar el max id de la tabla historial
		$db=Db::getConnect();
		$select=$db->prepare('SELECT MAX(id) AS id FROM historial');
		$select->execute();
		//asignarlo al objeto que obtiene el registro
		$histoDb=$select->fetch();
		$idMax= $histoDb['id'];
		return $idMax;
	}

	public static function getByPaciente($idPaciente){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM histoclinicas WHERE PACIENTE=:id');
		$select->bindParam('id',$idPaciente);
		$select->execute();

		$historiaDb=$select->fetch();
		$historia= new HistoClinica($historiaDb['id'],$historiaDb['fregistro'],$historiaDb['numero'],$historiaDb['paciente']);
		return $historia;
	}


	public static function saveAntPersonal($antPersonal){
		$db=Db::getConnect();
		//var_dump($antPersonal);
		//die();
			
		$insert=$db->prepare('INSERT INTO antpersonales VALUES(NULL,:vsexualactiva, :ciclos, :embarazos, :abortos, :abusoPsico, :abusoFis, :abandono, :vicios,:descripcion, :paciente)');

		$insert->bindValue('vsexualactiva',$antPersonal->getVsexualactiva());
		$insert->bindValue('embarazos',$antPersonal->getPartos());
		$insert->bindValue('abortos',$antPersonal->getEmbarazos());
		$insert->bindValue('abusoPsico',$antPersonal->getAbusoPsico());
		$insert->bindValue('abusoFis',$antPersonal->getAbusoFis());
		$insert->bindValue('abandono',$antPersonal->getAbandono());
		$insert->bindValue('vicios',$antPersonal->getVicios());
		$insert->bindValue('descripcion',$antPersonal->getDescripcion());
		$insert->bindValue('paciente',$antPersonal->getPaciente());
		$insert->execute();
	}


	public static function getAntPersonalByPaciente($idPaciente){
		$db=Db::getConnect();
		//ar_dump($paciente);
		//die();
		$select=$db->prepare('SELECT * FROM antpersonales WHERE PACIENTE=:id');
		$select->bindParam('id',$idPaciente);
		$select->execute();

		$antPersonalDb=$select->fetch();
		$antPersonal= new AntPersonal($antPersonalDb['id'], $antPersonalDb['vsexualactiva'], $antPersonalDb['embarazos'],$antPersonalDb['abortos'], $antPersonalDb['abusoPsico'], $antPersonalDb['abusoFis'],$antPersonalDb['abandono'],$antPersonalDb['vicios'], $antPersonalDb['descripcion'],$antPersonalDb['paciente']);
		return $antPersonal;
	}

	public static function updateAntPersonal($antPersonal){
		//var_dump($historia);
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE antpersonales SET vsexualactiva=:vsexualactiva, embarazos=:embarazos, abortos=:abortos, abusoPsico=:abusoPsico, abusoFis=:abusoFis, abandono=:abandono,vicios=:vicios,descripcion=:descripcion,paciente=:paciente  WHERE id=:id');
		$update->bindValue('id',$antPersonal->getId());
		$update->bindValue('vsexualactiva',$antPersonal->getVsexualactiva());
		$update->bindValue('embarazos',$antPersonal->getEmbarazos());
		$update->bindValue('abortos',$antPersonal->getAbortos());
		$update->bindValue('abusoPsico',$antPersonal->getAbusoPsico());
		$update->bindValue('abusoFis',$antPersonal->getAbusoFis());
		$update->bindValue('abandono',$antPersonal->getAbandono());
		$update->bindValue('vicios',$antPersonal->getVicios());
		$update->bindValue('descripcion',$antPersonal->getDescripcion());
		$update->bindValue('paciente',$antPersonal->getPaciente());
		$update->execute();
	}

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