<div class="container col-md-9" style=" height: 100%;">
	<div class="row">
		<div class="col-md-3 pt-1">
			<center>
				<h4>Seleccionar Mesa</h4>
			</center>
			<div class="row p-1">
				<div class="col-md-6" role="toolbar" aria-label="Toolbar with a groups">
					<a href="mesa01" class="btn btn-success w-100 mb-1">MESA 01</a>
					<a href="mesa03" class="btn btn-success w-100 mb-1">MESA 03</a>
					<a href="mesa05" class="btn btn-success w-100 mb-1">MESA 05</a>
					<a href="mesa07" class="btn btn-success w-100 mb-1">MESA 07</a>
					<a href="mesa09" class="btn btn-success w-100 mb-1">MESA 09</a>
					<a href="mesa11" class="btn btn-success w-100 mb-1">MESA 11</a>
					<a href="mesa13" class="btn btn-success w-100 mb-1">MESA 13</a>
					<a href="mesa15" class="btn btn-success w-100 mb-1">MESA 15</a>
					<a href="mesa17" class="btn btn-success w-100 mb-1">MESA 17</a>
				</div>
				<div class="col-md-6" role="toolbar" aria-label="Toolbar with a groups">
					<a href="mesa02" class="btn btn-success w-100 mb-1">MESA 02</a>
					<a href="mesa04" class="btn btn-success w-100 mb-1">MESA 04</a>
					<a href="mesa06" class="btn btn-success w-100 mb-1">MESA 06</a>
					<a href="mesa08" class="btn btn-success w-100 mb-1">MESA 08</a>
					<a href="mesa10" class="btn btn-success w-100 mb-1">MESA 10</a>
					<a href="mesa12" class="btn btn-success w-100 mb-1">MESA 12</a>
					<a href="mesa14" class="btn btn-success w-100 mb-1">MESA 14</a>
					<a href="mesa16" class="btn btn-success w-100 mb-1">MESA 16</a>
					<a href="mesa18" class="btn btn-success w-100 mb-1">MESA 18</a>
				</div>
				<div class="col-md-12">
					<a href="principalVentas" class="btn btn-warning w-100">Salir de Mesa</a>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<?php
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'mesa01') {
					include 'mesas/mesa01.php';
				} else if ($_GET['action'] == 'mesa02') {
					include 'mesas/mesa02.php';
				} else if ($_GET['action'] == 'mesa03') {
					include 'mesas/mesa03.php';
				} else if ($_GET['action'] == 'mesa04') {
					include 'mesas/mesa04.php';
				} else if ($_GET['action'] == 'mesa05') {
					include 'mesas/mesa05.php';
				} else if ($_GET['action'] == 'mesa06') {
					include 'mesas/mesa06.php';
				} else if ($_GET['action'] == 'mesa07') {
					include 'mesas/mesa07.php';
				} else if ($_GET['action'] == 'mesa08') {
					include 'mesas/mesa08.php';
				} else if ($_GET['action'] == 'mesa09') {
					include 'mesas/mesa09.php';
				} else if ($_GET['action'] == 'mesa10') {
					include 'mesas/mesa10.php';
				} else if ($_GET['action'] == 'mesa11') {
					include 'mesas/mesa11.php';
				} else if ($_GET['action'] == 'mesa12') {
					include 'mesas/mesa12.php';
				} else if ($_GET['action'] == 'mesa13') {
					include 'mesas/mesa13.php';
				} else if ($_GET['action'] == 'mesa14') {
					include 'mesas/mesa14.php';
				} else if ($_GET['action'] == 'mesa15') {
					include 'mesas/mesa15.php';
				} else if ($_GET['action'] == 'mesa16') {
					include 'mesas/mesa16.php';
				} else if ($_GET['action'] == 'mesa17') {
					include 'mesas/mesa17.php';
				} else if ($_GET['action'] == 'mesa18') {
					include 'mesas/mesa18.php';
				} else {
					echo '<br><img src="assets/img/foto1.jpg" style="width:98%; height: 93%;">';
				}
			}
			?>
		</div>

	</div>
</div>