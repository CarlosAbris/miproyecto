<?php

include "plantilla.php";
include "plantillaHtml.php";

$html = '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MiPagina con Plantillas</title>
</head>
<body>
    <b>Hola %nombre%</b>
    <p>Estoy muy %animo%</p>
    <p>Vivo en %ciudad%</p>
</body>
</html>';


$diccionario = [
				"nombre" => "Pepe",
				"animo"  => "contento",
				"ciudad" => "Murcia"
				];

$plantilla = new PlantillaHtml($html);
$plantilla->renderData($diccionario);


