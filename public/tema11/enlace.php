<?php

class Enlace extends Etiqueta
{
	private $url;

	public function __construct($contenido, $url)
	{
		parent::__construct("a", $contenido, "href=\"$url\"");
		$this->url = $url;
	}

}