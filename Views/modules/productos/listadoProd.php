<div class="container col-md-9" style="overflow: auto; height: 100%;"><br>
	<?php
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'okProductos') {
			echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            El producto fue agregado exitosamente.
			</div>
        </center>';
		}

		if ($_GET['action'] == 'okEditar') {
			echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            El producto fue editado exitosamente.
          </div>
        </center>';
		}

		if ($_GET['action'] == 'borrarProductos') {
			echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            El producto fue eliminado exitosamente.
          </div>
        </center>';
		}
	}

	?>
	<div class="row mb-1 mx-1">
		<div class="col-md-8">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><i class="fa fa-list mr-1"> </i> LISTADO DE PRODUCTOS</li>
			</ol>
		</div>
		<div class="col-md-4">
			<button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#productos" data-whatever="@mdo">
				<i class="fa fa-plus mr-1"> </i> Registrar nuevo producto
			</button>
			<?php require 'Views/modal/modal_productos.php'; ?>
		</div>
	</div>
	<div class="mx-3">
		<table class="table table-bordered table-hover dt-responsive" id="tablaProductos">
			<thead class="bg-danger">
				<tr>
					<td class="td" align="center">ID</td>
					<td class="td" align="center">NOMBRE</td>
					<td class="td" align="center">CATEGORIA</td>
					<td class="td" align="center">PRECIO</td>
					<td class="td" align="center">ACCIONES</td>
				</tr>
			</thead>

			<?php
			$prod = new ProductosController();
			$prod->getProductosController();
			$prod->deleteProductosController();
			?>

		</table>
		<br>
	</div>
</div>