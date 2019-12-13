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
        "dataSource" => $this->dataStore("dia"),
        "showFooter" => true,
        "columns" => array(
            "nombre" => array(
                "cssStyle" => "text-align:center",
                "label" => "Nombre Usuario",
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
                "footerText" => "<b>Total de ventas:&nbsp;&nbsp;&nbsp; @value</b>",
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
    \koolreport\widgets\google\BarChart::create(array(
        "dataSource" => $this->dataStore('result'),
        "columns" => array(
            "nombre" => array(
                "cssStyle" => "text-align:center",
                "label" => "Nombre Usuario",
            ),
            "totalventa" => array(
                "label" => "Ventas Totales",
                "prefix" => "S/. ",
                "decimals" => 2
            ),
        ),
        "colorScheme" => array(
            "#c2b9b0",
            "#afd275"
        )
    ));
    ?>
</div>

<div class="col-md-10 offset-md-1">
    <?php
    \koolreport\widgets\google\DonutChart::create(array(
        "dataSource" => $this->dataStore('result'),
        "columns" => array(
            "nombre" => array(
                "cssStyle" => "text-align:center",
                "label" => "Nombre Usuario",
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