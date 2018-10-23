<?php

class Carrito
{
	use Persistir;

	private $productos = [];

	private function __construct()
	{

	}

	public static function getCarrito()
	{
		if (isset($_SESSION['micarrito'])) {
			$carrito = $_SESSION['micarrito'];
		} elseif ($carrito = self::traeCookie('carrito')) {
			$_SESSION['micarrito'] = $carrito;
		} else {
			$carrito = new Carrito();
			$_SESSION['micarrito'] = $carrito;
		}
		$carrito->operaciones();
		return $carrito;
	}

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

	private function operaciones()
	{
		if (isset($_GET['accion'])) {
			if ($_GET['accion'] == "comprar") {
				$elem = unserialize($_GET['elemento']);
				$this->meter($elem);
			}
			if ($_GET['accion'] == 'eliminar') {
				$this->quitar($_GET['indice']);
			}
			if ($_GET['accion'] == 'menosunidad') {
				$this->menosUnidad($_GET['indice']);
			}
			if ($_GET['accion'] == 'masunidad') {
				$this->masUnidad($_GET['indice']);
			}
		}
	}

}
