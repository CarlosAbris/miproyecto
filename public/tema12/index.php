<?php

include 'models/Usuario.php';
//echo 'Test de conexión: <br>';
$db = new Dbpdo();

// print_r($db->getConnection());

echo '<pre>';

$usuario = new Usuario;

$datos = [
		'nombre' => 'Jorge Juan',
		'email' => 'jj@jj.es',
		'password' => '123456',
		'edad' => '22'
		];
/*

// Esto es el INSERT
try {

	$usuario_id = $usuario->insert($datos);

	echo 'El ID del nuevo usuario es ' . $usuario_id;

	print_r( $usuario->all() );

} catch(Exception $e) {

	echo '<h1>ERROR: ' . $e->getMessage() . '</h1>';

}


// Esto es el UPDATE
$clave_dato = ['id' => 4];

try {

	$usuario->update($datos, $clave_dato);
	print_r( $usuario->all() );

} catch (EXception $e) {

	echo '<h1>ERROR: ' . $e->getMessage() . '</h1>';

}
*/

// Esto es el DELETE

$clave_dato = ['id' => 5];

try {

	$usuario->delete($clave_dato);
	print_r( $usuario->all() );

} catch (EXception $e) {

	echo '<h1>ERROR: ' . $e->getMessage() . '</h1>';

}






