<?php

$_GET['especialidad'] = strval($_GET['especialidad']);
$conexion = mysqli_connect("localhost", "root", "", "orientatec");
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from Especialidades WHERE NombreCorto='" . mysqli_real_escape_string($conexion, $_GET['especialidad']) . "'";
$result = mysqli_query($conexion, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "No se encontraron resultados";
    exit();
} else {
    $especialidad = mysqli_fetch_assoc($result);
    $nombre = $especialidad['nombre'];
    $descripcion = $especialidad['PlanDeEstudios'];
    $imagen = $especialidad['VistaPrevia'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrientaTec <?= $nombre ?></title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <a href="./index.php"><img src="./assets/logo.png" class="logo" alt="OrientaTec"></a>
        <ul>
            <li><a href="inicio.php">Inicio de Sesion</a></li>
            <li><a href="sobren.php">Sobre Nosotros</a></li>
        </ul>
    </header>
    <main>
        <h2>Plan curricular de <?= $nombre ?></h2>
        <img src="<?= $imagen ?>" alt="Imagen de <?= $nombre ?>" class="w-full max-w-[1250px] mx-auto my-5">
        <h2>Plan detallado de la tecnicatura:</h2>
        <object data="<?= $descripcion ?>#page=2" type='application/pdf' page="2"
            class="w-[65vw] h-[800px] mx-auto my-5"></object>
    </main>

    <footer>
        <h2>hola</h2>
    </footer>
</body>

</html>