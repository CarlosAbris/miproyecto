<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Página de Autenticación</title>
</head>
<body>
	
	<h1>Ya estás logueado</h1>

	<?php $_SESSION['user']['name'] = 'Carlos' ?>

	<h2>Con el nombre: <?= $_SESSION['user']['name'] ?></h2>

	<a href="inicio.php">Regresan a la página principal</a>
	<br>
	<a href="logout.php">Cerrar Sesión</a>

</body>
</html>