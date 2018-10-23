<?php

trait EnlaceComprar
{
	private function enlaceComprar()
	{
		return " <a href=\"?accion=comprar&elemento=" . urlencode(serialize($this)) . "\">Comprar</a>";
	}
}