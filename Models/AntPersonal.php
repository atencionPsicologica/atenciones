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
}