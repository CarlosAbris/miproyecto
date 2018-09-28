<?php

$año = 2019;

$a = $año % 19;
$b = $año % 4;
$c = $año % 7;
$d = (19 * $a + 24) % 30;
$e = (2 * $b + 4 * $c + 6 * $d + 5) % 7;

$fecha = 22 + $d + $e;

if ($fecha < 32) {
	echo "El domingo de Pascua es el " . $fecha . " de Marzo<br>";
} else {
	echo 'El domingo de Pascua es el ' . ($fecha-31) . ' de Abril<br>';
}
?>

<br><br><br>
<a href="../index.php">Regresar al Menú</a>