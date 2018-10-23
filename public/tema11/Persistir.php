<?php

trait Persistir
{
	private $segundosPersistencia = 2592000;

	public function guardaEstadoCookie($cookie)
	{
		$tiempo = time() + $this->segundosPersistencia;
		setcookie($cookie, serialize($this), $tiempo);
	}

	public static function traeCookie($nombreCookie)
	{
		if (isset ($_COOKIE[$nombreCookie])) {
			return unserialize($_COOKIE[$nombreCookie]);
		}
		return false;
	}
}