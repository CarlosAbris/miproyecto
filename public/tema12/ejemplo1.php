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
echo '<br>';
echo $resultado[0]['first_name'];

$query3 = $connection->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");

$first_name = "Hermenegildo";

$query3->bindValue(':first_name', $first_name, PDO::PARAM_STR);
$query3->bindParam(':last_name', $last_name, PDO::PARAM_STR);
$query3->bindParam(':email', $email, PDO::PARAM_STR);
$query3->bindParam(':password', $password, PDO::PARAM_STR);

$first_name = 'John';
$last_name = 'Smith';
$email = 'john@smith.us';
$password = md5('123456');

$query3->execute();

$first_name = 'Heriberto';
$last_name = 'Gómez Juárez';
$email = 'heri@goju.es';
$password = md5('123456');

$query3->execute();












