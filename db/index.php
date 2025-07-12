<?php
$conexion = mysqli_connect("localhost", "root", "", "orientatec");
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT i.nombre, i.latitud, i.longitud, j.nombre as localidad FROM establecimiento i JOIN localidad j ON i.localidad_id = j.localidad_id";
$result = mysqli_query($conexion, $sql);