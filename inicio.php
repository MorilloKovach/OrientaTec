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
        <form id="loginForm" action="#" method="post" autocomplete="on">
      <label for="username">Usuario</label>
      <input id="username" name="username" type="text" required autocomplete="username" placeholder="tu usuario" />

      <label for="password">Contraseña</label>
      <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="********" />

      <button type="submit" class="button">Ingresar</button>
    </form>
    </div>
    </main>
</body>
</html>