<div class="container col-md-9"><br>

	<div class="row mb-1 mx-1">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><i class="fa fa-list mr-1"> </i> EDITAR LA CATEGORIA DE PRODUCTOS</li>
			</ol>
		</div>
	</div>

	<div class="mx-3">
		<form method="post">
			<div class="row">
				<?php
				$editar = new CategoriasController();
				$editar->editarCategoriasController();
				$editar->actualizarCategoriaController();
				?>
			</div>
		</form>
	</div>