<?php 

$fuente = fopen("lista.txt", "r+");

fwrite($fuente, "Soy yo quien escribe\n");

fclose($fuente);