<?php

class Enlace
{
	private $texto;
	private $url;

	public function __construct($texto, $url)
	{
		$this->texto = $texto;
		$this->url = $url;
	}

	public function mostrar() 
	{
		return "<a href=\"$this->url\">$this->texto</a>";
	}
}