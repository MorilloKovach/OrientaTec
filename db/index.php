<?php
$conexion = mysqli_connect("localhost", "root", "", "orientatec");
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT i.establecimiento_id, i.nombre, i.NombreCorto as nombrec, i.latitud, i.longitud, i.ImagenEscuela, j.nombre as localidad FROM establecimiento i JOIN localidad j ON i.localidad_id = j.localidad_id";

$result = mysqli_query($conexion, $sql);

$sql2 = "SELECT * from localidad";
$result2 = mysqli_query($conexion, $sql2);

$sql3 = "SELECT * FROM `establecimientos_especialidades`";
$result3 = mysqli_query($conexion, $sql3);