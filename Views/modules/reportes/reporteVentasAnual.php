<div class="container col-md-9"><br>
    <div class="col-md-12" align="center">
        <h1>Reporte de Ventas Anual</h1>
        <br>
    </div>
    <div class="col-md-12" id="formulario">

        <form method="post">

            <div class="row col-md-12 mb-2">

                <div class="col-md-10 row offset-md-3">
                    <div class="col-md-6">
                        <i class="fa fa-calendar"> </i> Año:
                        <input type="number" name="fechaAno" min="2018" max="<?php echo date("Y") ?>" id="" class="form-control" required="">
                    </div>
                    <div class="col-md-2 my-1">
                        <input type="submit" name="reporteVenta" value="Consultar" class="w-100 h-100 btn btn-primary" id="consulta">
                    </div>

                </div>

        </form>
    </div>
    <?php
    require_once "vendor/autoload.php";

    class ReporteVentasAnual extends \koolreport\KoolReport
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
                    SELECT COUNT( mesa) as mesas, SUM(total) as totalventa, EXTRACT(MONTH FROM fecha) as mes
                    FROM detalles
                    WHERE YEAR(fecha) = :fechaAno
                    GROUP BY mes
                ")
                ->params(array(
                    ":fechaAno" => $this->params["fechaAno"],
                ))
                ->pipe($this->dataStore("mes"));

            $this->src("restaurant")
                ->query("
                    SELECT EXTRACT(MONTH FROM fecha) as mes, SUM(total) as totalventa
                    FROM detalles
                    WHERE YEAR(fecha) = :fechaAno
                    GROUP BY mes
                ")
                ->params(array(
                    ":fechaAno" => $this->params["fechaAno"],
                ))
                ->pipe($this->dataStore("result"));
        }
    }

    if (isset($_POST['reporteVenta'])) {
        date_default_timezone_set('America/Lima');
        $fechaAno = $_POST['fechaAno'];
    }

    if (!isset($fechaAno)) {
        echo "<center><h5>Por favor, seleccione Año</h5><br></center>";
    } else {
        echo "<div class='col-md-10 offset-md-1'><h5>Reportes del " . $fechaAno . '</h5></div><br>';
        $reporteVentas = new ReporteVentasAnual(
            array(
                "fechaAno" => "$fechaAno",
            )
        );
        $reporteVentas->run()->render();
    }
