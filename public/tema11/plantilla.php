<?php

abstract class Plantilla
{

	private $html;
	protected $htmlGenerado;

	public function __construct($html)
	{
		$this->html = $html;
		$this->htmlGenerado = "";
	}

	private function cargarDatos($diccionario)
	{

		$this->htmlGenerado = $this->html;
		foreach ($diccionario as $key => $value) {
			$this->htmlGenerado = str_replace("%$key%", $value, $this->htmlGenerado);
		}

	}

	protected abstract function render();

	public function renderData($diccionario)
	{
		$this->cargarDatos($diccionario);
		$this->render();
	}

}




