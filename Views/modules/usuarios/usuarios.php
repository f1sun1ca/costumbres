<div class="container col-md-9"><br>
	<ol class="breadcrumb mx-1">
		<li class="breadcrumb-item active"><i class="fa fa-list mr-1"> </i>LISTADO DE USUARIOS</li>
	</ol>
	<?php

	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'okUsuario') {
			echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            El usuario fue agregado exitosamente
          </div>
        </center>';
		}

		if ($_GET['action'] == 'okBorrado') {
			echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            El usuario fue eliminado exitosamente
          </div>
        </center>';
		}

		if ($_GET['action'] == 'okEdiatdoUsuarios') {
			echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            El usuario fue editado exitosamente
          </div>
        </center>';
		}
	}


	?>

	<center>
		<!--  <button class="btn btn-primary" data-toggle="modal" data-target="#usuarios">
			<i class="fa fa-user"> </i> Nuevo Usuario
			 </button> -->
		<ul class="nav nav-tabs mx-1">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="modal" data-target="#usuarios" href="#"><i class="fa fa-user btn btn-outline-info btn-sm"> </i> Nuevo Usuario</a>
			</li>

		</ul>
		<br>
		<div class="row mx-1">

			<div class="col-md-12">
				<table class="table table-bordered" id="tablaProductos">
					<thead class="bg-primary">
						<tr>
							<td class="usuarios" align="center">Usuario</td>
							<td class="usuarios" align="center">Nombre</td>
							<td class="usuarios" align="center">Fecha Creado</td>
							<td class="usuarios" align="center">Acciones</td>
						</tr>
					</thead>
					<tbody>
						<?php
						$usuarios = new UsuariosController();
						$usuarios->getUsuariosController();
						?>
					</tbody>
				</table><br>
			</div>

		</div>

		<?php require 'Views/modal/modal_usuarios.php'; ?>
</div>