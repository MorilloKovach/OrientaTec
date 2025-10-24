<?php
if (!isset($_COOKIE['username']) || !isset($_COOKIE['password'])) {
    // Si no hay cookies, redirigir al inicio de sesión
    header("Location: inicio.php");
    exit();
}
$conexion = mysqli_connect("localhost", "root", "", "c2661773_orienta");
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * from establecimiento WHERE Usuario = '" . mysqli_real_escape_string($conexion, $_COOKIE['username']) . "' AND Contraseña = '" . mysqli_real_escape_string($conexion, $_COOKIE['password']) . "'";
$result = mysqli_query($conexion, $sql);
if (mysqli_num_rows($result) == 0) {
    setcookie("username", "", time() - 1000000, "/");
    setcookie("password", "", time() - 1000000, "/");
    // Si las cookies no son válidas, redirigir al inicio de sesión
    header("Location: inicio.php");
    exit();
} else {
    $user = mysqli_fetch_assoc($result);
    $username = $user['Usuario'];
    $establishment = $user['nombre'];
    $establishment_id = $user['establecimiento_id'];
    $nivel = $user['nivel'];
    $modalidad = $user['modalidad'];
    $cue = $user['cue'];
    $direccion = $user['direccion'];
    $telefono = $user['telefono'];
    $correo = $user['email'];
    $sql2 = "SELECT * FROM especialidades";
    $sql3 = "SELECT * FROM establecimientos_especialidades WHERE establecimiento_id = $establishment_id";
    $result3 = mysqli_query($conexion, $sql3);
    $especialidades_establecimiento = [];
    if (mysqli_num_rows($result3) > 0) {
        while ($row = mysqli_fetch_assoc($result3)) {
            $especialidades_establecimiento[] = $row;
        }
    }
    $result2 = mysqli_query($conexion, $sql2);
    $especialidades = [];
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $especialidades[] = $row;
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar los datos del establecimiento
    $establecimiento = mysqli_real_escape_string($conexion, $_POST['establecimiento']);
    $nivel = mysqli_real_escape_string($conexion, $_POST['nivel']);
    $modalidad = mysqli_real_escape_string($conexion, $_POST['modalidad']);
    $cue = mysqli_real_escape_string($conexion, $_POST['cue']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $correo = mysqli_real_escape_string($conexion, $_POST['email']);
    $orientacion = mysqli_real_escape_string($conexion, $_POST['orientacion']);
    if( $orientacion != "") {
        $sql4 = "SELECT * FROM establecimientos_especialidades WHERE especialidades_id = $orientacion and establecimiento_id = $establishment_id";
        $result4 = mysqli_query($conexion, $sql4);
        if (mysqli_num_rows($result4) == 0) {
            $insert_sql = "INSERT INTO establecimientos_especialidades (establecimiento_id, especialidades_id) VALUES ($establishment_id, $orientacion);";
            mysqli_query($conexion, $insert_sql);
        }
    }
    $orientacion_borrar = mysqli_real_escape_string($conexion, $_POST['orientacion-borrar']);
    if ($orientacion_borrar != "") {
        $searchsql = "SELECT * FROM establecimientos_especialidades WHERE especialidades_id = $orientacion_borrar AND establecimiento_id = $establishment_id";
        $result5 = mysqli_query($conexion, $searchsql);
        if (mysqli_num_rows($result5) > 0) {
            $delete_sql = "DELETE FROM establecimientos_especialidades WHERE establecimiento_id = $establishment_id AND especialidades_id = $orientacion_borrar;";
            mysqli_query($conexion, $delete_sql);
        }
    }
    $archivo = $_FILES['imagen'];
    // DEBUG echo var_dump($_FILES);
    if ($archivo['error'] === UPLOAD_ERR_OK) {
        $ruta_destino = 'assets/' . basename($archivo['name']);
        move_uploaded_file($archivo['tmp_name'], $ruta_destino);
        $update_sql = "UPDATE establecimiento SET ImagenEscuela='$ruta_destino' WHERE establecimiento_id=$establishment_id;";
        mysqli_query($conexion, $update_sql);
    }
    $update_sql = "UPDATE establecimiento SET nombre='$establecimiento', nivel='$nivel', modalidad='$modalidad', clave='$clave', direccion='$direccion', telefono='$telefono', email='$correo' WHERE establecimiento_id=$establishment_id;";
    if (mysqli_query($conexion, $update_sql)) {
        echo "<script>alert('Datos actualizados correctamente');</script>";
        // Refrescar la página para mostrar los datos actualizados
        header("Refresh:0");
    } else {
        echo "<script>alert('Error al actualizar los datos: " . mysqli_error($conexion) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style.css">
    <title>ADMINISTRACION <?= $establishment ?></title>

    <link rel="icon" href="./assets/logo.ico" type="image/x-icon">
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
    <ul id="menu-navegacion-celu">
        <li><a href="inicio.php">Inicio de Sesion</a></li>
        <li><a href="sobren.php">Sobre Nosotros</a></li>
    </ul>
    <div class="cuadro_admin">
    <h1 class="username">Bienvenido, <?= $username ?>!</h1>
    <h2 class="gestion">Estas gestionando el establecimiento: <?= $establishment ?></h2>
    <p class="establishment">ID del establecimiento: <?= $establishment_id ?></p>
    </div>
    
    
    <form action="" method="POST" enctype="multipart/form-data" class="form-admin">
        
        <h3 class="act">Actualizar información del establecimiento</h3>
        <label for=""><?= $establishment ?></label>
        <input type="text" name="establecimiento" value="<?= $establishment ?>">
        <label for="">Nivel</label>
        <input type="text" name="nivel" value="<?= $nivel ?>">
        <label for="">CUE</label>
        <input type="text" name="cue" value="<?= $cue?>">
        <label for="">Modalidad</label>
        <input type="text" name="modalidad" value="<?= $modalidad ?>">
        <label for="">Direccion</label>
        <input type="text" name="direccion" value="<?= $direccion ?>">
        <label for="">Telefono</label>
        <input type="text" name="telefono" value="<?= $telefono ?>">
        <label for="">Correo</label>
        <input type="text" name="email" value="<?= $correo ?>">
        <label for="">Imagen</label>
        <input type="file" name="imagen" accept="image/*">
        <label for="">Agregar orientación:</label>
        <select name="orientacion" id="">
            <option value=""></option>

            <?php foreach ($especialidades as $especialidad): ?>
                <option value="<?= $especialidad['especialidad_id'] ?>"><?= $especialidad['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="">Borrar orientacion: </label>
        <select name="orientacion-borrar" id="">
            <option value=""></option>
            <?php foreach ($especialidades_establecimiento as $especialidad_est):
                $especialidad_info = array_filter($especialidades, fn($e) => $e['especialidad_id'] == $especialidad_est['especialidades_id']);
                if (!empty($especialidad_info)) {
                    $especialidad_info = array_values($especialidad_info)[0];
                    ?>
                    <option value="<?= $especialidad_info['especialidad_id'] ?>"><?= $especialidad_info['nombre'] ?></option>
                <?php }endforeach; ?>
        </select>
        <button type="submit">Actualizar</button>
    </form>
    <a href="logout.php">Cerrar sesión</a>
    <script src="./header.js"></script>
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