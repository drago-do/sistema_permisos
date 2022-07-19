<?php
require_once("./../CRUDPHP/crud.php");
$nuevaConsulta = CrudPHP::singleton();

$idLicencia = $_POST['idLicencia'];
$id_expediente = $_POST['id_expediente'];
$fecha = $_POST['fecha'];
$nombre = $_POST['nombre'];
$denominacion = $_POST['denominacion'];
$rfc = $_POST['rfc'];
$ctaPredial = $_POST['ctaPredial'];
$ctaAgua = $_POST['ctaAgua'];
$datosFiscales = $_POST['datosFiscales'];
$horaApertura = $_POST['horaApertura'];
$horaCierre = $_POST['horaCierre'];
$diaLunes = $_POST['diaLunes'];
$diaMartes = $_POST['diaMartes'];
$diaMiercoles = $_POST['diaMiercoles'];
$diaJueves = $_POST['diaJueves'];
$diaViernes = $_POST['diaViernes'];
$diaSabado = $_POST['diaSabado'];
$diaDomingo = $_POST['diaDomingo'];
$calle = $_POST['calle'];
$colonia = $_POST['colonia'];
$giro = $_POST['giro'];
$ventaAlcohol = $_POST['ventaAlcohol'];
$detallesGiro = $_POST['detallesGiro'];
$costoApertura = $_POST['costoApertura'];
$observaciones = $_POST['observaciones'];
$concepto = "APERTURA";

$giro = $nuevaConsulta->obtenerIdDeGiro($giro);
$giro = $giro[0]['id_giro'];

$colonia = $nuevaConsulta->obtenerIdDeColonia($colonia);
$colonia = $colonia[0]['id_colonia'];

$nuevaConsulta->insertarNuevaLicencia($idLicencia, $nombre, $denominacion, $rfc, $ctaPredial, $ctaAgua, $datosFiscales, $giro, $detallesGiro, $ventaAlcohol, $observaciones);

$nuevaConsulta->realizarPagoARegistroExistente($id_expediente, $concepto, $costoApertura);

$nuevaConsulta->insertarNuevoHorarioPorLicencia($id_expediente, $horaApertura, $horaCierre, $diaLunes, $diaMartes, $diaMiercoles, $diaJueves, $diaViernes, $diaSabado, $diaDomingo);

$nuevaConsulta->insertarNuevaDireccionPorLicencia($id_expediente, $calle, $colonia);

$html = "<div class='alert alert-success' role='alert'>
  Registro exitoso!
</div>";

echo $html;
