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



//Mostrar todos los datos recibidos
// $html = "idLicencia: " . $idLicencia . "<br>";
// $html .= "id_expediente: " . $id_expediente . "<br>";
// $html .= "fecha: " . $fecha . "<br>";
// $html .= "nombre: " . $nombre . "<br>";
// $html .= "denominacion: " . $denominacion . "<br>";
// $html .= "rfc: " . $rfc . "<br>";
// $html .= "ctaPredial: " . $ctaPredial . "<br>";
// $html .= "ctaAgua: " . $ctaAgua . "<br>";
// $html .= "datosFiscales: " . $datosFiscales . "<br>";
// $html .= "horaApertura: " . $horaApertura . "<br>";
// $html .= "horaCierre: " . $horaCierre . "<br>";
// $html .= "diaLunes: " . $diaLunes . "<br>";
// $html .= "diaMartes: " . $diaMartes . "<br>";
// $html .= "diaMiercoles: " . $diaMiercoles . "<br>";
// $html .= "diaJueves: " . $diaJueves . "<br>";
// $html .= "diaViernes: " . $diaViernes . "<br>";
// $html .= "diaSabado: " . $diaSabado . "<br>";
// $html .= "diaDomingo: " . $diaDomingo . "<br>";
// $html .= "calle: " . $calle . "<br>";
// $html .= "colonia: " . $colonia . "<br>";
// $html .= "giro: " . $giro . "<br>";
// $html .= "ventaAlcohol: " . $ventaAlcohol . "<br>";
// $html .= "detallesGiro: " . $detallesGiro . "<br>";
// $html .= "costoApertura: " . $costoApertura . "<br>";
// $html .= "observaciones: " . $observaciones . "<br>";
$html = "<div class='alert alert-success' role='alert'>
  Registro exitoso!
</div>";

echo $html;
