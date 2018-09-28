<b>Esto está fuera de PHP</b>
<?= "<h1>Hola Mundo otra vez!!!</h1>" ?>
<i>Por tanto será ignorado</i>

<?php 
	//$numero = '';
	var_dump($numero);
?>
<?php if($numero) { ?>
<br>El numero es distinto de 0
<!-- <?php } else if ($numero > 100){ ?>
<br>El número es mayor que 100 -->
<?php } else { ?>
<br>El número es 0
<?php } ?>

<br>Veamos otro uso de la variable<br>
<?php

	$numero = 'Soy el profe';

	var_dump($numero);
?>
<br>
<?php
	$cadena = "Esto es una variable";

	echo 'La variable contiene el texto $cadena';

	$texto = "";
	echo "<br>";
	echo $texto ? "Cadena no vacía" : "Cadena vacía";
	echo "<br>";
	echo "<br>";

	$miArray = ['España' => 'Madrid', 
				'Francia' => 'París',
				'Portugal' => 'Lisboa'];


	foreach ($miArray as $key => $value) {
		echo 'La capital de ' . $key . ' es ' . $value . '<br>';
	}

	foreach ($miArray as $key => $value) {
		echo "La capital de $key es $value <br>";
	}



?>