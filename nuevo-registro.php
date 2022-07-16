<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Titulo Y</title>
  <link rel="stylesheet" href="./css/nuevo-registro.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active" aria-current="true" href="#">Nuevo Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./consulta-registro.php">Consulta Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./pagar-registro.php">Pagar Registro</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Nuevo Registro de reglamentos</h5>
        <p class="card-text">Pagina para realizar el registro de un nuevo negocio.</p>

        <div class="fila" id="resultado-registro"></div>

        <div class="fila">
          <div class="entrada-formulario">
            <label for="id-licencia">Id de Licencia</label>
            <select class="form-select" id="id-licencia" aria-label="Default select example">
              <?php
              require_once("./CRUDPHP/crud.php");
              $nuevaConsulta = CrudPHP::singleton();
              $resultado = $nuevaConsulta->obtenerIdentificadoresArea();
              foreach ($resultado as $registro) {
                echo "<option value='" . $registro['id_identificador'] . "'>" . $registro['identificador'] . "</option>";
              }
              ?>

            </select>
          </div>
          <div class="entrada-formulario">
            <label for="folio">Folio</label>
            <!-- Obtener el ultimo folio desde la base de datos -->
            <?php
            $nuevaConsulta = CrudPHP::singleton();
            $resultado = $nuevaConsulta->obtenerUltimoFolio();
            echo "<input type='text' class='form-control' id='folio' value='" . ($resultado[0]['id_expediente'] + 1) . " ' readonly>";
            ?>
          </div>
          <div class="entrada-formulario">
            <label for="fecha-apertura">Fecha de apertura</label>
            <input class="form-control" type="datetime-local" name="fecha-apertura" id="fecha-apertura" value="<?php date_default_timezone_set('America/Mexico_City');
                                                                                                                echo  date("Y-m-d\TH:i"); ?>" readonly>
          </div>
        </div>

        <div class="fila">
          <div class="col-sm-12 col-md-6">
            <div class="entrada-formulario">
              <label for="nombre-razonsocial">Nombre o Razon Social</label>
              <input class="form-control" type="text" name="nombre-razonsocial" id="nombre-razonsocial" maxlength="200">
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="entrada-formulario">
              <label for="denominacion">Denominacion</label>
              <input class="form-control" type="text" name="denominacion" id="denominacion" maxlength="200">
            </div>
          </div>
        </div>
        <div class="fila">
          <div class="col-sm-12 col-md-2">
            <div class="entrada-formulario">
              <label for="rfc">RFC</label>
              <input class="form-control" type="text" name="rfc" id="rfc" maxlength="100">
            </div>
          </div>
          <div class="col-sm-12 col-md-2">
            <div class="entrada-formulario">
              <label for="cta-predial">Cuenta Predial</label>
              <input class="form-control" type="text" name="cta-predial" id="cta-predial" maxlength="50">
            </div>
          </div>
          <div class="col-sm-12 col-md-2">
            <div class="entrada-formulario">
              <label for="cta-agua">Cuenta Agua</label>
              <input class="form-control" type="text" name="cta-agua" id="cta-agua" maxlength="50">
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="entrada-formulario">
              <label for="datos-fiscales">Datos Fiscales</label>
              <input class="form-control" type="text" name="datos-fiscales" id="datos-fiscales" maxlength="100">
            </div>
          </div>
        </div>


        <div class="fila">
          <div class="col-sm-12 col-md-2">
            <div class="entrada-formulario">
              <label for="hora-apertura">Hora de apertura</label>
              <input class="form-control" type="time" name="hora-apertura" id="hora-apertura">
            </div>
          </div>
          <div class=" col-sm-12 col-md-2">
            <div class="entrada-formulario">
              <label for="hora-cierre">Hora de cierre</label>
              <input class="form-control" type="time" name="hora-cierre" id="hora-cierre">
            </div>
          </div>
          <div class="col-sm-12 col-md-8">
            <div class="entrada-formulario">
              <label>Dias de trabajo</label>
              <div>
                <input class="form-check-input" type="checkbox" value="" id="dia-lunes">
                <label for="dia-lunes" class="texto-no-seleccionable">
                  Lunes
                </label>
                <input class="form-check-input" type="checkbox" value="" id="dia-martes">
                <label for="dia-martes">
                  Martes
                </label>
                <input class="form-check-input" type="checkbox" value="" id="dia-miercoles">
                <label for="dia-miercoles">
                  Miercoles
                </label>
                <input class="form-check-input" type="checkbox" value="" id="dia-jueves">
                <label for="dia-jueves">
                  Jueves
                </label>
                <input class="form-check-input" type="checkbox" value="" id="dia-viernes">
                <label for="dia-viernes">
                  Viernes
                </label>
                <input class="form-check-input" type="checkbox" value="" id="dia-sabado">
                <label for="dia-sabado">
                  Sabado
                </label>
                <input class="form-check-input" type="checkbox" value="" id="dia-domingo">
                <label for="dia-domingo">
                  Domingo
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="fila">
          <div class="col-sm-12 col-md-6">
            <div class="entrada-formulario">
              <label for="calle">Calle</label>
              <input class="form-control" type="text" name="calle" id="calle" maxlength="200">
            </div>
          </div>
          <div class="col-sm-12 col-md-3">
            <div class="entrada-formulario">
              <label for="localidad">Localidad</label>
              <input class="form-control" list="listaDelocalidades" id="localidad" placeholder="Escribe para buscar..." maxlength="50">
              <datalist id="listaDelocalidades">
                <?php
                require_once("./CRUDPHP/crud.php");
                $nuevaConsulta = CrudPHP::singleton();
                $localidades = $nuevaConsulta->obtenerLocalidades();
                foreach ($localidades as $localida) {
                  echo "<option value='" . $localida['nombre'] . "'>";
                }
                ?>
              </datalist>
            </div>
          </div>

          <div class="col-sm-12 col-md-3">
            <div class="entrada-formulario">
              <label for="colonia">Colonia</label>
              <input class="form-control" list="listaDeColonias" id="colonia" placeholder="Escribe para buscar..." maxlength="50">
              <datalist id="listaDeColonias">
                <?php
                require_once("./CRUDPHP/crud.php");
                $nuevaConsulta = CrudPHP::singleton();
                $colonias = $nuevaConsulta->obtenerColonias();
                foreach ($colonias as $colonia) {
                  echo "<option value='" . $colonia['nombre'] . "'>";
                }
                ?>
              </datalist>
            </div>
          </div>
        </div>

        <div class="fila">
          <div class="col-sm-12 col-md-9">
            <div class="entrada-formulario">
              <label for="giro">Giro Principal</label>
              <input class="form-control" list="listaDeGiros" id="giro" placeholder="Escribe para buscar..." maxlength="150">
              <datalist id="listaDeGiros">
                <?php
                require_once("./CRUDPHP/crud.php");
                $nuevaConsulta = CrudPHP::singleton();
                $giros = $nuevaConsulta->obtenerGiros();
                foreach ($giros as $giro) {
                  echo "<option value='" . $giro['nombre'] . "'>";
                }
                ?>
              </datalist>
            </div>
          </div>

          <div class="col-sm-12 col-md-3">
            <div style="padding-top:25px ;">
              <label for="venta-alcohol">¿Venta de Alcohol?</label>
              <input class="form-check-input" type="checkbox" value="" id="venta-alcohol">
            </div>
          </div>
        </div>
        <div class="fila">
          <div class="col-8">
            <div class="entrada-formulario">
              <label for="detalles-giro">Detalles del giro</label>
              <input class="form-control" type="text" name="detalles-giro" id="detalles-giro" maxlength="250">
            </div>
          </div>
          <div class="col-4">
            <div class="entrada-formulario">
              <label for="costo-apertura">Costo Apertura</label>
              <input class="form-control" type="number" name="costo-apertura" id="costo-apertura" maxlength="12" placeholder="$">
            </div>
          </div>
        </div>
        <br>
        <div class="fila">
          <div class="col-12">
            <div class="entrada-formulario">
              <label for="observaciones">Observaciones</label>
              <input class="form-control" type="text" name="observaciones" id="observaciones" maxlength="100">
            </div>
          </div>
        </div>

        <br>
        <br>
        <br>
        <a href="#" class="btn btn-primary" onclick="validarFormulario()">Realizar Registro</a>
      </div>
    </div>
  </div>

  <!-- importar jquerry completo -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <script>
    // Funcion para validar que el usuario ingrese todos los campos de forma correcta
    function validarFormulario() {

      // recuperar value del select con id "id-licencia"
      var idLicencia = document.getElementById("id-licencia").value;
      // input type="datetime-local"
      var fecha = document.getElementById("fecha-apertura").value;
      // input type="text"
      var id_expediente = document.getElementById("folio").value;
      var nombre = document.getElementById("nombre-razonsocial").value;
      var denominacion = document.getElementById("denominacion").value;
      var rfc = document.getElementById("rfc").value;
      var ctaPredial = document.getElementById("cta-predial").value;
      var ctaAgua = document.getElementById("cta-agua").value;
      var datosFiscales = document.getElementById("datos-fiscales").value;
      // input type="time"
      var horaApertura = document.getElementById("hora-apertura").value;
      var horaCierre = document.getElementById("hora-cierre").value;
      // input type="checkbox"
      var diaLunes = document.getElementById("dia-lunes").checked;
      var diaMartes = document.getElementById("dia-martes").checked;
      var diaMiercoles = document.getElementById("dia-miercoles").checked;
      var diaJueves = document.getElementById("dia-jueves").checked;
      var diaViernes = document.getElementById("dia-viernes").checked;
      var diaSabado = document.getElementById("dia-sabado").checked;
      var diaDomingo = document.getElementById("dia-domingo").checked;
      // input type="text"
      var calle = document.getElementById("calle").value;
      var localidad = document.getElementById("localidad").value;
      var colonia = document.getElementById("colonia").value;
      var giro = document.getElementById("giro").value;
      // input type="checkbox"
      var ventaAlcohol = document.getElementById("venta-alcohol").checked;
      // input type="text"
      var detallesGiro = document.getElementById("detalles-giro").value;
      // input type="number"
      var costoApertura = document.getElementById("costo-apertura").value;
      // input type="text"
      var observaciones = document.getElementById("observaciones").value;
      // Verificando datos
      console.log("Licencia: " + idLicencia);
      console.log("ID Expediente: " + id_expediente);
      console.log("Fecha: " + fecha);
      console.log("Nombre: " + nombre);
      console.log("Denominación: " + denominacion);
      console.log("RFC: " + rfc);
      console.log("Cta Predial: " + ctaPredial);
      console.log("Cta Agua: " + ctaAgua);
      console.log("Datos Fiscales: " + datosFiscales);
      console.log("Hora Apertura: " + horaApertura);
      console.log("Hora Cierre: " + horaCierre);
      console.log("Dia Lunes: " + diaLunes);
      console.log("Dia Martes: " + diaMartes);
      console.log("Dia Miercoles: " + diaMiercoles);
      console.log("Dia Jueves: " + diaJueves);
      console.log("Dia Viernes: " + diaViernes);
      console.log("Dia Sabado: " + diaSabado);
      console.log("Dia Domingo: " + diaDomingo);
      console.log("Calle: " + calle);
      console.log("Localidad: " + localidad);
      console.log("Colonia: " + colonia);
      console.log("Giro: " + giro);
      console.log("Venta Alcohol: " + ventaAlcohol);
      console.log("Detalles Giro: " + detallesGiro);
      console.log("Costo Apertura: " + costoApertura);
      console.log("Observaciones: " + observaciones);
      nombre = nombre != "" ? nombre : "SIN DATOS";
      denominacion = denominacion != "" ? denominacion : "SIN DATOS";
      rfc = rfc != "" ? rfc : "SIN DATOS";
      ctaPredial = ctaPredial != "" ? ctaPredial : "SIN DATOS";
      ctaAgua = ctaAgua != "" ? ctaAgua : "SIN DATOS";
      datosFiscales = datosFiscales != "" ? datosFiscales : "SIN DATOS";
      horaApertura = horaApertura != "" ? horaApertura : "SIN DATOS";
      horaCierre = horaCierre != "" ? horaCierre : "SIN DATOS";
      calle = calle != "" ? calle : "SIN DATOS";
      localidad = localidad != "" ? localidad : "SIN DATOS";
      colonia = colonia != "" ? colonia : "SIN DATOS";
      giro = giro != "" ? giro : "SIN DATOS";
      costoApertura = costoApertura != "" ? costoApertura : 0;

      diaLunes = diaLunes ? 1 : 0;
      diaMartes = diaMartes ? 1 : 0;
      diaMiercoles = diaMiercoles ? 1 : 0;
      diaJueves = diaJueves ? 1 : 0;
      diaViernes = diaViernes ? 1 : 0;
      diaSabado = diaSabado ? 1 : 0;
      diaDomingo = diaDomingo ? 1 : 0;
      ventaAlcohol = ventaAlcohol ? 1 : 0;

      //Añadir :00 a las horas
      horaApertura = horaApertura + ":00";
      horaCierre = horaCierre + ":00";


      $.ajax({
        url: "./php/registrar-nueva-licencia.php",
        type: "POST",
        data: {
          idLicencia: idLicencia,
          id_expediente: id_expediente,
          fecha: fecha,
          nombre: nombre,
          denominacion: denominacion,
          rfc: rfc,
          ctaPredial: ctaPredial,
          ctaAgua: ctaAgua,
          datosFiscales: datosFiscales,
          horaApertura: horaApertura,
          horaCierre: horaCierre,
          diaLunes: diaLunes,
          diaMartes: diaMartes,
          diaMiercoles: diaMiercoles,
          diaJueves: diaJueves,
          diaViernes: diaViernes,
          diaSabado: diaSabado,
          diaDomingo: diaDomingo,
          calle: calle,
          localidad: localidad,
          colonia: colonia,
          giro: giro,
          ventaAlcohol: ventaAlcohol,
          detallesGiro: detallesGiro,
          costoApertura: costoApertura,
          observaciones: observaciones
        },
        success: function(data) {
          $("#resultado-registro").html(data);
          //Esperar 2 segundos para redirijir a php/pdf.php con parametro id_expediente
          setTimeout(function() {
            window.location.href = "./php/pdf.php?id=" + id_expediente;
          }, 2000);

        }
      });
    }
  </script>
</body>

</html>