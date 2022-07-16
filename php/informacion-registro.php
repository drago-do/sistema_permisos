<?php
require_once("./../CRUDPHP/crud.php");
$id = $_POST['id'];

$nuevaConsulta = CrudPHP::singleton();
$datosGenerales = $nuevaConsulta->obtenerRegistroEspecifico($id);
$pagos = $nuevaConsulta->obtenerPagosDeLicencia($id);

$formularioPago = "<div class='fila'><div class='col-1'>
                <label for='concepto' class='form-label'>Concepto</label>
              </div>
              <div class='col-4'>
                <select class='form-select' id='concepto'>
                  <option value='RENOVACION' selected>RENOVACION</option>
                  <option value='PUBLICIDAD'>PUBLICIDAD</option>
                </select>
              </div>
              <div class='col-1'>
                <label for='costo'>Costo de pago</label>
              </div>
              <div class='col-4'>
                <input class='form-control' type='number' id='costo' placeholder='Escribe el costo de pago...' maxlength='10'>
              </div>
              <div class='col-1'>
                <button class='btn btn-success' id='pagar-registro' onClick='realizarPago(" . $id . ")'>Pagar</button>
              </div>
            </div> ";


$html = "<div class='fila'><table class='table'><thead><tr><th scope='col'>Folio</th><th scope='col'>Nombre o RazonSocial</th><th scope='col'>Fecha Apertura</th></tr></thead><tbody>";
foreach ($datosGenerales as $registro) {
  $html .= "<tr><td>" . $registro['id_expediente'] . "</td><td>" . $registro['nombre_razonSocial'] . "</td><td>" . $registro['fecha_apertura'] . "</td></tr>";
}
$html .= "</tbody></table> </div>";
$html .= "<div class='fila'><table class='table'><thead><tr><th scope='col'>Concepto</th><th scope='col'>Cantidad</th><th scope='col'>Fecha</th></tr></thead><tbody>";
foreach ($pagos as $registro) {
  $html .= "<tr><td>" . $registro['concepto'] . "</td><td> $ " . $registro['cantidad'] . "</td><td>" . $registro['fecha'] . "</td></tr>";
}
$html .= "</tbody></table> </div>";
echo $formularioPago . $html;
