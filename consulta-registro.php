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
  <div class="container">
    <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link " aria-current="true" href="./nuevo-registro.php">Nuevo Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Consulta Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./pagar-registro.php">Pagar Registro</a>
          </li>
        </ul>
      </div>
      <div class="card-body">

        <h5 class="card-title">Consultar registros</h5>
        <p class="card-text">Pagina para realizar consultas sobre registros ya sea para ver el ultimo pago o volver a imprimir el permiso.</p>



        <div class="contenido">
          <div class="fila">
            <label for="buscador-folio" class="etiqueta">Buscar por folio</label>
            <input class="area-texto" list="listaDeFolios" id="buscador-folio" placeholder="Escribe para buscar..." maxlength="50">
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
            <button class="btn btn-secondary" id="buscar-id">Buscar</button>
          </div>
          <div class="fila">
            <label for="buscador-nombre" class="etiqueta">Buscar por nombre o razon</label>
            <input class="area-texto" list="listaDeNombres" id="buscador-nombre" placeholder="Escribe para buscar..." maxlength="50">
            <datalist id="listaDeNombres">
              <?php
              require_once("./CRUDPHP/crud.php");
              $nuevaConsulta = CrudPHP::singleton();
              $ids = $nuevaConsulta->obtenerNombreExpediente();
              foreach ($ids as $id) {
                echo "<option value='" . $id['nombre_razonSocial'] . "'>";
              }
              ?>
            </datalist>
            <button class="btn btn-secondary" id="buscar-nombre">Buscar</button>
          </div>

          <!-- Respuesta de servidor -->
          <div class="contenido" id="respuesta">
            <h5>Los 5 ultimos registros</h5>
            <?php
            require_once("./CRUDPHP/crud.php");
            $nuevaConsulta = CrudPHP::singleton();
            $registrosRecientes = $nuevaConsulta->mostrarRegistrosRecientes();
            //Mostrar los registros recientes en una tabla con bootstrap y un boton para descargar el pdf
            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>Folio</th>";
            echo "<th scope='col'>Nombre o razon social</th>";
            echo "<th scope='col'>Denominacion</th>";
            echo "<th scope='col'>Fecha de registro</th>";
            echo "<th scope='col'>PDF</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($registrosRecientes as $registro) {
              echo "<tr>";
              echo "<td>" . $registro['id_identificador'] . $registro['id_expediente'] . "</td>";
              echo "<td>" . $registro['nombre_razonSocial'] . "</td>";
              echo "<td>" . $registro['denominacion'] . "</td>";
              echo "<td>" . $registro['fecha_apertura'] . "</td>";
              echo "<td><a href='./php/pdf.php?id=" . $registro['id_expediente'] . "' class='btn btn-danger'>Descargar PDF</a></td>";
              echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            ?>
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
      $("#buscar-id").click(function() {
        var id = $("#buscador-folio").val();
        if (id == "") {
          alert("Debes escribir un folio");
        } else {
          $.ajax({
            url: "./php/consulta.php",
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

      $("#buscar-nombre").click(function() {
        var nombre = $("#buscador-nombre").val();
        if (nombre == "") {
          alert("Debes escribir un nombre o razon social");
        } else {
          $.ajax({
            url: "./php/consulta.php",
            type: "POST",
            data: {
              nombre: nombre
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
  </script>

</body>

</html>