<?php

include('funciones.php');

$cadenaEncriptada = 'LEGREXIRDRVJLEKVOKFHLVTFEKZVEVKFURJCRJCVKIRJUVCRSVTVURIZFLEVAVDGCFVJTRURMVQHLVKIRSRAFWVCZODVGRXRLENYZJBP';

$cadena = $cadenaEncriptada;

$clave = 0;

while ( ! strpos($cadena, 'FELIX')) {
	$clave--;
	$cadena = desencriptar($cadenaEncriptada, $clave);
}

echo $cadena;




