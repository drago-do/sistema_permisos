<?php
//Recupera el parametro id de la url y lo guarda en una variable
$id = $_GET['id'];
require('./../FPDF/fpdf.php');
require_once('./../CRUDPHP/crud.php');
$nuevaConsulta = CrudPHP::singleton();
$datosDeRegistro = $nuevaConsulta->obtenerRegistroEspecifico($id);

$claveArea = $datosDeRegistro[0]['id_identificador'];
$claveArea = $nuevaConsulta->obtenerClaveArea($claveArea);
$claveArea = $claveArea[0]['identificador'] . $id;

$direccion = $nuevaConsulta->obtenerDireccionRegistroEspecifico($id);
$direccion = $direccion[0]['nombre_de_calle'] . " Col. " . $direccion[0]['Colonia'] . " " . $direccion[0]['Localidad'];

$giroEspecifico = $nuevaConsulta->obtenerGiroRegistroEspecifico($id);
$giroEspecifico = $giroEspecifico[0]['nombre'];

$descripcionGiro = $datosDeRegistro[0]['descripcion'];

$nombreRazonSocial = $datosDeRegistro[0]['denominacion'];

$horarioDias = $nuevaConsulta->obtenerHorarioRegistroEspecifico($id);
$horarioDias = $horarioDias[0]['hora_apertura'] . " - " . $horarioDias[0]['hora_cierre'] . "/" . $horarioDias[0]['Lunes'] . "-" . $horarioDias[0]['Martes'] . "-" . $horarioDias[0]['Miercoles'] . "-" . $horarioDias[0]['Jueves'] . "-" . $horarioDias[0]['Viernes'] . "-" . $horarioDias[0]['Sabado'] . "-" . $horarioDias[0]['Domingo'];

date_default_timezone_set('America/Mexico_City');
$informacionDeRegistro = "Se extiende el presente permiso, en Tepeapulco, Hidalgo, el dia "
  . date("d-m-Y");;

$espacioClave = "                    ";
$espacioRazon = $espacioClave . $espacioClave . $espacioClave . $espacioClave;
$espacioId = $espacioClave . $espacioClave . $espacioClave;

$pdf = new FPDF();
$pdf->SetMargins(1, 0, 1);
$pdf->SetTitle("Permiso no." . $id, true);
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(15);
$pdf->Cell(10, 10, $espacioId . $claveArea);
$pdf->Ln(135);
$pdf->Cell(10, 10, $espacioClave . $informacionDeRegistro);
$pdf->Ln(20);
$pdf->Cell(50, 10, $espacioClave . $direccion);
$pdf->Ln(15);
$pdf->Cell(50, 10, $espacioClave . $giroEspecifico);
$pdf->Ln();
$pdf->Cell(50, 10, $espacioClave . $descripcionGiro);
$pdf->Ln(15);
$pdf->Cell(50, 10, $espacioRazon . $nombreRazonSocial);
$pdf->Ln();
$pdf->Cell(50, 10, $espacioClave . $horarioDias);


$pdf->Output();
