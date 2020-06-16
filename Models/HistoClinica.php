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
}