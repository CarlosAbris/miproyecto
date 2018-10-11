<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Citas</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php
	$archivo = 'citas.txt';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (isset($_POST['cita']) && $_POST['cita'] != '' && isset($_POST['nombre']) && ! empty($_POST['nombre'])) {

			$reserva = $_POST['cita'] . ' : ' . $_POST['nombre'] . "\n";
			
			if (file_put_contents($archivo, $reserva, FILE_APPEND)) {

				echo '<h2>Cita Guardada</h2><br>';
				echo '<a href="ejemplo2.php">Regresar al formulario</a><br>';
				echo '<a href="../index.php">Regresar al índice</a>';

			} else {

				echo '<h4>Los datos introducidos no son correctos</h4><br>';

			}
		}

	} else {

		include 'formulario_citas.php';

	}


?>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>