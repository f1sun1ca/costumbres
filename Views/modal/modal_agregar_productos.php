<div class="modal fade" id="bebidas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header mx-1">
        <h4 class="modal-title" id="exampleModalLabel">Agregar a la Mesa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-1">

        <form method="post">

          <?php $con = $conexion->query("SELECT * FROM categorias");  ?>
          <?php foreach ($con as $cat) : ?>

            <div class="row">

              <!-- seleccionar categoria -->
              <div class="col-md-9">
                <?php $consul = $conexion->query("SELECT * FROM usuarios");  ?>
                <?php foreach ($consul as $key) : ?>
                  <?php if ($key['nombreusuario'] == $_SESSION['nombreusuario']) : ?>
                    <input type="hidden" name="usuario" value="<?php echo $key['idusuario'] ?>">
                  <?php endif; ?>
                <?php endforeach ?>
                <?php
                  $consul = $conexion->query(
                    "SELECT * FROM productos pro JOIN categorias cat ON pro.idcategoria = cat.idcategoria
                WHERE nombrecategoria= '" . $cat['nombrecategoria'] . "'  order by nombreproducto asc"
                  );
                  ?>

                <select class="form-control chosen-select" id="idcategoria" name="producto[]">
                  <option value="" required="">SELECCIONAR <?php echo strtoupper($cat['nombrecategoria']) ?></option>
                  <?php foreach ($consul as $fila) : ?>
                    <option value="<?php echo $fila['idproducto'] . '-' .  $fila['precio'] . '-' .  $fila['idcategoria'] ?>"> <?php echo ucwords($fila['nombreproducto']) ?>
                    </option>
                  <?php endforeach ?>
                </select>

              </div>
              <!-- seleccionar cantidad -->
              <div class="col-md-3">
                <input class="form-control" type="number" min="0" name="<?php echo $cat['idcategoria'] ?>" value="0" />
              </div>

            </div>
            <br>
            <input type="hidden" name="fecha" value="<?php echo  date('Y-m-d') ?>">

          <?php endforeach ?>
          <div class="col-md-12">
            <button type="submit" name="agregarBebidas" id="agregarBebidas" class="btn btn-primary w-100">Agregar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>