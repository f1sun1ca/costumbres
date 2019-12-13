<?php

require_once 'Views/modules/ventas/conexion.php';


date_default_timezone_set('America/Lima');
if (isset($_POST['submit'])) {
	$buscar = $_POST['buscar'];
	$buscar = date("Y-m-d", strtotime($buscar));
	// echo "$buscar";
	$sql = $conexion->prepare("SELECT * FROM reservas WHERE diallegada LIKE :diallegada OR nombrecliente LIKE :nombrecliente");
	$resultado = $sql->execute(array(
		':diallegada' => "%$buscar%",
		':nombrecliente' => "%$buscar%"
	));
	$resultado = $sql->fetchAll(PDO::FETCH_OBJ);
	if (empty($resultado)) {
		$titulo = 'No se encontraron reservas el día  : '  . date("d-m-Y", strtotime($buscar));
	} else {
		$titulo = 'Reservas del día : '  . date("d-m-Y", strtotime($buscar));
	}
}

?>

<div class="container col-md-9"><br>
	<div class="mx-1">
		<ol class="breadcrumb">
			<div class="row">
				<div class="col-md-9">
					<h3>
						<li class="breadcrumb-item active"> <?php echo $titulo; ?></li>
					</h3>
				</div>
				<div class="col-md-3" align="right">
					<a class="" href="reservas"><i class="fa fa-undo mr-1" aria-hidden="true"></i>Volver Reservas</a>
				</div>
			</div>
		</ol>
		<table class="table table-bordered">
			<thead class="thead">
				<td align="center">Dia Reserva</td>
				<td align="center">Hora Arrivo</td>
				<td align="center">Comensales</td>
				<td align="center">Nombre Cliente</td>
				<td align="center">DNI</td>
				<td align="center">Teléfono</td>
				<td align="center">Acciones</td>
			</thead>
			<?php foreach ($resultado as $resultados) : ?>

				<tbody>
					<td align="center" class=" alert-danger"><?php echo date("d-m-Y", strtotime($resultados->diallegada)); ?></td>
					<td align="center" class=" alert-danger" align="center"><?php echo date("H:i", strtotime($resultados->horallegada)); ?></td>
					<td align="center" class=" alert-danger" align="center"><?php echo $resultados->cantidadpersonas; ?></td>
					<td align="center" class=" alert-danger"><?php echo $resultados->nombrecliente; ?></td>
					<td align="center" class=" alert-danger"><?php echo $resultados->dni; ?></td>
					<td align="center" class=" alert-danger"><?php echo $resultados->telefono; ?></td>
					<td align="center" class=" alert-danger">&nbsp; &nbsp;
						<a href="index.php?action=editarReservas&idreserva=<?php echo $resultados->idreserva; ?>"><i class="fa fa-edit btn btn-primary btn-sm "></i></a>
						<a href="index.php?action=reservas&idBorrar=<?php echo $resultados->idreserva; ?>" <i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
				</tbody>
			<?php endforeach; ?>
		</table>
	</div><br>
</div>