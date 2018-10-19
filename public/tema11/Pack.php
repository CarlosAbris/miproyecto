<?php

class Pack implements iEnCarrito
{
	private $productosPack;
	private $cantidad = 1;

	public function __construct($arrayProductos)
	{
		$this->productosPack = $arrayProductos;
	}

	public function mostrar()
	{
		$salida = '<div class="pack">';

		foreach ($this->productosPack as $key => $value) {
			$salida .= $value->mostrar();
			$salida .= '<br />';
		}

		$salida .= '</div>';

		return $salida;
	}

	public function permiteUnidades()
	{
		return true;
	}

	public function precio()
	{
		$total = 0;

		foreach ($this->productosPack as $producto) {
			$total += $producto->precio();
		}

		return $total * $this->cantidad;
	}

	public function precioIva()
	{
		$total = 0;

		foreach ($this->productosPack as $producto) {
			$total += $producto->precioIva();
		}

		return $total * $this->cantidad;
	}

	public function masUnidad($unidades = 1)
	{
		$this->cantidad += $unidades;
	}

	public function menosUnidad()
	{
		if ($this->cantidad > 0) {
			$this->cantidad--;
		}
	}
}