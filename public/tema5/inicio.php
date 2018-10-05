<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio de Sesión</title>
</head>
<body>
	
	<?php
		if (isset($_SESSION['user']['name'])) {
			echo 'Eres ' . $_SESSION['user']['name'];
		} else {
			echo 'No estás logueado';
		}
	?>

	<br>
	<a href="loguearme.php">Identificarme</a>
	<br>
	<a href="logout.php">Cerrar Sesión</a>

</body>
</html>