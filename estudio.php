<?php

$_GET['especialidad'] = strval($_GET['especialidad']);
$conexion = mysqli_connect("localhost", "root",  "", "orientatec");
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from especialidades WHERE NombreCorto='" . mysqli_real_escape_string($conexion, $_GET['especialidad']) . "'";
$result = mysqli_query($conexion, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "No se encontraron resultados";
    exit();
} else {
    $especialidad = mysqli_fetch_assoc($result);
    $nombre = $especialidad['nombre'];
    $descripcion = $especialidad['PlanDeEstudios'];
    $imagen = $especialidad['VistaPrevia'];
    $perfil = $especialidad['PerfilProfesional'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrientaTec <?= $nombre ?></title>
    <link rel="icon" href="./assets/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <a href="./index.php"><img src="./assets/logo.png" class="logo" alt="OrientaTec"></a>
        <h2 class="h2-header text-xs z-[1020] text-white"><i>Tu mapa para encontrar tu escuela técnica ideal</i></h2>
       <ul id="menu-navegacion">
            <li><a href="inicio.php">Inicio de Sesion</a></li>
            <li><a href="sobren.php">Sobre Nosotros</a></li>
        </ul>
        <div class="hamburguesa-grande" id="menu-hamburguesa">
            <div class="linea"></div>
            <div class="linea"></div>
            <div class="linea"></div>
        </div>
    </header>
    <main class="estudio">
        <h2 class="text-2xl font-bold text-center my-5">Perfil Profesional</h2>
        <?= $perfil ?>
        <h2>Plan curricular de <?= $nombre ?></h2>
        <img src="<?= $imagen ?>" alt="Imagen de <?= $nombre ?>" class="w-full max-w-[1250px] mx-auto my-5">
        <h2>Plan detallado de la tecnicatura:</h2>
        <object data="<?= $descripcion ?>#page=2" type='application/pdf' page="2"
            class="max-w-[800px] w-full h-[800px] mx-auto my-5"></object>
    </main>

    <footer class="footer">
        <h2>OrientaTec © - Todos los derechos reservados</h2>
        <div class="div-footer">
            <a href="https://x.com/orientatec2025?s=11" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.instagram.com/orientatec2025?igsh=YmR2M2IwcjF6Z3Fm&utm_source=qr"  target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.facebook.com/share/1B2zvvDgUD/?mibextid=wwXIfr"  target="_blank"><i class="fa-brands fa-facebook"></i></a>
        </div>
    </footer>
    <script src="./header.js"></script>
</body>

</html>