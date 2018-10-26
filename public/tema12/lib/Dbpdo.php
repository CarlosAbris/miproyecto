<?php

class Dbpdo
{
	// Datos de la conexion
	private $host = 'mysql';
	private $user = 'homestead';
	private $pass = 'secret';
	private $dbname = 'dbejemplopdo';

	// Contendrá el error en caso de que haya
	public $errors = false;

	// La conexión con la BD
	public $db;

	// Indica si estamos en modo desarrollo o produccion
	public $modeDEV = true;

	// Indica si queremos una conexión persistente o no
	private $persistent = true;

	private function connection()
	{
		$dsn = 'mysql:host=' . $this->host . 
			   ';dbname=' . $this->dbname;

		$options = [PDO::ATTR_PERSISTENT => $this->persistent,
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

		try {

			return new PDO($dsn, $this->user, $this->pass, $options);

		} catch (PDOException $e) {

			$this->errors = $e->getMessage();

			if ($this->modeDEV) {
				print_r($this->errors);
			} else {
				echo "Hay problemas con el acceso a la BD. Prueba más tarde";
			}

		}
	}

	public function __construct()
	{
		$this->db = $this->connection();
	}

	public function getConnection()
	{
		return $this->db;
	}

	public function setPass ($pass)
	{
		$this->pass = $pass;
		$this->connection();
	}

	public function setHost ($host)
	{
		$this->host = $host;
		$this->connection();
	}

	public function setUser ($user) {
		$this->user = $user;
		$this->connection();
	}

	public function setDbname ($dbname)
	{
		$this->dbname = $dbname;
		$this->connection();
	}

	public function setDB ($data)
	{
		$this->dbname = $data['dbname'];
		$this->host = $data['host'];
		$this->user = $data['user'];
		$this->pass = $data['pass'];

		$this->connection();
	}

	public function all($limit = 10)
	{
		$prepare = $this->db->prepare('SELECT * FROM ' . $this->table . ' LIMIT ' . $limit);

		$prepare->execute();

		$this->setQuery($prepare);

		return $prepare->fetchAll(PDO::FETCH_ASSOC);
	}

	public function insert($params)
	{
		if ( ! empty($params) ) {

			$fields = '(' . implode(',', array_keys($params)) . ')';
			$values = "(:" . implode(",:", array_keys($params)) . ")";

			$prepare = $this->db->prepare('INSERT INTO ' . $this->table . ' ' . $fields . ' VALUES ' . $values);
			$prepare->execute($this->normalizePrepareArray($params));

			$this->setQuery($prepare);

			return $this->db->lastInsertId();

		} else {

			throw new Exception('Los parámetros están vacíos');

		}
	}

	public function setQuery($sql)
	{
		if ($this->modeDEV) $sql->debugDumpParams();
	}

	public function lastQuery()
	{
		return $this->lastQuery;
	}

	private function normalizePrepareArray($params)
	{

		foreach ($params as $key => $value) {
			$params[':' . $key] = $value;
			unset($params[$key]);
		}

		return $params;

	}

	public function update($params, $where)
	{

		if ( ! empty($params) ) {

			$fields = '';
			foreach ($params as $key => $value) {
				$fields .= $key . ' = :' . $key . ','; 
			}

			$fields = rtrim($fields, ',');

			$key = key($where);

			$value = $where[$key];

			$ssql = 'UPDATE ' . $this->table . ' SET ' . $fields . ' WHERE ' . $key . '=' . $value;

			$prepare = $this->db->prepare($ssql);

			$prepare->execute($this->normalizePrepareArray($params));

			$this->setQuery($prepare);

		} else {

			throw new Exception('Los parámetros están vacíos');

		}

	}

	public function delete($param) 
	{
		if ( ! empty($param) ) {

			$key = key($param);

			$ssql = 'DELETE FROM ' . $this->table . ' WHERE ' . $key . '= :' . $key;

			$prepare = $this->db->prepare($ssql);

			$prepare->execute($this->normalizePrepareArray($param));

			$this->setQuery($prepare);

		} else {

			throw new Exception('Los parámetros están vacíos');

		}
	}

}







