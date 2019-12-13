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
        "dataSource" => $this->dataStore("mes"),
        "showFooter" => true,
        "columns" => array(
            "fecha" => array(
                "cssStyle" => array("text-align:center", "vertical-align:middle"),
                "label" => "Fecha",
                "type" => "datetime",
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
                "type" => "datetime",
                "format" => "Y-m-d",
                "displayFormat" => "d",
            ),
            "totalventa" => array(
                "label" => "Ventas Totales",
                "prefix" => "S/. ",
                "decimals" => 2
            ),
        ),
        "colorScheme" => array(
            "#c2cad0",
        )
    ));
    ?>
</div>


<div class="col-md-10 offset-md-1">
    <?php
    \koolreport\widgets\google\DonutChart::create(array(
        "dataSource" => $this->dataStore('result'),
        "columns" => array(
            "fecha" => array(
                "label" => "Fecha",
                "type" => "datetime",
                "format" => "Y-m-d",
                "displayFormat" => "d",
            ),
            "totalventa" => array(
                "label" => "Ventas Totales",
                "prefix" => "S/. ",
                "decimals" => 2
            ),
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
                "type" => "datetime",
                "format" => "Y-m-d",
                "displayFormat" => "d",
            ),
            "totalventa" => array(
                "label" => "Ventas Totales",
                "prefix" => "S/. ",
                "decimals" => 2
            ),
        ),
        "colorScheme" => array(
            "#e7717d",
        )
    ));
    ?>
</div>