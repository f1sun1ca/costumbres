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
        "dataSource" => $this->dataStore("ventas"),
        "showFooter" => true,
        "columns" => array(
            "mes" => array(
                "cssStyle" => "text-align:center",
                "label" => "Mes",
                "type" => "datetime",
                "format" => "m",
                "displayFormat" => "F",
            ),
            "fecha" => array(
                "cssStyle" => "text-align:center",
                "label" => "Fecha",
                "format" => "Y-m-d",
                "displayFormat" => "d/m/Y",
            ),

            "mesas" => array(
                "cssStyle" => "text-align:center",
                "label" => "Mesas atendidas",
                "footer" => "sum",
                "footerText" => "<b>Total de mesas:&nbsp;&nbsp; @value</b>",
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
        "removeDuplicate" => array("mes"),
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
    \koolreport\widgets\google\ColumnChart::create(array(
        "dataSource" => $this->dataStore('result'),
        "columns" => array(
            "fecha" => array(
                "label" => "Fecha",
                "format" => "Y-m-d",
                "displayFormat" => "M d, Y",
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

<div class="col-md-10 offset-md-1">
    <?php
    \koolreport\widgets\google\AreaChart::create(array(
        "dataSource" => $this->dataStore('result'),
        "columns" => array(
            "fecha" => array(
                "label" => "Fecha",
                "format" => "Y-m-d",
                "displayFormat" => "M d, Y",
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