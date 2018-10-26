<?php

include 'lib/Dbpdo.php';

class Usuario extends Dbpdo
{
	/*
	public function __construct()
	{
		echo 'Hola, soy un usuario<br>';
	}
	*/

	public $table = 'usuarios';

	public function insert($params)
	{
		return parent::insert($this->validateParams($params));
	}

	private function validateParams($params)
	{
		// Se validan los parámetros

		return $params;
	}
}