<?php

class Descuento implements iEnCarrito
{
	use EnlaceComprar;

	private $motivo;
	private $descuento;

	public function __construct($motivo, $descuento)
	{
		$this->motivo = $motivo;
		$this->descuento = $descuento;
	}

	public function mostrar()
	{
		return '<p class="descuento">' . $this->motivo . ' ' . $this->descuento . ' &euro;</p>';
	}

	public function precio()
	{
		return - $this->descuento;
	}

	public function precioIva()
	{
		return $this->precio();
	}

	public function masUnidad()
	{
		return false;
	}

	public function menosUnidad()
	{
		return false;
	}

	public function permiteUnidades()
	{
		return false;
	}

	public function __toString()
	{
		$salida = '<br>' . $this->motivo . " " . $this->descuento . " &euro;";
		$salida .= $this->enlaceComprar();
		return $salida;
	}

}
