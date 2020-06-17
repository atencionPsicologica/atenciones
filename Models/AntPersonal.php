<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class AntPersonal
{
	private $id;
	private $vsexualactiva;
	private $embarazos;
	private $abortos;
	private $abusoPsico;
	private $abusoFis;
	private $abandono;
	private $vicios;
	private $descripcion;
	private $paciente;

	function __construct($id, $vsexualactiva, $embarazos, $abortos, $abusoPsico, $abusoFis, $abandono, $vicios, $descripcion, $paciente)
	{
		$this->setId($id);
		$this->setVsexualactiva($vsexualactiva);
		$this->setEmbarazos($embarazos);
		$this->setAbortos($abortos);
		$this->setAbusoPsico($abusoPsico);
		$this->setAbusoFis($abusoFis);
		$this->setHvivos($abandono);
		$this->setMpf($vicios);
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

	public function getVsexualactiva(){
		return $this->vsexualactiva;
	}

	public function setVsexualactiva($vsexualactiva){
		$this->vsexualactiva = $vsexualactiva;
	}

	public function getEmbarazos(){
		return $this->embarazos;
	}

	public function setEmbarazos($embarazos){
		$this->embarazos = $embarazos;
	}

	public function getAbortos(){
		return $this->abortos;
	}

	public function setAbortos($abortos){
		$this->abortos = $abortos;
	}

	public function getAbusoPsico(){
		return $this->abusoPsico;
	}

	public function setAbusoPsico($abusoPsico){
		$this->abusoPsico = $abusoPsico;
	}

	public function getAbusoFis(){
		return $this->abusoFis;
	}

	public function setAbusoFis($abusoFis){
		$this->abusoFis = $abusoFis;
	}

	public function getAbandono(){
		return $this->abandono;
	}

	public function setAbandono($abandono){
		$this->abandono = $abandono;
	}

	public function getVicios(){
		return $this->vicios;
	}

	public function setVicios($vicios){
		$this->vicios = $vicios;
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



}