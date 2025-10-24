<?php
$conexion = mysqli_connect("localhost", "root", "", "c2661773_orienta");
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT i.establecimiento_id, i.nombre, i.sitio_web, i.google_map, i.NombreCorto as nombrec, i.latitud, i.longitud, i.ImagenEscuela, j.nombre as localidad, k.nombre as municipio FROM establecimiento i JOIN localidad j ON i.localidad_id = j.localidad_id join municipio k on k.municipio_id = j.municipio_id;";



$result = mysqli_query($conexion, $sql);

$sql2 = "SELECT * from localidad";
$result2 = mysqli_query($conexion, $sql2);

$sql3 = "SELECT * FROM `establecimientos_especialidades`";
$result3 = mysqli_query($conexion, $sql3);

$sql4 = "SELECT * FROM municipio";
$result4 = mysqli_query($conexion, $sql4);