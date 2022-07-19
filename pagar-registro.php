<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Titulo Y</title>
  <link rel="stylesheet" href="./css/consulta-registro.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION["correo"])) {
    $_SESSION["correo"] = null;
    session_destroy();
    header('Location: http://localhost/index.php');
  }
  ?>
  <div class="container">
    <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link " aria-current="true" href="./nuevo-registro.php">Nuevo Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./consulta-registro.php">Consulta Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Pagar Registro</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Pagar la renovacion o publicidad de un registro</h5>
        <p class="card-text">Pagina para realizar la renovacion o pago de publicidad de un registro en especifico.</p>


        <div class="contenido">
          <div class="fila">
            <label for="folio" class="etiqueta">Buscar por folio</label>
            <input class="area-texto" list="listaDeFolios" id="folio" placeholder="Escribe para buscar..." maxlength="50">
            <datalist id="listaDeFolios">
              <?php
              require_once("./CRUDPHP/crud.php");
              $nuevaConsulta = CrudPHP::singleton();
              $ids = $nuevaConsulta->obtenerIdExpediente();
              foreach ($ids as $id) {
                echo "<option value='" . $id['id_expediente'] . "'>";
              }
              ?>
            </datalist>
            <button class="btn btn-secondary" id="seleccionar-registro">Buscar</button>
          </div>
          <!-- respuesta Servidor -->
          <div class="contenido" id="respuesta">

          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- importar jquerry completo -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#seleccionar-registro").click(function() {
        var id = $("#folio").val();
        if (id == "") {
          alert("Debes escribir un folio");
        } else {
          $.ajax({
            url: "./php/informacion-registro.php",
            type: "POST",
            data: {
              id: id
            },
            success: function(response) {
              if (response == "") {
                alert("No se encontro ningun registro con ese folio");
              } else {
                console.log(response);
                $("#respuesta").html(response);
              }
            }
          });
        }
      });
    });

    function realizarPago(id) {
      //Obtener el valor de la etiqueta select con el id concepto
      var concepto = document.getElementById("concepto").value;
      //Obtener el valor de la etiqueta input con el id costo
      var costo = document.getElementById("costo").value;
      console.log(concepto);
      console.log(costo);
      //Verificar que el campo de costo no este vacio
      if (costo == "") {
        alert("Debes escribir un costo");
      } else {
        //Enviar los datos al servidor
        $.ajax({
          url: "./php/pago-registro.php",
          type: "POST",
          data: {
            id: id,
            concepto: concepto,
            costo: costo
          },
          success: function(response) {
            console.log(response);
            if (response == "") {
              alert("No se pudo realizar el pago");
            } else {
              alert("Pago realizado con exito");
              //Enviar a php/pdf.php para generar el pdf
              window.location.href = "./php/pdf.php?id=" + id;
            }
          }
        });
      }
    }
  </script>
</body>

</html>