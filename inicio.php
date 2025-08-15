<?php
if(isset($_POST['username']) && isset($_POST['password'])) {
    $conexion = mysqli_connect("localhost", "root", "", "orientatec");
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>
    <header>
        <h1>Syxtem</h1>
        <ul>
            <li><a href="">Inicio de Sesion</a></li>
            <li><a href="">Sobre Nosotros</a></li>
        </ul>
    </header>
    <main>
        <div class="login-container">
            <h2>Inicio de Sesion</h2>
            <form id="loginForm" action="" method="post">
                <label for="username">Usuario</label>
                <input id="username" name="username" type="text" required autocomplete="username"
                    placeholder="tu usuario" />

                <label for="password">Contraseña</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                    placeholder="********" />

                <button type="submit" class="button">Ingresar</button>
            </form>
        </div>
    </main>
</body>

</html>