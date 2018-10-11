if ( ! isset($_POST['nombre']) ) {
	$errores['nombre'] = 'No he recibido el nombre';
} elseif ( strlen($_POST['nombre']) < 3 ) {
	$errores['nombre'] = "Campo nombre demasiado corto";
}
if ( ! isset($_POST['email']) ) {
	$errores['email'] = "No he recibido el email";
} elseif ( strlen($_POST['email']) < 6) {
	$errores['email'] = "El email no es válido";
}
if ( ! isset($_POST['clave1']) || ! isset($_POST['clave2'])) {
	$errores['clave1'] = "No he recibido ambas claves";
} else {
	if ( strlen($_POST['clave1']) < 6 ) {
	$errores['clave1'] = "La clave ha de tener al menos 6 caracteres";
	}
	if ( $_POST['clave1'] != $_POST['clave2']) {
		$errores['clave1'] = "Las claves tienen que ser iguales";
	} 
}