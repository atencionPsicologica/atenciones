<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class Receta
{
	private $id;
	private $fecha;
	private $tareas;
	private $indicaciones;	
	private $consulta;
	
	function __construct($id, $fecha,$tareas,$indicaciones, $consulta)
	{
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setTareas($tareas);
		$this->setIndicaciones($indicaciones);		
		$this->setConsulta($consulta);		
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

	public function getIndicaciones(){
		return $this->indicaciones;
	}

	public function setIndicaciones($indicaciones){
		$this->indicaciones = $indicaciones;
	}

	public function getTareas(){
		return $this->tareas;
	}

	public function setTareas($tareas){
		$this->tareas = $tareas;
	}

	public function getConsulta(){
		return $this->consulta;
	}

	public function setConsulta($consulta){
		$this->consulta = $consulta;
	}

	//opciones CRUD
}