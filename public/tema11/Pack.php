<?php

class Pack implements iEnCarrito
{
	use MasMenos;
	use EnlaceComprar;

	private $productosPack;

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

	public function detalles()
	{
		foreach ($this->productosPack as $producto) {
			echo '<i>' . $producto . '</i>';
		}
	}

	public function __toString()
	{
		$salida = '<br>Pack: ' . $this->precio() . " &euro;";
		$salida .= $this->enlaceComprar();
		return $salida;
	}

}