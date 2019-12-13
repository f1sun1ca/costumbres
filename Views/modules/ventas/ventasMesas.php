<?php
require 'Views/modules/ventas/conexion.php';
ob_start();



$tabla = $_GET['action'];
//echo $tabla;
//echo $id;
if (isset($_GET['idmesa'])) {
	$id = $_GET['idmesa'];

	$sql = $conexion->prepare("DELETE FROM $tabla WHERE idmesa = $id");
	$sql->execute();
	header("location:$tabla");
}

if (isset($_POST['agregarBebidas'])) {
	date_default_timezone_set('America/Lima');
	$fecha = $_POST['fecha'];
	// echo $fecha;
	$usu = $_POST['usuario'];
	$producto = $_POST['producto'];

	foreach ($producto as $key) {

		list($idproducto, $precio, $idcategoria) = explode('-', $key);

		$cantidad = $_POST[$idcategoria];

		if ($cantidad != 0) {

			// ¿echo "id es : ".  $idproducto.'<br>';
			// echo "el precio es:".$precio;

			$sql = $conexion->prepare("INSERT INTO $tabla (idproducto,precio,fecha ,idusuario, cantidad, subtotal)
										VALUES(:idproducto,:precio,:fecha,:idusuario,:cantidad,:subtotal) ");

			$subtotal = $precio * $cantidad;

			$sql->execute(array(
				':idproducto' => $idproducto,
				':precio' => $precio,
				':fecha' => $fecha,
				':idusuario' => $usu,
				':cantidad' => $cantidad,
				':subtotal' => $subtotal
			));
		}
	}

	header("location:$tabla");
}

if (isset($_POST['venta'])) {
	$sql = $conexion->prepare("INSERT INTO detalles (fecha,idusuario,mesa,total)
            SELECT ta.fecha,ta.idusuario,ta.mesa,SUM(ta.subtotal)
            FROM $tabla ta GROUP BY fecha, idusuario, mesa");
	$sql->execute();
	$sql = $conexion->prepare("DELETE FROM $tabla");
	$sql->execute();
	header("location:$tabla");
}

?>

<div class="container p-1" style="overflow: auto; ">
	<!-- height: 670px; -->
	<div class="row p-1">
		<div class="col-md-8">
			<h1><i class="fa fa-table mr-1" aria-hidden="true"> </i>Mesa <?php echo substr($tabla, -2); ?></h1>
		</div>
		<div class="col-md-4">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bebidas" data-whatever="@mdo"><i class="fa fa-plus-square pr-1"> </i> ADICIONAR PEDIDOS </button>
		</div>
		<br>
	</div>
	<?php require 'Views/modal/modal_agregar_productos.php'; ?>


	<!-- Verifica que tenga filas -->
	<?php $verif = $conexion->query("SELECT * FROM $tabla");  ?>
	<?php $verif2 = $verif->fetchAll(); ?>
	<?php if (empty($verif2)) : ?>
		<br><img src="assets/img/foto1.jpg" style="width:98%; height: 93%;">
	<?php else : ?>

		<?php $consult = $conexion->query("SELECT * FROM $tabla ta JOIN productos pro ON ta.idproducto = pro.idproducto  ");  ?>

		<div class="col-md-12">
			<table class="table table-bordered alert-success" id="imprimeme">
				<thead>
					<tr>
						<td align="center"><strong>ID mesa</strong></td>
						<td align="center"><strong>ID PRO.</strong></td>
						<td align="center"><strong>NOMBRE</strong></td>
						<td align="center"><strong>CANTIDAD</strong></td>
						<td align="center"><strong>PRECIO</strong></td>
						<td align="center"><strong>SUBTOTAL</strong></td>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($consult as $key) : ?>
						<tr>
							<td align="center"><?php echo $key['idmesa'] ?></td>
							<td align="center"><?php echo $key['idproducto'] ?></td>
							<td align="center"><?php echo $key['nombreproducto'] ?></td>
							<td align="center"><?php echo $key['cantidad'] ?></td>
							<td align="right"><?php echo $key['precio'] ?></td>
							<td align="right"><?php $stotal = $key['precio'] * $key['cantidad'];
														echo number_format("$stotal", 2); ?></td>
							<td>
								<a href="index.php?action=<?php echo $tabla ?>&idmesa=<?php echo $key['idmesa']  ?>" class="pull-right">
									<i class="fa fa-trash-o btn btn-danger btn-sm"></i>
								</a>
							</td>
						</tr>

					<?php endforeach ?>
					<tr>
						<td colspan="5" align="right"><strong>TOTAL</strong></td>
						<?php $total = $conexion->prepare("SELECT  SUM(subtotal) AS TOTAL FROM $tabla");
							$total->execute();
							foreach ($total as $key) {
								$result = $key['TOTAL'];
							} ?>
						<td align="right"><strong>S/. <?php echo $result; ?></strong></td>
					</tr>
				</tbody>
			</table>
		</div>

		<?php

			$sql = $conexion->prepare("SELECT * FROM $tabla,usuarios ");
			$sql->execute();
			?>
		<form method="post">
			<?php foreach ($sql as $key) : ?>
				<input type="hidden" name="fecha[]" value="<?php echo date("Y-m-d"); ?>">
				<input type="hidden" name="idproducto[]" value="<?php echo $key['idproducto'] ?>">
				<input type="hidden" name="precio[]" value="<?php echo $key['precio'] ?>">
				<input type="hidden" name="idusuario[]" value="<?php echo $key['idusuario'] ?>">
			<?php endforeach; ?>
			<div class="row m-1">
				<div class="col-md-8">
				</div>
				<div class="col-md-4">
					<input type="submit" class="btn btn-danger w-100" name="venta" value="FINALIZAR VENTA">
				</div>
			</div>
		</form>

	<?php endif; ?>
</div>
<script>
	function imprimir() {
		var objeto = document.getElementById('imprimeme'); //obtenemos el objeto a imprimir
		var ventana = window.open('', '_blank'); //abrimos una ventana vacía nueva
		ventana.document.write(objeto.innerHTML); //imprimimos el HTML del objeto en la nueva ventana
		ventana.document.close(); //cerramos el documento
		ventana.print(); //imprimimos la ventana
		ventana.close(); //cerramos la ventana
	}
</script>