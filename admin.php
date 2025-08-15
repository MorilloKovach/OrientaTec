<?php
if (!isset($_COOKIE['username']) || !isset($_COOKIE['password'])) {
    // Si no hay cookies, redirigir al inicio de sesión
    header("Location: inicio.php");
    exit();
}
$conexion = mysqli_connect("localhost", "root", "", "orientatec");
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
    $clave = $user['clave'];
    $direccion = $user['direccion'];
    $telefono = $user['telefono'];
    $correo = $user['email'];
    $localidad_id = $user['localidad_id'];
    $latitud = $user['latitud'];
    $longitud = $user['longitud'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $establecimiento = mysqli_real_escape_string($conexion, $_POST['establecimiento']);
    $nivel = mysqli_real_escape_string($conexion, $_POST['nivel']);
    $modalidad = mysqli_real_escape_string($conexion, $_POST['modalidad']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $correo = mysqli_real_escape_string($conexion, $_POST['email']);
    $localidad_id = mysqli_real_escape_string($conexion, $_POST['localidad_id']);
    $latitud = mysqli_real_escape_string($conexion, $_POST['latitud']);
    $longitud = mysqli_real_escape_string($conexion, $_POST['longitud']);
    $update_sql = "UPDATE establecimiento SET nombre='$establecimiento', nivel='$nivel', modalidad='$modalidad', clave='$clave', direccion='$direccion', telefono='$telefono', email='$correo', localidad_id='$localidad_id', latitud='$latitud', longitud='$longitud' WHERE establecimiento_id=$establishment_id;";
    if (mysqli_query($conexion, $update_sql)) {
        echo "<script>alert('Datos actualizados correctamente');</script>";
        // Refrescar la página para mostrar los datos actualizados
        header("Refresh:0");
        exit();
    } else {
        echo "<script>alert('Error al actualizar los datos: " . mysqli_error($conexion) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina administrador de <?= $establishment ?></title>
</head>

<body>
    <h1>Bienvenido, <?= $username ?>!</h1>
    <h2>Estas gestionando el establecimiento: <?= $establishment ?></h2>
    <p>ID del establecimiento: <?= $establishment_id ?></p>
    <a href="logout.php">Cerrar sesión</a>
    <form action="" method="POST">
        <label for=""><?= $establishment ?></label>
        <input type="text" name="establecimiento" value="<?= $establishment ?>">
        <label for="">Nivel</label>
        <input type="text" name="nivel" value="<?= $nivel ?>">
        <label for="">Modalidad</label>
        <input type="text" name="modalidad" value="<?= $modalidad ?>">
        <label for="">Clave</label>
        <input type="text" name="clave" value="<?= $clave ?>">
        <label for="">Direccion</label>
        <input type="text" name="direccion" value="<?= $direccion ?>">
        <label for="">Telefono</label>
        <input type="text" name="telefono" value="<?= $telefono ?>">
        <label for="">Correo</label>
        <input type="text" name="email" value="<?= $correo ?>">
        <label for="">Localidad ID</label>
        <input type="text" name="localidad_id" value="<?= $localidad_id ?>">
        <label for="">Latitud</label>
        <input type="text" name="latitud" value="<?= $latitud ?>">
        <label for="">Longitud</label>
        <input type="text" name="longitud" value="<?= $longitud ?>">
        <button type="submit">Actualizar</button>
    </form>

</body>

</html>