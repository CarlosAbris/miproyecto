<?php

trait MasMenos 
{
	private $cantidad = 1;

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