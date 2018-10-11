<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trim</title>
</head>
<body>
	
<?php
	if ($_POST) {
		if(!empty($_POST['nombre'])) {
			$_POST['nombre'] = trim($_POST['nombre']);
			if (strlen($_POST['nombre']) < 3) {
				echo "No es válido el nombre";
			} else {
				echo "El nombre es: -" . strip_tags($_POST['nombre']) . "-<br>";
				echo "El nombre es: -" . htmlspecialchars($_POST['nombre']) . "-<br>";
				echo "El nombre es: -" . htmlentities($_POST['nombre']) . "-<br>";
			}
		} else {
			echo 'No he recibido el nombre';
		}
	}
?>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		Nombre: <input type="text" name="nombre">
		<br>
		<input type="submit" value="Enviar">
	</form>

</body>
</html>