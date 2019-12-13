<style>
    .cssHeader {
        background-color: #e9ffe8;
    }

    .cssItem {
        background-color: #fdffe8;
    }
</style>

<div class="col-md-10 offset-md-1">
    <?php
    \koolreport\widgets\koolphp\Table::create(array(
        "dataSource" => $this->dataStore('usuario'),
        "showFooter" => true,
        "columns" => array(
            "nombre" => array(
                "cssStyle" => "text-align:center",
                "label" => "Nombre de usuario",
            ),
            "dias" => array(
                "cssStyle" => "text-align:center",
                "label" => "Días trabajados",
            ),
            "mesas" => array(
                "cssStyle" => "text-align:center",
                "label" => "Mesas atendidas",
            ),
            "promedio" => array(
                "label" => "Ventas por día",
                "prefix" => "S/. ",
                "decimals" => 2,
                "cssStyle" => "text-align:right",
            ),
            "totalventa" => array(
                "label" => "Ventas Totales",
                "prefix" => "S/. ",
                "cssStyle" => "text-align:right",
                "footer" => "sum",
                "footerText" => "<b>Total: @value</b>",
                "decimals" => 2
            ),
        ),
        "cssClass" => array(
            "table" => "table-bordered table-striped table-hover",
            "th" => "cssHeader",
            "tr" => "cssItem"
        ),
    ));
    ?>
</div>

<div class="col-md-10 offset-md-1">
    <?php
    \koolreport\widgets\google\BarChart::create(array(
        "dataSource" => $this->dataStore('result'),
        "columns" => array(
            "nombre" => array(
                "label" => "Nombre de usuario"
            ),
            "totalventa" => array(
                "label" => "Ventas totales"
            )
        ),
        "colorScheme" => array(
            "#afd275"
        )
    ));
    ?>
</div>

<div class="col-md-11 offset-md-1">
    <?php
    \koolreport\widgets\google\DonutChart::create(array(
        "dataSource" => $this->dataStore('result'),
        "columns" => array(
            "nombre" => array(
                "label" => "Nombre de usuario"
            ),
            "totalventa" => array(
                "label" => "Ventas totales"
            )
        ),
        "colorScheme" => array(
            "#e7717d",
            "#c2cad0",
            "#c2b9b0",
            "#7e685a",
            "#afd275"
        )
    ));
    ?>
</div>