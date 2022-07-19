<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reglamentos inicio sesion</title>
  <link rel="stylesheet" href="./css/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="contenedor-login">
      <img src="./img/tepeapulco.png" alt="Logotipo tepeapulco">
      <div class="recuadro-rojo">
        <div class="contenedor-formulario">
          <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese su correo" name="usuario" value="admin@admin.com">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña" name="contraseña" value="admin">
          </div>
          <div class="boton-centrado">
            <button class="btn btn-primary" onclick="ingresarSistema()">Ingresar</button>
          </div>
        </div>
        <div id="notificacion">

        </div>
      </div>
    </div>
    <!-- importar jquerry completo -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script>
      function ingresarSistema() {
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        $(function() {
          $.get("./php/iniciar-sesion.php", {
            email: email,
            password: password
          }, function(data) {
            if (data == "Inicio de sesión correcto") {
              window.location.href = "./nuevo-registro.php";
            } else if (data == "Contraseña incorrecta") {
              $("#notificacion").html("<div class='alert alert-danger' role='alert'>Contraseña incorrecta</div>");
            } else if (data == "Usuario no existe") {
              $("#notificacion").html("<div class='alert alert-danger' role='alert'>Usuario no existe</div>");
            }
          });
        });


      }
    </script>
</body>

</html>