<?php

class MigasPan
{
	private $separador;
	private $nodos = [];
 
	public function __construct($separador = '>') 
	{
		$this->separador = $separador;
	}

	public function agregaNodo($texto, $ruta)
	{
		$this->nodos[] = new Enlace($texto, $ruta);
	}

	public function mostrar()
	{
		$salida = '';

		foreach ($this->nodos as $indice => $enlace) {
			$salida .= $enlace->mostrar();

			if ($indice != count($this->nodos) - 1) {
				$salida .= ' ' . $this->separador . ' ';
			}
		}

		return $salida;
	}

}