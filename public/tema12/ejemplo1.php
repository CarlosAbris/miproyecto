<?php

echo "Estableciendo conexión con la BD...<br>";

$host = 'mysql';
$port = '3306';
$dbname = 'tema12';
$user = 'homestead';
$password = 'secret';

$dsn = 'mysql:host=' . $host .';port=' . $port . ';dbname=' . $dbname;

$options = [PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {

	$connection = new PDO($dsn, $user, $password, $options);
	echo "Ya estamos conectados a la DB";

} catch (PDOException $e) {

	echo "Error en la conexión: " . $e->getMessage();

}

$query = $connection->query("SELECT * FROM users");

while ( $row = $query->fetch(PDO::FETCH_OBJ) ) {

	echo '<pre>';
	print_r($row);

}

$query2 = $connection->query("SELECT * FROM users");
$resultado = $query2->fetchAll();
echo '<pre>';
print_r($resultado);

echo $resultado[0][0];