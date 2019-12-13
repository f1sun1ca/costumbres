<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="assets/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="assets/css/estilos.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/chosen/chosen.min.css">

  <script src="assets/js/lib/jquery.js"></script>
  <script src="assets/js/lib/jquery.dataTables.js"></script>
  <script src="assets/js/lib/dataTables.bootstrap.min.js"></script>
  <script src="assets/js/lib/dataTables.responsive.min.js"></script>
  <script src="assets/js/lib/responsive.bootstrap.min.js"></script>
  <script src="assets/js/lib/jquery-ui.min.js"></script>
  <script src="assets/chosen/chosen.jquery.min.js"></script>
  <script src="assets/js/chosen.js"></script>
  <script src="assets/js/lib/bootstrap.js"></script>
  <script src="assets/js/lib/menu.js"></script>
  <script src="assets/js/calendario.js"></script>
  <title> Restaurante Costumbres </title>

</head>

<body>

  <nav class="navbar navbar-dark bg-warning">

    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>

    <div class="collapse navbar-toggleable-md" id="navbarResponsive">

      <ul class="nav navbar-nav">

        <li class="nav-item dropdown active">
          <a class="nav-link" href="index" id="responsiveNavbarDropdown"><i class="fa fa-table mr-1" aria-hidden="true"></i>Reservas</a>
        </li>

        <li class="nav-item dropdown active">
          <a class="nav-link" href="listadoProd" id="responsiveNavbarDropdown"><i class="fa fa-product-hunt mr-1" aria-hidden="true"></i>Productos</a>
        </li>

        <li class="nav-item dropdown active">
          <a class="nav-link" href="categorias" id="responsiveNavbarDropdown"><i class="fa fa-universal-access mr-1" aria-hidden="true"></i>Categorías</a>
        </li>

        <li class="nav-item dropdown active">
          <a class="nav-link" href="principalVentas" id="responsiveNavbarDropdown"><i class="fa fa-usd mr-1" aria-hidden="true"></i>Ventas</a>
        </li>

        <?php if ($_SESSION['nombreusuario'] == 'ADMIN' or $_SESSION['nombreusuario'] == 'admin') : ?>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-usd mr-1" aria-hidden="true"></i>Reportes</a>
            <div class="dropdown-menu" id="sub" aria-labelledby="responsiveNavbarDropdown">
              <a id="sub" class="dropdown-item" href="reporteUsuarios"><i class="btn btn-warning btn-sm fa mr-1"></i>Reporte Usuarios</a>
              <a id="sub" class="dropdown-item" href="reporteVentas"><i class="btn btn-warning btn-sm fa mr-1"></i>Reporte Ventas</a>
              <a id="sub" class="dropdown-item" href="reporteVentasAnual"><i class="btn btn-warning btn-sm fa mr-1"></i>Reporte Ventas Anual</a>
              <a id="sub" class="dropdown-item" href="reporteVentasMensual"><i class="btn btn-warning btn-sm fa mr-1"></i>Reporte Ventas Mensual</a>
              <a id="sub" class="dropdown-item" href="reporteVentasDiario"><i class="btn btn-warning btn-sm fa mr-1"></i>Reporte Ventas Diario</a>
            </div>
          </li>
        <?php endif ?>

        <!-- User  -->
        <li class="nav-item dropdown  nav-item active float-md-right">
          <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user mr-1" aria-hidden="true">&#160;</i><?php echo  ' ' . strtoupper($_SESSION['nombreusuario']); ?>&#160; &#160; &#160; </a>
          <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
            <?php if ($_SESSION['nombreusuario'] == 'ADMIN' or $_SESSION['nombreusuario'] == 'admin') : ?>
              <a class="dropdown-item" href="usuarios"><i class="btn btn-primary btn-sm fa mr-1"></i>Usuarios</a>
            <?php endif ?>
            <a class="dropdown-item" href="salir"><i class="btn btn-danger btn-sm fa mr-1"></i>Salir</a>
          </div>
        </li>

      </ul>

    </div>

  </nav>