<div class="modal fade bd-example-modal-lg" id="reserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header m-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">Nueva Reserva</h4>
      </div>
      <div class="modal-body m-1">

        <form method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Cliente:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombrecliente" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Fecha Reserva:</label>
                <input type="date" min="<?php echo date('Y-m-d') ?>" class="form-control" id="recipient-name" name="diallegada" required="" value="<?php echo date('Y-m-d') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class=" col-md-6">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Documento de Identidad:</label>
                <input type="number" class="form-control" id="recipient-name" name="dni" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Hora de Reserva:</label>
                <input type="text" class="form-control" id="recipient-name" name="horallegada" required="" value="<?php echo date('H:i') ?>"">
              </div>
            </div>
          </div>
          <div class=" row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Telefono de Contacto:</label>
                    <input type="text" class="form-control" id="recipient-name" name="telefono" required="">
                  </div>
                </div>
                <div class=" col-md-6">
                  <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Cantidad de Personas:</label>
                    <input type="number" min="1" max="6" class="form-control" id="recipient-name" name="cantidadpersonas" required="" value="1">
                  </div>
                </div>
                <input type="hidden" name="idusuario" value="<?php echo $_SESSION['nombreusuario']; ?>">
              </div>
            </div>
            <div class="modal-footer m-1">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" name="agregar">Agregar Reserva</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php
$registrar = new MvcController();
$registrar->agregarReservaController();
?>