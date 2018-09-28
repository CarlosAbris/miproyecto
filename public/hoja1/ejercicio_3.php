<?php

$radio = 2.5;

$longitud = 2 * pi() * $radio;
$area = pow(pi(), 2) * $radio;

echo 'Dada una circunferencia de radio ' . $radio . ' cm<br>';
echo 'La longitud de la circunferencia es ' . round($longitud, 4) . ' cm<br>';
echo 'El área de la circunferencia es ' . round($area, 4) . ' cm2<br>';
?>

<br><br><br>
<a href="../index.php">Regresar al Menú</a>