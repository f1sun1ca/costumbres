<?php
require_once 'Views/modules/ventas/conexion.php';
$idusuario = $_GET['idusuario'];
$consulta = $conexion->query("SELECT * FROM usuarios WHERE idusuario = $idusuario");
?>


<div class="container col-md-9"><br>
	<ol class="breadcrumb mx-1">
		<li class="breadcrumb-item active"><i class="fa fa-list mr-1"> </i>EDITAR USUARIO</li>
	</ol>
	<div class="row mx-1">
		<div class="col-md-3"></div>
		<div class="col-md-6" align="center"><br>

			<form method="post">
				<?php foreach ($consulta as $row => $value) : ?>
					<input type="hidden" name="idusuario" value="<?php echo $value['idusuario'] ?>">
					<div class="form-group">
						<label for="formGroupExampleInput">Usuario</label>
						<input type="text" name="nombreusuario" class="form-control" id="formGroupExampleInput" value="<?php echo $value['nombreusuario'] ?>">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Nombre</label>
						<input type="text" name="nombre" class="form-control" id="formGroupExampleInput" value="<?php echo $value['nombre'] ?>">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Contraseña<br><span>(<i>Si no decea cambiar la contraseña deje el campo como está</i>)</span></label>
						<input type="password" name="password" class="form-control" id="formGroupExampleInput2" value="<?php echo $value['password'] ?>">
					</div>
					<br>
					<button type="submit" name="editarUsuario" class="btn btn-primary">Guardar</button>
			</form>
		<?php endforeach ?>
		</div>
		<div class="col-md-3"></div>

	</div>
	<br>
</div>

<?php

$eU = new UsuariosController();
$eU->editarUsuariosController();



?>