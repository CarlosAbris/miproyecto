<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uso de Post</title>
</head>
<body>
<?php
	if ( ! $_POST ) {
		include('formulario.php');
	} else {
		if ( isset($_POST['registrarse']) && $_POST['registrarse'] == 'Enviar') {
			echo 'Muchas gracias por registrarte en mi sistema';
		} elseif ( isset($_POST['registrarse']) && $_POST['registrarse'] == 'Cancelar' ) {
			echo 'Que pena!!! Tu te lo pierdes';
		} else {
			echo 'Operación no permitida';
		}

		if ( isset($_POST['nombre']) ) {
			echo 'Tu nombre es ' . $_POST['nombre'];
		}
		if ( isset($_POST['email']) ) {
			echo '<br>Tu email es ' . $_POST['email'];
		}
		if ( $_POST['clave']['original'] == $_POST['clave']['repetida'] ) {
			echo 'Tu clave parece correcta';
		} else {
			echo '<br>Las claves no son iguales';
		}
	}

?>
</body>
</html>