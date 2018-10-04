<h1>Presentando datos por GET</h1>
<p>El nombre es <?= $_GET['nombre'] ?></p>
<p>El apellido es <?= $_GET['apellido'] ?></p>
<p>El email es <?= isset($_GET['email']) ? $_GET['email'] : 'No tiene email' ?></p>