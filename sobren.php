<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>    
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./assets/logo.ico" type="image/x-icon">
</head>
<body>
    <header>
        <a href="./index.php"><img src="./assets/logo.png" class="logo" alt="OrientaTec"></a>
        <h2 class="h2-header text-xs z-[1020] text-white">Tu mapa para encontrar tu escuela técnica ideal </h2>

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
    <main class="sb-main">
        <h1>Sobre nosotros</h1>
        <div class="cartel">
        <h2>¿Quienes somos?</h2>
        <p>Somos estudiantes de la Escuela de Educación Técnica N.°6 de La Matanza, donde adquirimos conocimientos en programación, diseño web, análisis de datos y gestión de la información. Nos destacamos por aplicar estos saberes en proyectos con impacto real en la comunidad. Mientras la institución nos brinda la base académica, nosotros aportamos innovación y visión de futuro, convencidos de que la tecnología y la educación son claves para transformar la sociedad. Por ello, desarrollamos un proyecto que facilite el acceso a la información y promueva oportunidades educativas y profesionales para los jóvenes.</p>
        </div>
        <div class="cartel">
        <h2>Nuestro Objetivo</h2>
        <p>Con OrientaTec buscamos facilitar el acceso a información clara y confiable sobre las escuelas técnicas de La Matanza. A través de un mapa interactivo y fichas sobre los planes de estudio, la plataforma permitirá informar sobre especialidades, ubicaciones y contactos de cada institución. Nuestro objetivo es reducir barreras de información, apoyar a familias y estudiantes en la elección de su escuela técnica y contribuir a una distribución más equitativa de la matrícula escolar.</p>
        </div>
        <div class="cartel">
        <h2>¿Como lo conseguimos?</h2>
        <p>OrientaTec nació en la Técnica 6 después de varios meses de trabajo, investigación y mucho aprendizaje en equipo. Durante este proyecto usamos todo lo que fuimos aprendiendo: programación, diseño web, manejo de bases de datos, experiencia de usuario y hasta cómo comunicar mejor nuestras ideas.</p>
        <p>Nuestro objetivo fue crear una página web fácil de usar que junte toda la información sobre las escuelas técnicas, para que elegir sea más sencillo. Pero OrientaTec es más que una simple página: es una forma de conectar la educación con la comunidad y demostrar que desde la escuela también podemos crear soluciones reales, útiles e innovadoras.</p>
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