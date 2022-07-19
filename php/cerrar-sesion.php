<?php
session_start();
//$_SESSION["nombre"]=null;
session_destroy();
header("Location:../index.php");
