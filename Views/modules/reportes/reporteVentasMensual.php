<div class="container col-md-9"><br>
    <div class="col-md-12" align="center">
        <h1>Reporte de Ventas Mensual</h1>
        <br>
    </div>
    <div class="col-md-12 mx-2" id="formulario">

        <form method="post">

            <div class="row col-md-12 mb-2">

                <div class="col-md-10 row">
                    <div class="col-md-6">
                        <i class="fa fa-calendar"> </i> Año:
                        <input type="number" name="fechaAno" min="2018" max="<?php echo date("Y") ?>" id="" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                        <i class="fa fa-calendar"> </i> Mes:
                        <select name="fechaMes" id="" class="form-control" required="">
                            <option></option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 my-1">
                    <input type="submit" name="reporteVenta" value="Consultar" class="w-100 h-100 btn btn-primary" id="consulta">
                </div>

            </div>

        </form>
    </div>
    <?php
    require_once "vendor/autoload.php";

    class ReporteVentasMensual extends \koolreport\KoolReport
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
                    SELECT fecha, COUNT(DISTINCT mesa) as mesas, SUM(total) as totalventa
                    FROM detalles
                    WHERE YEAR(fecha) = :fechaAno AND MONTH(fecha) = :fechaMes
                    GROUP BY fecha
                ")
                ->params(array(
                    ":fechaAno" => $this->params["fechaAno"],
                    ":fechaMes" => $this->params["fechaMes"],
                ))
                ->pipe($this->dataStore("mes"));

            $this->src("restaurant")
                ->query("
                    SELECT fecha, SUM(total) as totalventa
                    FROM detalles
                    WHERE YEAR(fecha) = :fechaAno AND MONTH(fecha) = :fechaMes
                    GROUP BY fecha
                ")
                ->params(array(
                    ":fechaAno" => $this->params["fechaAno"],
                    ":fechaMes" => $this->params["fechaMes"],
                ))
                ->pipe($this->dataStore("result"));
        }
    }

    if (isset($_POST['reporteVenta'])) {
        date_default_timezone_set('America/Lima');
        $fechaAno = $_POST['fechaAno'];
        $fechaMes = $_POST['fechaMes'];
    }

    if (!isset($fechaAno)) {
        echo "<center><h5>Por favor, seleccione Mes y Año</h5><br></center>";
    } else {
        $num = 1;
        $suma = $fechaMes + $num;
        echo "<div class='col-md-10 offset-md-1'><h5>Reportes de " . date('F', strtotime("2019-" . $suma . "-00")) . " " .  $fechaAno . '</h5></div><br>';
        $reporteVentas = new ReporteVentasMensual(
            array(
                "fechaAno" => "$fechaAno",
                "fechaMes" => "$fechaMes",
            )
        );
        $reporteVentas->run()->render();
    }
