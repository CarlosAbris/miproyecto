<?php

class Carrito
{
	private $productos = [];

	public function meter($producto)
	{
		$this->productos[] = $producto;
	}

	public function mostrar()
	{
		$total = 0;
		$totalIva = 0;

		echo '<div class="carrito">';

		foreach($this->productos as $producto) {
			echo '<article class="lineacarrito">';
			echo $producto->mostrar();
			echo '</article>';
			$total += $producto->precio();
			$totalIva += $producto->precioIva();
		}

		echo '<div class="totalcarrito">Total: ' . $total . ' (' . $totalIva . ' IVA Incluido)</div>';

		echo '</div>';
	}
}


class Producto
{
	private $nombre;
	private $precio;
	private $iva;
	private $cantidad = 1;

	public function mostrar()
	{
		return "<p>{$this->nombre}: {$this->precio} &euro; + {$this->iva}%</p>";
	}

	public function precio()
	{
		return $this->precio;
	}

	public function precioIva()
	{
		return round($this->precio + ($this->precio * $this->iva/100), 2);
	}

	public function __construct($nombre, $precio, $iva = 21)
	{
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->iva = $iva;
	}
}

