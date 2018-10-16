<?php

class Freelance
{
	private $nombre;
	protected $ocupado;
	private $precioHora = 10;
	private $comienzoTrabajo;

	public function __construct($nombre, $precioHora)
	{
		$this->nombre = $nombre;
		$this->precioHora = $precioHora;
		$this->ocupado = false;
	}

	public function desarrollar()
	{
		echo "<br>Soy " . $this->nombre . " y comienzo a trabajar";
		$this->ocupado = true;
		$this->comienzoTrabajo = time();
	}

	public function parar()
	{
		$this->ocupado = false;
		$horasTrabajadas = ceil((time() - $this->comienzoTrabajo) / 3600);
		echo "Terminé de trabjar. Facturo " . $horasTrabajadas * $this->precioHora;
	}
}

