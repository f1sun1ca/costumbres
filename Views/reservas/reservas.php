<div class="container col-md-9"><br>

  <?php
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'okReservas') {
      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            La reserva fue agregada exitosamente.
          </div>
        </center>';
    }

    if ($_GET['action'] == 'borrarReservas') {
      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            La reserva fue eliminada exitosamente.
          </div>
        </center>';
    }
  }

  if ($_GET['action'] == 'cambioReservas') {
    echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            La reserva fue editada exitosamente.
          </div>
        </center>';
  }


  ?>
  <div class="">
    <!-- class card -->

    <div class="row mb-1 mx-1">

      <div class="col-md-8">
        <ol class="breadcrumb breadcrumb-item active w-100">
          <li class="breadcrumb-item active mr-3"><i class="fa fa-list mr-1"> </i> LISTADO DE RESERVAS </li>
          <div align="right">
            [ ACTIVAS :
            <?php $vistaReservas = new MvcController();
            $vistaReservas->totalReservasController();
            ?> ]&#160;&#160;&#160;
          </div>
        </ol>
      </div>

      <div class="col-md-4">
        <div class="">
          <?php require 'Views/modal/modal_reserva.php'; ?>
          <button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#reserva" data-whatever="@mdo">
            Hacer nueva reserva
          </button>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-md-10 mx-2">
        <form method="post" class="" action="index.php?action=buscarReservas">
          <div class="row mx-1">
            <div class="col-md-6">
              <input type="date" class="form-control" id="" name="buscar" required="" value="<?php echo date('Y-m-d') ?>">
            </div>
            <div class="col-md-3">
              <input type="submit" name="submit" class="btn btn-info w-100" value="Buscar">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card-block mx-1">
      <table class="table table-bordered">
        <thead class="thead">
          <tr>
            <td align="center">Dia</td>
            <td align="center">Hora</td>
            <td align="center">Comensales</td>
            <td align="center">Cliente</td>
            <td align="center">DNI</td>
            <td align="center">Teléfono</td>
            <td align="center">Acciones</td>
          </tr>
        </thead>

        <tbody>
          <?php
          $vistaUsuario = new MvcController();
          $vistaUsuario->getReservasController();
          $vistaUsuario->deleteReservasController();
          ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
</div>
</div>

</div>