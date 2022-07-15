<?php
require_once("./../CRUDPHP/crud.php");
$id = $_POST['id'];
$concepto = $_POST['concepto'];
$costo = $_POST['costo'];

if (isset($id) && isset($concepto) && isset($costo)) {
  $nuevaConsulta = CrudPHP::singleton();
  $resultado = $nuevaConsulta->realizarPagoARegistroExistente($id, $concepto, $costo);
  echo $resultado;
} else {
  echo "";
}
