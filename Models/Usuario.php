<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class Usuario
{
	private $id;
	private $alias;
	private $nombres;
	private $apellidos;
	private $email;
	private $clave;
	private $pregunta;
	private $respuesta;
	
	function __construct($id, $alias, $nombres, $apellidos, $email,$clave, $pregunta, $respuesta)
	{
		$this->setId($id);
		$this->setAlias($alias);
		$this->setNombres($nombres);
		$this->setApellidos($apellidos);
		$this->setEmail($email);
		$this->setClave($clave);
		$this->setPregunta($pregunta);
		$this->setRespuesta($respuesta);
	}


	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getAlias()
	{
		return $this->alias;
	}

	public function setAlias($alias)
	{
		$this->alias = $alias;
	}

	public function getNombres()
	{
		return $this->nombres;
	}

	public function setNombres($nombres)
	{
		$this->nombres = $nombres;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos)
	{
		$this->apellidos = $apellidos;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getClave()
	{
		return $this->clave;
	}

	public function setClave($clave)
	{
		$this->clave = $clave;
	}

	public function getPregunta()
	{
		return $this->pregunta;
	}

	public function setPregunta($pregunta)
	{
		$this->pregunta = $pregunta;
	}

	public function getRespuesta()
	{
		return $this->respuesta;
	}

	public function setRespuesta($respuesta)
	{
		$this->respuesta = $respuesta;
	}


	//opciones CRUD

	//función para obtener todos los usuarios
	public static function all(){
		$listaAcompaniante =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM acompaniante WHERE deleted_at = 0');

		// carga en la $listaUsuarios cada registro desde la base de datos
		foreach ($sql->fetchAll() as $acompaniante) {
			$listaAcompaniante[]= new Usuario($acompaniante['id'],$acompaniante['alias'], $acompaniante['nombres'],$acompaniante['apellidos'],$acompaniante['email'], $acompaniante['clave'], $acompaniante['respuesta'], $acompaniante['pregunta']);
		}
		return $listaAcompaniante;
	}

	//la función para registrar un usuario
	public static function save($acompaniante){
		$db=Db::getConnect();
			
		$insert=$db->prepare('INSERT INTO acompaniante VALUES(NULL,:alias,:nombres,:apellidos,:email,:clave, :pregunta, :respuesta, :created, :deleted)');
		$insert->bindValue('alias',$acompaniante->getAlias());
		$insert->bindValue('nombres',$acompaniante->getNombres());
		$insert->bindValue('apellidos',$acompaniante->getApellidos());
		$insert->bindValue('email',$acompaniante->getEmail());
		//encripta la clave
		$pass=password_hash($acompaniante->getClave(),PASSWORD_DEFAULT);
		$insert->bindValue('clave',$pass);
		$insert->bindValue('pregunta',$acompaniante->getPregunta());
		$insert->bindValue('respuesta',$acompaniante->getRespuesta());
		$insert->bindValue('created', date("Y-m-d H:i:s"));
		$insert->bindValue('deleted', 0);
		$insert->execute();
	}

	//la función para actualizar 
	public static function update($acompaniante){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE acompaniante SET nombres=:nombres WHERE id=:id');
		$update->bindValue('id',$acompaniante->id);
		$update->bindValue('nombres',$acompaniante->nombres);
		$update->execute();
	}

	// la función para eliminar por el id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM acompaniante WHERE ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}

	//la función para obtener un usuario por el id
	public static function getById($id){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM acompaniante WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto usuario
		$acompanianteDb=$select->fetch();
		$acompaniante= new Usuario($acompanianteDb['id']??null,$acompanianteDb['alias']??null,$acompanianteDb['nombres']??null,$acompanianteDb['apellidos']??null,$acompanianteDb['email']??null, $acompanianteDb['clave']??null,$acompanianteDb['pregunta']??null,$acompanianteDb['respuesta']??null);
		//var_dump($usuario);
		//die();
		return $acompaniante;
	}

	public static function getConsultas($id)
	{
		$db= Db::getConnect();
		$select=$db->prepare('SELECT `id`, `fecha` as start, `fin` as end, `enfactual` as title, `diagnostico`, `prescripcion` FROM `consultas` WHERE acompaniante_id = :id');
		$select->bindValue(':id', $id);
		$select->execute();
		$consultas = $select->fetchAll(PDO::FETCH_ASSOC);
		$lista = json_encode($consultas);
		return $lista;
	}

	public static function getHistotial($id)
	{
		$db= Db::getConnect();
		$select=$db->prepare('SELECT co.id, co.fecha as start, co.fin as end, co.enfactual as title, co.diagnostico, co.prescripcion, pa.nombres as nombre, pa.apellidos as apellido FROM consultas co, pacientes pa WHERE acompaniante_id = :id ORDER BY co.fecha DESC');
		$select->bindValue(':id', $id);
		$select->execute();
		$consultas = $select->fetchAll(PDO::FETCH_ASSOC);
		//$lista = json_encode($consultas);
		return $consultas;
	}
}
