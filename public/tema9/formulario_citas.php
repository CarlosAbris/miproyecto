<div class="container col-xs-6">
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		
		<h3>Introduce tu horario de citas</h3>
		<div class="form-group">
			<label for="cita">Fecha:</label>
			<input type="date" class="form-control" name="cita" id="cita" placeholder="dd/mm/aaaa">
		</div>

		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Tu nombre">
		</div>

		<button type="submit" class="btn btn-default">Agregar Cita</button>

	</form>
</div>