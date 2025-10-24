<?php
if(isset($_POST['username']) && isset($_POST['password'])) {
$conexion = mysqli_connect("localhost", "root", "", "c2661773_orienta");
    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM establecimiento WHERE Usuario = '" . mysqli_real_escape_string($conexion, $_POST['username']) . "' AND Contraseña = '" . mysqli_real_escape_string($conexion, $_POST['password']) . "'";
    $result = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // Usuario autenticado correctamente
        setcookie("username", $_POST['username'], time() + (86400 * 30), "/"); 
        setcookie("password", $_POST['password'], time() + (86400 * 30), "/");
        header("Location: admin.php");
        exit();
    }
    else {
        // Usuario o contraseña incorrectos
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
    }
    mysqli_close($conexion);
} else if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    // Si no se ha enviado el formulario, redirigir al inicio de sesión
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./assets/logo.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3634009231241518"
     crossorigin="anonymous"></script>
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
    <ul id="menu-navegacion-celu">
        <li><a href="inicio.php">Inicio de Sesion</a></li>
        <li><a href="sobren.php">Sobre Nosotros</a></li>
    </ul>
    <main class ="is-main">
        <div class="login-container">
            <h2>Inicio de Sesion</h2>
            <form id="loginForm" action="" method="post">
                <label for="username">Usuario</label>
                <input id="username" name="username" type="text" required autocomplete="username"
                    placeholder="Ingresar usuario" />

                <label for="password">Contraseña</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                    placeholder="********" />

                <button type="submit" class="button">Ingresar</button>
            </form>
        </div>
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