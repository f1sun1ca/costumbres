<?php

class Paginas
{

	public static function enlacesPaginasModel($enlaces)
	{
		// =============================================================
		// enlacesde ventas
		// =============================================================

		if ($enlaces == "principalVentas"  || $enlaces == 'buscar') {

			$module =  "Views/modules/ventas/" . $enlaces . ".php";
		} else if ($enlaces == "mesa01") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa02") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa03") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa04") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa05") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa06") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa07") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa08") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa09") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa10") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa11") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa12") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa13") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa14") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa15") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa16") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa17") {

			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "mesa18") {


			$module =  "Views/modules/ventas/principalVentas.php";
		} else if ($enlaces == "ventasDiarias") {

			$module =  "Views/modules/ventas/ventasDiarias/ventasDiarias.php";
		} else if ($enlaces == "imprimir") {

			$module =  "Views/modules/ventas/imprimir.php";
		}

		// =============================================================
		// enlaces de los reportes
		// =====================================================


		else if ($enlaces == "reporteUsuarios") {
			$module = "Views/modules/reportes/reporteUsuarios.php";
		} else if ($enlaces == "reporteVentas") {
			$module = "Views/modules/reportes/reporteVentas.php";
		} else if ($enlaces == "reporteVentasMensual") {
			$module = "Views/modules/reportes/reporteVentasMensual.php";
		} else if ($enlaces == "reporteVentasAnual") {
			$module = "Views/modules/reportes/reporteVentasAnual.php";
		} else if ($enlaces == "reporteVentasDiario") {
			$module = "Views/modules/reportes/reporteVentasDiario.php";
		}


		// =============================================================
		// enlaces del las login
		// =====================================================


		else if ($enlaces == "login") {

			$module =  "Views/login/login.php";
		}


		// =============================================================
		// enlaces del las reservas
		// =====================================================

		else if ($enlaces == "reservas" || $enlaces == "index") {

			$module =  "Views/reservas/reservas.php";
		} else if ($enlaces == "okReservas") {

			$module =  "Views/reservas/reservas.php";
		} else if ($enlaces == "borrarReservas") {

			$module =  "Views/reservas/reservas.php";
		} else if ($enlaces == "buscarReservas") {

			$module =  "Views/reservas/buscarReservas.php";
		} else if ($enlaces == "editarReservas") {

			$module =  "Views/reservas/editarReservas.php";
		} else if ($enlaces == "cambioReservas") {

			$module =  "Views/reservas/Reservas.php";
		}







		// =============================================================
		// enlaces del las usuario
		// =====================================================

		else if ($enlaces == "salir") {

			$module =  "Views/modules/usuarios/salir.php";
		} else if ($enlaces == "usuarios") {

			$module =  "Views/modules/usuarios/usuarios.php";
		} else if ($enlaces == "okUsuario") {

			$module =  "Views/modules/usuarios/usuarios.php";
		} else if ($enlaces == "okBorrado") {

			$module =  "Views/modules/usuarios/usuarios.php";
		} else if ($enlaces == "editarUsuarios") {

			$module =  "Views/modules/usuarios/editarUsuarios.php";
		} else if ($enlaces == "okEdiatdoUsuarios") {

			$module =  "Views/modules/usuarios/usuarios.php";
		}



		// =============================================================
		// enlaces del los Productos
		// =====================================================

		else if ($enlaces == "listadoProd") {

			$module =  "Views/modules/productos/listadoProd.php";
		} else if ($enlaces == "okProductos") {

			$module =  "Views/modules/productos/listadoProd.php";
		} else if ($enlaces == "borrarProductos") {

			$module =  "Views/modules/productos/listadoProd.php";
		} else if ($enlaces == "editarProductos") {

			$module =  "Views/modules/productos/editarProductos.php";
		} else if ($enlaces == "okEditar") {
			$module =  "Views/modules/productos/listadoProd.php";
		}





		// =============================================================
		// enlaces del las CATEGORIAS
		// =====================================================

		else if ($enlaces == "categorias") {

			$module =  "Views/modules/categorias/categorias.php";
		} else if ($enlaces == "okCategorias") {

			$module =  "Views/modules/categorias/categorias.php";
		} else if ($enlaces == "borrarCat") {

			$module =  "Views/modules/categorias/borrarCategorias.php";
		} else if ($enlaces == "editarcategoria") {

			$module =  "Views/modules/categorias/editarCategorias.php";
		} else if ($enlaces == "okEdit") {

			$module =  "Views/modules/categorias/categorias.php";
		} else if ($enlaces == "borrarCategorias") {

			$module =  "Views/modules/categorias/categorias.php";
		} else {

			$module =  "Views/reservas/reservas.php";
		}

		return $module;
	}
	#--------------------------------------------------------
	#enlaces de la aplicacion 



}
