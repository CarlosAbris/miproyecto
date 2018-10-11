<?php

$archivo = 'citas.txt';

$array = file($archivo);

echo '<h2>Las citas actuales son</h2><br>';

echo 'FECHA-------NOMBRE<br>';

foreach ($array as $value) {
	$datos = explode(' : ', $value);

	echo $datos[0] . '- - -' . $datos[1] . '<br>';
}