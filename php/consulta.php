<?php
require_once("./../CRUDPHP/crud.php");

$id = $_POST['id'];



if (isset($id)) {
  generarTabla($id);
}

function generarTabla($id)
{
  //Regresar tabla de bootstrap generada con los resultados
  $tablaHTML = "<table class='table'><thead><tr><th scope='col'>Concepto</th><th scope='col'>Cantidad</th><th scope='col'>Fecha</th></tr></thead><tbody>";
  $nuevaConsulta = CrudPHP::singleton();
  $resultado = $nuevaConsulta->obtenerPagosDeLicencia($id);
  foreach ($resultado as $registro) {
    $tablaHTML .= "<tr><td>" . $registro['concepto'] . "</td><td> $ " . $registro['cantidad'] . "</td><td>" . $registro['fecha'] . "</td></tr>";
  }
  $tablaHTML .= "</tbody></table>";
  //Boton para descargar el pdf con el id correspondiente
  $tablaHTML .= "<br><a href='./php/pdf.php?id=" . $id . "' class='btn btn-danger'>Descargar PDF</a>";
  echo $tablaHTML;
}
