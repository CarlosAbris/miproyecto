<?php

spl_autoload_register(function($clase) {
	$archivo = $clase . '.php';
	include $archivo;
});

session_start();
$carrito = Carrito::getCarrito();
$carrito->guardaEstadoCookie('carrito');
session_destroy();

?>

<a href="ejemplo5.php">Volver</a>