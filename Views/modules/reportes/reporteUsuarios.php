<div class="container col-md-9"><br>
    <div class="col-md-12" align="center">
        <h1>Reporte de Usuarios</h1>
        <br>
    </div>
    <div class="col-md-12 mx-2" id="formulario">

        <form method="post">

            <div class="row col-md-12 mb-2">

                <div class="col-md-10 row">
                    <div class="col-md-6">
                        <i class="fa fa-calendar"> </i> Fecha Inicial :
                        <input type="date" name="fechaInicial" id="" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                        <i class="fa fa-calendar"> </i> Fecha Final :
                        <input type="date" name="fechaFinal" id="" class="form-control" required="">
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

    class ReporteUsuarios extends \koolreport\KoolReport
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
                        COUNT(DISTINCT detalles.fecha) as dias,
                        COUNT(detalles.mesa) as mesas,
                        AVG(detalles.total) as promedio,
                        SUM(detalles.total) as totalventa
                    FROM detalles
                    JOIN usuarios ON usuarios.idusuario = detalles.idusuario
                    WHERE detalles.fecha BETWEEN :fechaInicial AND :fechaFinal
                    GROUP BY usuarios.nombre
                    ORDER BY totalventa desc
                ")
                ->params(array(
                    ":fechaInicial" => $this->params["fechaInicial"],
                    ":fechaFinal" => $this->params["fechaFinal"],
                ))
                ->pipe($this->dataStore("usuario"));

            $this->src("restaurant")
                ->query("
                    SELECT usuarios.nombre, SUM(detalles.total) as totalventa
                    FROM detalles
                    JOIN usuarios ON usuarios.idusuario = detalles.idusuario
                    WHERE detalles.fecha BETWEEN :fechaInicial AND :fechaFinal
                    GROUP BY usuarios.nombre
                    ORDER BY totalventa desc
                ")
                ->params(array(
                    ":fechaInicial" => $this->params["fechaInicial"],
                    ":fechaFinal" => $this->params["fechaFinal"],
                ))
                ->pipe($this->dataStore("result"));
        }
    }

    if (isset($_POST['reporteVenta'])) {
        date_default_timezone_set('America/Lima');
        $fechaInicial = date('Y-m-d', strtotime($_POST['fechaInicial']));
        $fechaFinal   = date('Y-m-d', strtotime($_POST['fechaFinal']));
    }

    if (!isset($fechaInicial) && !isset($fechaFinal)) {
        echo "<center><h5>Por favor, seleccione rango de fechas</h5><br></center>";
    } elseif ($fechaInicial > $fechaFinal) {
        echo "<h5><center>Error en la selección, por favor reingrese rango de fechas</h5><br></center>";
    } else {
        echo "<div class='col-md-10 offset-md-1'><h5>Reportes del " . date("d M Y", strtotime($fechaInicial)) . " al " . date("d M Y", strtotime($fechaFinal)) . '</h5></div><br>';
        $reporteUsuarios = new ReporteUsuarios(
            array(
                "fechaInicial" => $fechaInicial,
                "fechaFinal" => $fechaFinal
            )
        );
        $reporteUsuarios->run()->render();
    }
