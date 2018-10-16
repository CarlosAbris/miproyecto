<?php

include "enlace.php";
include "migasPan.php";

$migas = new MigasPan('=>');

$migas->agregaNodo("Home", "https://iescierva.net");
$migas->agregaNodo("Noticias", "https://iescierva.net/noticias");
$migas->agregaNodo("Noticias académicas", "https://iescierva.net/noticias/academicas");

echo $migas->mostrar();
