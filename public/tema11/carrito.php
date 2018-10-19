<?php

interface iEnCarrito
{
	public function mostrar();
	public function precio();
	public function precioIva();
	public function masUnidad();
	public function menosUnidad();
	public function permiteUnidades();
}

class Carrito
{
	private $productos = [];

	public function meter(iEnCarrito $elemento)
	{
		$this->productos[] = $elemento;
	}

	public function mostrar()
	{
		$total = 0;
		$totalIva = 0;

		echo '<div class="carrito">';

		foreach($this->productos as $key => $producto) {

			echo '<article class="lineacarrito">';
			echo $producto->mostrar();

			$enlaceMasUnidad = "?accion=masunidad&indice=$key";
			$enlaceMenosUnidad = "?accion=menosunidad&indice=$key";
			$enlaceEliminar = "?accion=eliminar&indice=$key";

			if ($producto->permiteUnidades()) {
				echo "<a href=\"$enlaceMenosUnidad\">-</a> / <a href=\"$enlaceMasUnidad\">+</a>";
			}
			echo "<a href=\"$enlaceEliminar\" class=\"enlaceeliminar\">Eliminar</a>";
			echo '</article>';

			$total += $producto->precio();
			$totalIva += $producto->precioIva();
		}

		echo '<div class="totalcarrito">Total: ' . $total . ' (' . $totalIva . ' IVA Incluido)</div>';

		echo '</div>';
	}

	public function quitar($indice)
	{
		unset($this->productos[$indice]);
	}

	public function masUnidad($indice)
	{
		$this->productos[$indice]->masUnidad();
	}

	public function menosUnidad($indice)
	{
		$this->productos[$indice]->menosUnidad();
	}

}


class Producto implements iEnCarrito
{
	private $nombre;
	private $precio;
	private $iva;
	private $cantidad = 1;

	public function mostrar()
	{
		return "<p><span>({$this->cantidad}x)</span> {$this->nombre}: {$this->precio} &euro; + {$this->iva}%</p>";
	}

	public function precio()
	{
		return $this->precio * $this->cantidad;
	}

	public function precioIva()
	{
		return round($this->precio * $this->cantidad * (1 + $this->iva/100), 2);
	}

	public function __construct($nombre, $precio, $iva = 21)
	{
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->iva = $iva;
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

	public function permiteUnidades()
	{
		return true;
	}

}


class Descuento implements iEnCarrito
{
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
}


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






