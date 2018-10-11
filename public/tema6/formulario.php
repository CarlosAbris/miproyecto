<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
	<div class="row">
		<div class="col-3">
		</div>
		<div class="col-6">
			<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" name="nombre"
			<?php mostrar_campo('nombre') ?>
			>
			<?php mostrar_error_campo('nombre', $errores) ?>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control"
			<?php mostrar_campo('email') ?>
			>
			<?php mostrar_error_campo('email', $errores); ?>
		</div>
		<div class="form-group">
			<label for="clave1">Clave</label>
			<input type="password" name="clave1" class="form-control">
			<?php mostrar_error_campo('clave1', $errores) ?>
		</div>
		<div class="form-group">
			<label for="clave2">Repetir Clave</label>
			<input type="password" name="clave2" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</div>
	
</form>