<?php
//singleton
class CrudPHP
{
  private static $instancia;
  private $dbh;

  private function __construct()
  {
    try {
      $servidor = "localhost";
      $base = "padron_licencias";
      $usuario = "root";
      $contrasenia = "";
      $this->dbh = new PDO('mysql:host=' . $servidor . ';dbname=' . $base, $usuario, $contrasenia);
      $this->dbh->exec("SET CHARACTER SET utf8");
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage();
      die();
    }
  }

  public static function singleton()
  {
    if (!isset(self::$instancia)) {
      $miclase = __CLASS__;
      self::$instancia = new $miclase;
    }
    return self::$instancia;
  }

  public function insertarNuevaLicencia($idLicencia, $nombre, $denominacion, $rfc, $predial, $agua, $datosFiscales, $giroComercial, $descripcion, $ventaAlcohol, $observaciones)
  {
    try {
      $query = $this->dbh->prepare("INSERT INTO principal_licencia VALUES (?, NULL, ?, ?, ?,?,?, ?, ?, ?, ?, NOW(), ?)");
      $query->bindParam(1, $idLicencia);
      $query->bindParam(2, $nombre);
      $query->bindParam(3, $denominacion);
      $query->bindParam(4, $rfc);
      $query->bindParam(5, $predial);
      $query->bindParam(6, $agua);
      $query->bindParam(7, $datosFiscales);
      $query->bindParam(8, $giroComercial);
      $query->bindParam(9, $descripcion);
      $query->bindParam(10, $ventaAlcohol);
      $query->bindParam(11, $observaciones);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function insertarNuevoHorarioPorLicencia($idExpediente, $horaApertura, $horaCierre, $lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo)
  {
    try {
      $query = $this->dbh->prepare("INSERT INTO horarios_por_licencia VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $query->bindParam(1, $idExpediente);
      $query->bindParam(2, $horaApertura);
      $query->bindParam(3, $horaCierre);
      $query->bindParam(4, $lunes);
      $query->bindParam(5, $martes);
      $query->bindParam(6, $miercoles);
      $query->bindParam(7, $jueves);
      $query->bindParam(8, $viernes);
      $query->bindParam(9, $sabado);
      $query->bindParam(10, $domingo);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function insertarNuevaDireccionPorLicencia($idLicencia, $calle, $idColonia)
  {
    try {
      $query = $this->dbh->prepare("INSERT INTO direcciones_por_licencia VALUES (?, ?, ?)");
      $query->bindParam(1, $idLicencia);
      $query->bindParam(2, $calle);
      $query->bindParam(3, $idColonia);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function obtenerIdDeGiro($nombreGiro)
  {
    try {
      $query = $this->dbh->prepare("SELECT id_giro FROM `giros_comerciales` WHERE nombre LIKE ?");
      $query->bindParam(1, $nombreGiro);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function obtenerIdDeColonia($nombreColonia)
  {
    try {
      $query = $this->dbh->prepare("SELECT `id_colonia` FROM `colonias` WHERE `nombre` LIKE ?");
      $query->bindParam(1, $nombreColonia);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function realizarPagoARegistroExistente($id, $concepto, $cantidad)
  {
    try {
      $query = $this->dbh->prepare("INSERT INTO pagos_por_licencia VALUES (NULL, ?, ?, ?, CURRENT_DATE)");
      $query->bindParam(1, $id);
      $query->bindParam(2, $concepto);
      $query->bindParam(3, $cantidad);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function obtenerRegistroEspecifico($id)
  {
    try {
      $query = $this->dbh->prepare("SELECT * FROM principal_licencia WHERE id_expediente LIKE ?");
      $query->bindParam(1, $id);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function obtenerUltimoFolio()
  {
    try {
      $query = $this->dbh->prepare("SELECT id_expediente FROM `principal_licencia`  
ORDER BY `principal_licencia`.`id_expediente` DESC;");
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function obtenerDireccionRegistroEspecifico($id)
  {
    try {
      $query = $this->dbh->prepare("SELECT nombre_de_calle,(SELECT nombre FROM colonias WHERE id_colonia = (SELECT id_colonia FROM direcciones_por_licencia WHERE id_expediente LIKE ?)) as 'Colonia', (SELECT nombre FROM localidades WHERE id_localidad = (SELECT id_localidad FROM colonias WHERE id_colonia = (SELECT id_colonia FROM direcciones_por_licencia WHERE id_expediente LIKE ?))) as 'Localidad' FROM direcciones_por_licencia WHERE id_expediente LIKE ?;");
      $query->bindParam(1, $id);
      $query->bindParam(2, $id);
      $query->bindParam(3, $id);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function obtenerHorarioRegistroEspecifico($id)
  {
    try {
      $query = $this->dbh->prepare("CALL obtenerDiasLaborales(?)");
      $query->bindParam(1, $id);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }


  public function obtenerGiroRegistroEspecifico($id)
  {
    try {
      $query = $this->dbh->prepare("SELECT nombre FROM giros_comerciales WHERE id_giro LIKE (SELECT giro_comercial FROM principal_licencia WHERE id_expediente LIKE ?);");
      $query->bindParam(1, $id);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }


  public function obtenerClaveArea($id)
  {
    try {
      $query = $this->dbh->prepare("SELECT identificador FROM identificadores_area WHERE id_identificador LIKE ?");
      $query->bindParam(1, $id);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }




  public function obtenerIdConElNombre_razon($nombre)
  {
    try {
      $query = $this->dbh->prepare("SELECT id_licencia FROM `principal_licencia` WHERE nombre_razonSocial LIKE ?");
      $query->bindParam(1, $nombre);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function mostrarRegistrosRecientes()
  {
    try {
      $query = $this->dbh->prepare("SELECT * FROM principal_licencia LIMIT 0, 5");
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function obtenerPagosDeLicencia($id)
  {
    try {
      $query = $this->dbh->prepare("SELECT * FROM `pagos_por_licencia` WHERE `id_expediente` LIKE ? ORDER BY `pagos_por_licencia`.`fecha` DESC");
      $query->bindParam(1, $id);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }



  public function obtenerIdExpediente()
  {
    try {
      $query = $this->dbh->prepare("SELECT id_expediente FROM `principal_licencia`");
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function obtenerNombreExpediente()
  {
    try {
      $query = $this->dbh->prepare("SELECT nombre_razonSocial FROM `principal_licencia`");
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function obtenerGiros()
  {
    try {
      $query = $this->dbh->prepare("SELECT nombre FROM `giros_comerciales`");
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function obtenerColonias()
  {
    try {
      $query = $this->dbh->prepare("SELECT nombre FROM `colonias`");
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function obtenerLocalidades()
  {
    try {
      $query = $this->dbh->prepare("SELECT nombre FROM `localidades`");
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function obtenerIdentificadoresArea()
  {
    try {
      $query = $this->dbh->prepare("SELECT * FROM `identificadores_area`");
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function Consulta($p1)
  {
    try {
      $query = $this->dbh->prepare("SELECT campos FROM tabla WHERE campo LIKE ?");
      $query->bindParam(1, $p1);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function insertar($p1)
  {
    try {
      $query = $this->dbh->prepare("INSERT INTO tabla VALUES (?)");
      $query->bindParam(1, $p1);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function Borrar($p1)
  {
    try {
      $query = $this->dbh->prepare("DELETE FROM tabla WHERE campo LIKE ?");
      $query->bindParam(1, $p1);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function Actualizar($p1, $p2)
  {
    try {
      $query = $this->dbh->prepare("UPDATE tabla SET campo1=? WHERE campo2 LIKE ?");
      $query->bindParam(1, $p1);
      $query->bindParam(2, $p2);
      $query->execute();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }



  public function __clone()
  {
    trigger_error('La clonación no es permitida!.', E_USER_ERROR);
  }
}
