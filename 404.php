<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrientaTec</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="icon" href="./assets/logo.ico" type="image/x-icon">
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
        <h2 class="h2-header text-xs z-[1020] text-white"><i>Tu mapa para encontrar tu escuela técnica ideal</i>
        </h2>

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
    <main class="container2">
        <div class="box">
            <h1 class="code">404</h1>
            <h2>Página no encontrada</h2>
            <p class="message">
                Lo sentimos — la página que estás buscando no existe, fue movida o
                el enlace está roto.
            </p>
            <p class="details">
            </p>
            <div class="actions">
                <a class="btn" href="/">Volver al inicio</a>
            </div>
        </div>
    </main>

    <footer class="footer">
        <h2>OrientaTec © - Todos los derechos reservados</h2>
        <div class="div-footer">
            <a href="https://x.com/orientatec2025?s=11" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.instagram.com/orientatec2025?igsh=YmR2M2IwcjF6Z3Fm&utm_source=qr" target="_blank"><i
                    class="fa-brands fa-instagram"></i></a>
            <a href="https://www.facebook.com/share/1B2zvvDgUD/?mibextid=wwXIfr" target="_blank"><i
                    class="fa-brands fa-facebook"></i></a>
        </div>
    </footer>


</body>

</html>