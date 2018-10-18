<?php

class MigasPanContenedor extends MigasPan
{
	private $contenedor;

	public function __construct($separador, $contenedor)
	{
		parent::__construct($separador);
		$this->contenedor = new Etiqueta($contenedor);
	}

	public function mostrar() 
	{
		return $this->contenedor->mostrar(parent::mostrar());
	}

}