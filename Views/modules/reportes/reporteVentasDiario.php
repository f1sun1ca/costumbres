<div class="container col-md-9"><br>
    <div class="col-md-12" align="center">
        <h1>Reporte de Ventas Diario</h1>
        <br>
    </div>
    <div class="col-md-12" id="formulario">

        <form method="post">

            <div class="row col-md-12 mb-2">

                <div class="col-md-10 row offset-md-3">
                    <div class="col-md-6">
                        <i class="fa fa-calendar"> </i> Día:
                        <input type="date" name="fechaDia" id="" class="form-control" required="">
                    </div>
                    <div class="col-md-2 my-1">
                        <input type="submit" name="reporteVenta" value="Consultar" class="w-100 h-100 btn btn-primary" id="consulta">
                    </div>

                </div>

        </form>
    </div>
    <?php
    require_once "vendor/autoload.php";

    class ReporteVentasDiario extends \koolreport\KoolReport
    {

        protected function settings()
        {
            return array(
                "dataSources" => array(
                    "restaurant" => array(
                        "connectionString" => "mysql:host=localhost;dbname=restaurant",
                        "username" => "root",
                        "password" => "",
                        "charset" => "utf8"
                    )
                )
            );
        }

        protected function setup()
        {
            $this->src("restaurant")
                ->query("
                    SELECT usuarios.nombre,
                        COUNT(detalles.mesa) as mesas,
                        SUM(detalles.total) as totalventa
                    FROM detalles
                    JOIN usuarios ON usuarios.idusuario = detalles.idusuario
                    WHERE detalles.fecha = :fechaDia
                    GROUP BY usuarios.nombre
                ")
                ->params(array(
                    ":fechaDia" => $this->params["fechaDia"],
                ))
                ->pipe($this->dataStore("dia"));

            $this->src("restaurant")
                ->query("
                SELECT usuarios.nombre, SUM(detalles.total) as totalventa
                FROM detalles
                JOIN usuarios ON usuarios.idusuario = detalles.idusuario
                WHERE detalles.fecha = :fechaDia
                GROUP BY usuarios.nombre
                ")
                ->params(array(
                    ":fechaDia" => $this->params["fechaDia"],
                ))
                ->pipe($this->dataStore("result"));
        }
    }

    if (isset($_POST['reporteVenta'])) {
        date_default_timezone_set('America/Lima');
        $fechaDia = $_POST['fechaDia'];
    }

    if (!isset($fechaDia)) {
        echo "<center><h5>Por favor, seleccione Día</h5><br></center>";
    } else {
        echo "<div class='col-md-10 offset-md-1'><h5>Reportes de " . date("F d, Y", strtotime($fechaDia)) . '</h5></div><br>';
        $reporteVentas = new ReporteVentasDiario(
            array(
                "fechaDia" => "$fechaDia",
            )
        );
        $reporteVentas->run()->render();
    }
