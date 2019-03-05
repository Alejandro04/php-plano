<?php
include_once "base_de_datos.php";
$nombre = "holahola";
$sentencia = $base_de_datos->prepare("SELECT id FROM estudiantes WHERE nombre = ? LIMIT 1;");
$sentencia->execute([$nombre]);
$numeroDeFilas = $sentencia->rowCount();
if ($numeroDeFilas <= 0) {
    echo "El usuario con nombre $nombre NO existe";
} else {
    echo "El usuario con nombre $nombre SÍ existe";
}
