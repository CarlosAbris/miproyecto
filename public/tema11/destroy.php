<?php

spl_autoload_register(function($clase) {
	$archivo = $clase . '.php';
	include $archivo;
});

session_start();
session_destroy();

?>

<a href="ejemplo5.php">Volver</a>