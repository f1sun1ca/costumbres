<div class="container col-md-9" style="overflow: auto; height: 100%;"><br>

  <?php
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'okCategorias') {
      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            El categoría fue agregada exitosamente.
          </div>
        </center>';
    }
  }

  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'borrarCategorias') {
      echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            El categoría fue eliminada exitosamente.
          </div>
        </center>';
    }
  }
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'okEdit') {
      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            El categoría fue editada exitosamente.
          </div>
        </center>';
    }
  }
  ?>
  <div class="row mb-1 mx-1">
    <div class="col-md-8">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fa fa-list mr-1"> </i> LISTADO DE CATEGORIAS DE PRODUCTOS</li>
      </ol>
    </div>
    <div class="col-md-4">
      <button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#categorias" data-whatever="@mdo">
        <i class="fa fa-plus mr-1"> </i> Registrar nueva categoría
      </button>
    </div>
  </div>

  <div class="mx-3">

    <table class="table table-bordered table-hover dt-responsive" id="tablaProductos">
      <thead class="bg-primary">
        <tr>
          <td class="td" align="center">ID</td>
          <td class="td" align="center">NOMBRE</td>
          <td class="td" align="center">ACCIONES</td>
        </tr>
      </thead>
      <?php

      $categorias = new CategoriasController();
      $categorias->getCategoriasController();
      $categorias->deleteCategoriasController();
      ?>

    </table>
    <br>

  </div>



</div>
<?php require 'Views/modal/modal_categorias.php'; ?>