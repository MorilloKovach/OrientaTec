<?php

/*
Tenemos que definir como tomar la base de datos dentro de nuestro programa. Dado a que necesitamos centralizar la informacion, entonces vamos a tomar de exclusiva los valores exactos que requerimos, y por el momento, no nos va a importar mucho el como trabajemos con estos.

*/

//creame la conexion con mi db de localhost

$conexion = mysqli_connect("localhost", "root", "", "orientatec");
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT i.nombre, i.latitud, i.longitud, j.nombre as localidad FROM establecimiento i JOIN localidad j ON i.localidad_id = j.localidad_id";
$result = mysqli_query($conexion, $sql);